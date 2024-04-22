<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartaController extends Controller
{
   public function desayunos()
   {
       $productos = Producto::with('categoria')->get();
       return view('carta.desayunos',[
           'productos' => $productos,
       ]);
   }
    public function cafeteria()
    {
        $productos = Producto::with('categoria')->get();
        return view('carta.cafeteria',[
            'productos' => $productos,
        ]);
    }
    public function bebidas()
    {
        $productos = Producto::with('categoria')->get();
        return view('carta.bebidas',[
            'productos' => $productos,
        ]);
    }
    public function platos()
    {
        $productos = Producto::with('categoria')->get();
        return view('carta.platos',[
            'productos' => $productos,
        ]);
    }
    public function ensaladas()
    {
        $productos = Producto::with('categoria')->get();
        return view('carta.ensaladas',[
            'productos' => $productos,
        ]);
    }
}
