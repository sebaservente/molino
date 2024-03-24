<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class CartaController extends Controller
{
   public function desayunos()
   {
       $productos = Producto::all();
       return view('carta.desayunos',[
           'productos' => $productos,
       ]);
   }
    public function cafeteria()
    {
        $productos = Producto::all();
        return view('carta.cafeteria',[
            'productos' => $productos,
        ]);
    }
    public function bebidas()
    {
        $productos = Producto::all();
        return view('carta.bebidas',[
            'productos' => $productos,
        ]);
    }
    public function bebidasId(int $id)
    {
        
    }
    public function platos()
    {
        $productos = Producto::all();
        return view('carta.platos',[
            'productos' => $productos,
        ]);
    }
    public function ensaladas()
    {
        $productos = Producto::all();
        return view('carta.ensaladas',[
            'productos' => $productos,
        ]);
    }
}
