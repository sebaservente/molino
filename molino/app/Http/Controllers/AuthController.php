<?php

namespace App\Http\Controllers;

use App\Models\User;
use Facade\Ignition\Middleware\AddQueries;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('admin.mill');
    }

    public function loginIn(Request $request)
    {
        /*dd($request);*/
        $request->validate(User::VALIDAR_INICIO, User::MENSAJES_INICIO);
        $credentials = [
           'email' => $request->input('email'),
           'password' => $request->input('password'),
        ];
        if (\Auth::attempt($credentials)){
           $request->session()->regenerate();
           return redirect()
               ->route('admin.home')
               ->with('status.message', 'Sessión iniciada correctamente. ')
               ->with('status.type', 'success') ;
        }
        return redirect()
           ->route('login')
           ->with('status.message', 'Datos incorrectos')
           ->with('status.type', 'danger')
           ->withInput();
    }

    public function logout(Request $request)
    {
        /*dd('Hola logout');*/
        \Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('login')
            ->with('status', 'Sessión Cerrada exitosamente')
            ->with('status', 'success') ;
    }



}
