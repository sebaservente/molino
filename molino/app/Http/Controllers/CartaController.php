<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartaController extends Controller
{
   public function desayunos()
   {
       return view('carta/desayunos');
   }
}
