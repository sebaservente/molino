<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class RecuperarPasswordController extends Controller
{
    public function recuperarPassword()
    {
        /*dd('hola mundo');*/
        return view('admin.auth.recuperar-password');
    }

    public function recuperarPasswordPost(Request $request)
    {
        $request->validate(User::VALIDAR_INICIO, User::MENSAJES_INICIO);
        $email = $request->input('email');

        $status = Password::sendResetLink(['email' => $email]);

        $route = redirect()->route('password.request') ;
        return $status === Password::RESET_LINK_SENT
            ? $route
                ->with('status.message', 'Se envio el email a <b> ' . $email . '</b> para recuperar la contraseña!! ')
                ->with('status.type', 'success')
            : $route
                ->with('status.message', 'Ocurrio un error inesperado, no se puede enviar el email !! ')
                ->with('status.type', 'danger');
    }

    public function resetPassword(string $token)
    {
        return view('admin.auth.reset-password', [
            'token' => $token
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate(User::VALIDAR_INICIO, User::MENSAJES_INICIO);
        $credenciales = $request->only(['email', 'token', 'password', 'password_confirmation']);
        $status = Password::reset($credenciales, function ($user, $password){
            /** @var User $user*/
            // guardamos el password del usuario
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            // actualizamos el password del usuario
            $user->save();

            // ejecutamos el evento
            event(new PasswordReset($user));
        });

        return $status === Password::PASSWORD_RESET
            ? redirect()
                ->route('login')
                ->with('status.message', 'Tu password fue restablecido correctamente ')
                ->with('status.type', 'success')
            : redirect()
                ->route('password.reset')
                ->with('status.message', 'Tu password no fue restablecido. ')
                ->with('status.type', 'danger')
                ->withInput();
    }
}
