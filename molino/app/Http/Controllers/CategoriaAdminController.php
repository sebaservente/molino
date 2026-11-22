<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CategoriaAdminController extends Controller
{
    public function index()
    {
        $categorias = Categoria::withCount(['productos' => fn ($q) => $q->withTrashed()])->orderBy('posicion')->orderBy('nombre')->get();
        return view('admin.panel.categorias', compact('categorias'));
    }

    public function formulario(?int $id = null)
    {
        return view('admin.panel.categoria-form', ['categoria' => $id ? Categoria::findOrFail($id) : new Categoria(['carta' => 'cafeteria', 'posicion' => 0])]);
    }

    public function guardar(Request $request, ?int $id = null)
    {
        $categoria = $id ? Categoria::findOrFail($id) : new Categoria();
        $data = $request->validate([
            'nombre' => ['required', 'string', 'min:2', 'max:125', Rule::unique('categorias', 'nombre')->ignore($categoria->getKey(), 'categoria_id')],
            'abreviatura' => ['required', 'alpha', 'size:3'],
            'carta' => ['required', Rule::in(array_keys(Categoria::CARTAS))],
            'posicion' => ['required', 'integer', 'min:0', 'max:100000'],
        ], ['nombre.unique' => 'Ya existe una categoría con ese nombre.']);
        $data['abreviatura'] = strtoupper($data['abreviatura']);
        $categoria->fill($data)->save();
        return redirect()->route('admin.categorias')->with('panel.ok', 'Categoría guardada. Los productos mantienen su categoría y reflejan su carta y orden nuevos.');
    }

    public function borrar(Request $request, int $id)
    {
        $request->validate(['confirmar' => ['required', 'accepted']]);
        $borrada = DB::transaction(function () use ($id) {
            $categoria = Categoria::whereKey($id)->lockForUpdate()->firstOrFail();
            if (Producto::withTrashed()->where('categoria_id', $id)->exists()) return false;
            $categoria->delete();
            return true;
        });
        return redirect()->route('admin.categorias')->with($borrada ? 'panel.ok' : 'panel.error', $borrada ? 'Categoría eliminada.' : 'La categoría tiene productos activos o en la papelera. Reasignalos antes de borrarla.');
    }
}
