<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AdminController extends Controller
{
    public function admin()
    {
        return view('admin.mill');
    }

    public function home()
    {
        $productos = Producto::all();
        return view('admin.home', [
            'productos' => $productos
        ]);
    }

    public function create()
    {
        return view( 'admin.create');
    }

    public function createConfirm(Request $request)
    {
        $data = $request->except(['_token']);
        $request->validate(Producto::VALIDAR_CREAR_PRODUCTOS, Producto::MENSAJES_PRODUCTOS);
       /* dd($data);*/


        if ($request->hasFile('imagen')){

            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $imagen->extension();
            $img = $manager->read($imagen);
            $img = $img->resize(300,300);
            $imagenPath = public_path('img/reserva') . '/' . $nombreImagen;
            $img->toJpeg(80)->save($imagenPath);
            $data['imagen'] = $nombreImagen;

        }



        try {
            \DB::transaction(function()use ($data){
                $producto = Producto::create($data);

                /*$equipos->generos()->attach($data['generos'] ?? []);*/
            });
            return redirect()
                ->route('admin.home')
                /*->with('status.message', 'El producto <b> ' . e($producto->titulo) . ' </b> fue creado exitosamente. ')*/
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
    public function ver()
    {
        $productos = Producto::all();
        return view( 'admin.create',[
            'productos' => $productos
        ]);
    }
    public function delete(int $id)
    {
        $productos = Producto::findOrFail($id);

        try {
            \DB::transaction(function()use ($productos){
                $productos->delete();

                /*$equipos->generos()->attach($data['generos'] ?? []);*/
            });
            return redirect()
                ->route('admin.create')
                /*->with('status.message', 'El producto <b> ' . e($producto->titulo) . ' </b> fue creado exitosamente. ')*/
                ->with('status.message', 'El Producto <b>" ' . e($productos['titulo']) . ' "</b> fue eliminado exitosamente')
                ->with('status.type', 'success');
        }catch (\Exception $e){
            return redirect()
                ->route('admin.create')
                ->withInput()
                ->with('status.message', 'Ocurrio un error al tratar de crear el equipo')
                ->with('status.type', 'danger');
        }

    }
}
