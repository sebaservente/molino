<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.mill');
    }

    public function create()
    {
        return view( 'admin.create');
    }
    public function createConfirm(Request $request)
    {
        $data = $request->except(['_token']);
       /* dd($data);*/
        try {
            \DB::transaction(function()use ($data){
                $producto = Producto::create($data);

                /*$equipos->generos()->attach($data['generos'] ?? []);*/
            });
            return redirect()
                ->route('admin')
                /*->with('status.message', 'El producto <b> ' . e($producto->titulo) . ' </b> fue creado exitosamente. ')*/
                /*->with('status.message', 'El equipo <b>' . e($data['titulo']) . '</b> fue creado exitosamente')
                ->with('status.type', 'success')*/;
        }catch (\Exception $e){
            return redirect()
                ->route('admin.create')
                ->withInput()
                ->with('status.message', 'Ocurrio un error al tratar de crear el equipo')
                ->with('status.type', 'danger');
        }
    }
}
