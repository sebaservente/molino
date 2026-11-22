<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $productos = Producto::publicos()->with('categoria')->get();
        return view('index', [
            'productos' => $productos
        ]);
    }
}
