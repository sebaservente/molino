<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{

    public function home(Request $request)
    {
        $builder = Producto::with(['categoria']);

        $buscarParams = [
            'titulo' => $request->query('titulo', null),
        ];

        if ($buscarParams['titulo']) {
            $builder->where('titulo', 'like', '%' . $buscarParams['titulo'] . '%');
        }

        $productos = $builder->paginate(10)->withQueryString();

        return view('admin.home', [
            'productos' => $productos,
            'buscarParams' => $buscarParams,
        ]);
    }
    public function create()
    {
        $categorias = Categoria::orderBy('nombre')->get();
            return view( 'admin.create', [
                'categorias' => $categorias
            ]);
    }

    public function createConfirm(Request $request)
    {
        $data = $request->except(['_token']);
        $request->validate(Producto::VALIDAR_CREAR_PRODUCTOS, Producto::MENSAJES_PRODUCTOS);

        if ($request->hasFile('imagen')){
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $imagen->extension();
            $img = $manager->read($imagen);
            $img = $img->resize(500,500);
            $imagenPath = 'img' . '/' . $nombreImagen;

            $img->toPng(320)->save($imagenPath);

            /*$img->toJpeg(360)->save($imagenPath);*/

            $data['imagen'] = $nombreImagen;

        }

        try {
            \DB::transaction(function() use ($data){
                $producto = Producto::create($data);

                /*$equipos->generos()->attach($data['generos'] ?? []);*/
            });
            return redirect()
                ->route('admin.home')
                ->with('status.message', 'El Producto <b>" ' . e($data['titulo']) . ' "</b> fue creado exitosamente')
                ->with('status.type', 'success');
        }catch (\Exception $e){
            return redirect()
                ->route('admin.create')
                ->withInput()
                ->with('status.message', 'Ocurrio un error al tratar de crear el equipo')
                ->with('status.type', 'danger');
        }
    }
    public function delete(int $id)
    {
        /*dd($id);*/
        $productos = Producto::findOrFail($id);
        $imagenVieja = $productos->imagen;

        if ($imagenVieja ?? false){
            unlink('img' . '/' . $imagenVieja);

        }

        try {
            \DB::transaction(function()use ($productos){
                /*$productos->categoria()->detach();*/
                $productos->delete();
                /*$productos->categoria()->attach($data['categoria']);*/
                /*$equipos->generos()->attach($data['generos'] ?? []);*/
                /*$imagenVieja = $equipos->imagen;*/
                /*$equipos->generos()->attach($data['generos'] ?? []);*/
            });
            return redirect()
                ->route('admin.home')
                ->with('status.message', 'El Producto <b>" ' . e($productos['titulo']) . ' "</b> fue eliminado exitosamente')
                ->with('status.type', 'success');
        }catch (\Exception $e){
            return redirect()
                ->route('admin.home')
                ->withInput()
                ->with('status.message', 'Ocurrio un error al tratar de crear el equipo')
                ->with('status.type', 'danger');
        }

    }

    public function upload(int $id)
    {

        $producto = Producto::findOrFail($id);
        $categorias = Categoria::orderBy('nombre')->get();
        return view('admin.upload',[
            'producto' => $producto,
            'categorias' => $categorias
        ]);
    }
    public function uploadConfirm(Request $request,int $id)
    {
        $request->validate(Producto::VALIDAR_CREAR_PRODUCTOS, Producto::MENSAJES_PRODUCTOS);
        $producto = Producto::findOrFail($id);
        $data = $request->except(['_token']);

        if ($request->hasFile('imagen')){
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $imagen->extension();
            $img = $manager->read($imagen);
            $img = $img->resize(500,500);
            $imagenPath = 'img' . '/' . $nombreImagen;
            $img->toPng(320)->save($imagenPath);
            $data['imagen'] = $nombreImagen;
            $imagenVieja = $producto->imagen;

            if ($imagenVieja ?? false){
                unlink('img' . '/' . $imagenVieja);

            }
        }
        try {
            \DB::transaction(function()use ($data, $producto){
                /*$productos->categoria()->detach();*/
                $producto->update($data);
                /*$productos->categoria()->attach($data['categoria']);*/
                /*$equipos->generos()->attach($data['generos'] ?? []);*/
                /*$imagenVieja = $equipos->imagen;*/
                /*$equipos->generos()->attach($data['generos'] ?? []);*/
            });
            return redirect()
                ->route('admin.home')
                ->with('status.message', 'El Producto <b>" ' . e($producto['titulo']) . ' "</b> fue editado exitosamente')
                ->with('status.type', 'success');
        }catch (\Exception $e){
            return redirect()
                ->route('admin.home')
                ->withInput()
                ->with('status.message', 'Ocurrio un error al tratar de crear el equipo')
                ->with('status.type', 'danger');
        }

    }

    public function desayuno()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.desayuno', [
            'productos' => $productos
        ]);
    }

    public function cafeteria()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.cafeteria', [
            'productos' => $productos
        ]);
    }
    public function bebidas()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.bebidas', [
            'productos' => $productos
        ]);
    }
    public function ensaladas()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.ensaladas', [
            'productos' => $productos
        ]);
    }
    public function platos()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.platos', [
            'productos' => $productos
        ]);
    }
    public function licuados()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.licuados', [
            'productos' => $productos
        ]);
    }
    public function postres()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.postres', [
            'productos' => $productos
        ]);
    }
    public function promos()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.promos', [
            'productos' => $productos
        ]);
    }
    public function platoDia()
    {
        $productos = Producto::with(['categoria'])->get();
        return view('admin.productos.platoDia', [
            'productos' => $productos
        ]);
    }
    public function papelera(Request $request)
    {
      return view('admin.papelera',[
         'productos' => Producto::onlyTrashed()->with(['categoria'])->get(),
      ]);
    }
    public function restaurar(int $id)
    {
        dd($id);
    }

    public function eliminar(int $id)
    {
        dd($id);
    }
}
