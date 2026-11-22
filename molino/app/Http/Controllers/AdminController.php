<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    private function filtros(Request $request): array
    {
        return \Illuminate\Support\Facades\Validator::make($request->query(), [
            'carta' => ['nullable', Rule::in(['cafeteria', 'comidas'])],
            'titulo' => ['nullable', 'string', 'max:150'],
            'categoria_id' => ['nullable', 'integer', 'min:1'],
            'estado' => ['nullable', Rule::in(['visible', 'oculto'])],
            'page' => ['nullable', 'integer', 'min:1'],
        ])->validate();
    }

    private function listado(Request $request, bool $papelera = false)
    {
        $filtros = $this->filtros($request);
        $carta = $filtros['carta'] ?? 'cafeteria';
        $categorias = Categoria::whereIn('carta', [$carta, 'ambas'])->orderBy('posicion')->orderBy('categoria_id')->get();
        $query = ($papelera ? Producto::onlyTrashed() : Producto::query())->with('categoria')
            ->whereHas('categoria', fn ($q) => $q->whereIn('carta', [$carta, 'ambas']));
        if (filled($filtros['titulo'] ?? null)) $query->where('titulo', 'like', '%' . $filtros['titulo'] . '%');
        if (filled($filtros['categoria_id'] ?? null)) $query->where('categoria_id', $filtros['categoria_id']);
        if (filled($filtros['estado'] ?? null)) $query->where('visible', $filtros['estado'] === 'visible');
        $productos = $query->orderBy('posicion')->orderBy('producto_id')->paginate(15)->withQueryString();
        return view('admin.panel.productos', compact('productos', 'categorias', 'filtros', 'carta', 'papelera'));
    }

    public function home()
    {
        $resumen = [];
        foreach (['cafeteria', 'comidas'] as $carta) {
            $q = Producto::whereHas('categoria', fn ($q) => $q->whereIn('carta', [$carta, 'ambas']));
            $resumen[$carta] = ['total' => (clone $q)->count(), 'visibles' => (clone $q)->where('visible', true)->count()];
        }
        return view('admin.panel.inicio', ['resumen' => $resumen, 'papeleraTotal' => Producto::onlyTrashed()->count()]);
    }

    public function productos(Request $request) { return $this->listado($request); }
    public function papelera(Request $request) { return $this->listado($request, true); }

    private function formulario(Request $request, ?Producto $producto = null)
    {
        $filtros = $this->filtros($request);
        $producto = $producto ?? new Producto(['visible' => true, 'posicion' => 0]);
        $categorias = Categoria::orderBy('posicion')->orderBy('nombre')->get();
        return view('admin.panel.formulario', compact('producto', 'categorias', 'filtros'));
    }

    public function create(Request $request) { return $this->formulario($request); }
    public function upload(Request $request, int $id) { return $this->formulario($request, Producto::with('categoria')->findOrFail($id)); }

    private function datos(Request $request): array
    {
        $data = $request->validate([
            'titulo' => ['required', 'string', 'min:2', 'max:255'],
            'descripcion' => ['nullable', 'string', 'max:5000'],
            'precio' => ['required', 'integer', 'min:0', 'max:2147483647'],
            'categoria_id' => ['required', 'integer', Rule::exists('categorias', 'categoria_id')->whereIn('carta', [$request->input('carta_producto'), 'ambas'])],
            'carta_producto' => ['required', Rule::in(['cafeteria', 'comidas'])],
            'precio_dos' => ['nullable', 'required_with:descripcion_dos', 'integer', 'min:0', 'max:2147483647'],
            'descripcion_dos' => ['nullable', 'required_with:precio_dos', 'string', 'max:255'],
            'imagen' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:4096', 'dimensions:max_width=8000,max_height=8000'],
            'imagen_descripcion' => ['nullable', 'string', 'max:255'],
            'quitar_imagen' => ['nullable', 'boolean'],
            'visible' => ['required', 'boolean'],
            'posicion' => ['required', 'integer', 'min:0', 'max:100000'],
        ], [
            'categoria_id.exists' => 'Elegí una categoría que pertenezca a la carta seleccionada.',
            'precio.integer' => 'Ingresá el precio en pesos enteros, sin puntos ni comas.',
            'precio_dos.required_with' => 'Completá el precio de la segunda opción.',
            'descripcion_dos.required_with' => 'Escribí el nombre de la segunda opción.',
            'imagen.max' => 'La imagen no puede superar los 4 MB.',
        ]);
        unset($data['imagen'], $data['quitar_imagen'], $data['carta_producto']);
        $data['descripcion'] = $data['descripcion'] ?? '';
        $data['imagen_descripcion'] = $data['imagen_descripcion'] ?? $data['titulo'];
        return $data;
    }

    private function imagenPath(string $name): string
    {
        $public = is_dir(base_path('public_html')) ? base_path('public_html') : public_path();
        return $public . '/img/reserva/' . basename($name);
    }

    private function quitarImagenGestionada(?string $name): void
    {
        // Los archivos antiguos y los logos nunca se eliminan desde este panel.
        if (!$name || !preg_match('/^mill-[a-f0-9-]{36}\.png$/', $name)) return;
        if (Producto::withTrashed()->where('imagen', $name)->exists()) return;
        $path = $this->imagenPath($name);
        if (is_file($path)) @unlink($path);
    }

    private function guardar(Request $request, Producto $producto)
    {
        $filtros = $this->filtros($request);
        $data = $this->datos($request);
        $anterior = $producto->imagen;
        $nueva = null;
        try {
            if ($request->hasFile('imagen')) {
                $nueva = 'mill-' . Str::uuid() . '.png';
                $path = $this->imagenPath($nueva);
                if (!is_dir(dirname($path))) mkdir(dirname($path), 0755, true);
                $encoded = (new ImageManager(new Driver()))->read($request->file('imagen')->getRealPath())->scaleDown(width: 1200, height: 1200)->toPng();
                if (file_put_contents($path, (string) $encoded) === false) throw new \RuntimeException('No se pudo guardar la imagen.');
                $data['imagen'] = $nueva;
            } elseif ($request->boolean('quitar_imagen')) {
                $data['imagen'] = null;
            }
            DB::transaction(function () use ($data, $producto) {
                Categoria::whereKey($data['categoria_id'])->lockForUpdate()->firstOrFail();
                $producto->fill($data)->save();
            });
        } catch (\Throwable $e) {
            if ($nueva) $this->quitarImagenGestionada($nueva);
            report($e);
            return back()->withInput($request->except('imagen'))->with('panel.error', 'No se pudo guardar el producto. Tus datos se conservaron; si elegiste una imagen, seleccionala de nuevo.');
        }
        if (array_key_exists('imagen', $data) && $anterior !== $data['imagen']) $this->quitarImagenGestionada($anterior);
        return redirect()->route('admin.productos', $filtros)->with('panel.ok', 'Producto guardado correctamente.');
    }

    public function createConfirm(Request $request) { return $this->guardar($request, new Producto()); }
    public function uploadConfirm(Request $request, int $id) { return $this->guardar($request, Producto::findOrFail($id)); }

    public function visible(Request $request, int $id)
    {
        $filtros = $this->filtros($request);
        $data = $request->validate(['visible' => ['required', 'boolean']]);
        Producto::findOrFail($id)->update($data);
        return redirect()->route('admin.productos', $filtros)->with('panel.ok', 'Visibilidad actualizada en la carta.');
    }

    public function delete(Request $request, int $id)
    {
        $filtros = $this->filtros($request);
        Producto::findOrFail($id)->delete();
        return redirect()->route('admin.productos', $filtros)->with('panel.ok', 'Producto enviado a la papelera. Podés restaurarlo.');
    }

    public function restaurar(Request $request, int $id)
    {
        $filtros = $this->filtros($request);
        Producto::onlyTrashed()->findOrFail($id)->restore();
        return redirect()->route('admin.papelera', $filtros)->with('panel.ok', 'Producto restaurado con su visibilidad anterior.');
    }

    public function eliminar(Request $request, int $id)
    {
        $filtros = $this->filtros($request);
        $request->validate(['confirmar' => ['required', 'accepted']]);
        $producto = Producto::onlyTrashed()->findOrFail($id);
        $imagen = $producto->imagen;
        $producto->forceDelete();
        $this->quitarImagenGestionada($imagen);
        return redirect()->route('admin.papelera', $filtros)->with('panel.ok', 'Producto eliminado definitivamente.');
    }

    // Los accesos anteriores siguen llevando al listado, sin duplicar pantallas.
    private function acceso(string $nombre) { return redirect()->route('admin.productos', ['categoria_id' => Categoria::where('nombre', $nombre)->value('categoria_id'), 'carta' => in_array($nombre, ['Platos', 'Ensaladas', 'Postres', 'Plato del Dia'], true) ? 'comidas' : 'cafeteria']); }
    public function desayuno() { return $this->acceso('Desayunos y Meriendas'); }
    public function cafeteria() { return $this->acceso('Cafeteria'); }
    public function bebidas() { return $this->acceso('Bebidas'); }
    public function ensaladas() { return $this->acceso('Ensaladas'); }
    public function platos() { return $this->acceso('Platos'); }
    public function licuados() { return $this->acceso('Licuados'); }
    public function postres() { return $this->acceso('Postres'); }
    public function promos() { return $this->acceso('Promos'); }
    public function platoDia() { return $this->acceso('Plato del Dia'); }
}
