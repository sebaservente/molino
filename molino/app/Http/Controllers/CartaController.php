<?php

namespace App\Http\Controllers;

use App\Models\Desayuno;
use Illuminate\Http\Request;

class CartaController extends Controller
{
   public function desayunos()
   {
       $desayunos = Desayuno::all();
       return view('carta.desayunos',[
           'desayunos' => $desayunos,
       ]);
   }
}
