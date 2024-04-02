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
            $img = $img->resize(500,500);
            $imagenPath = public_path('img/reserva') . '/' . $nombreImagen;
            $img->toPng(320)->save($imagenPath);
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

    public function upload(int $id)
    {

        $producto = Producto::findOrFail($id);
        return view('admin.upload',[
            'producto' => $producto
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
            $imagenPath = public_path('img/reserva') . '/' . $nombreImagen;
            $img->toPng(320)->save($imagenPath);
            $data['imagen'] = $nombreImagen;
            $imagenVieja = $producto->imagen;

            if ($imagenVieja ?? false){
                unlink(public_path('img/reserva' . '/' . $imagenVieja));

            }
        }

        $producto->update($data);
        return redirect()
            ->route('admin.home')
            ->with('status.message', 'El Producto <b>" ' . e($producto['titulo']) . ' "</b> fue editado exitosamente')
            ->with('status.type', 'success');
    }
}
