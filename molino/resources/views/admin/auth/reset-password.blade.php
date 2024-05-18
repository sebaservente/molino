<?php
/**
 * @var string $token
 */
?>
@extends('template.admin')

@section('title', 'Iniciar Sesión')

@section('admin')
    <h1 class="pt-4 text-center textBold8 text-uppercase fontSize1_3">Restablece tú Contraseña</h1>
    <div class="py-5">
        <h2 class="text-center textBold8 text-uppercase">Restablece la Contraseña</h2>
        <div class="div__formCrearProducto">
            <form action="{{ route('password.update') }}" method="post" class="p-3 rounded rounded-lg shadow">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="py-2">
                    <label for="password" class="form-label">Nueva Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control"
                           @error('password') aria-describedby="error-password" @enderror >
                </div>
                @error('password')
                <div class="text-dark textBold8" id="error-password"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                @enderror
                <div class="py-2">
                    <label for="password_confirmation" class="form-label">Nueva Contraseña</label>
                    <input type="password_confirmation" name="password_confirmation" id="password_confirmation" class="form-control"
                           @error('password_confirmation') aria-describedby="error-password_confirmation" @enderror >
                </div>
                @error('password_confirmation')
                <div class="text-dark textBold8" id="error-password_confirmation"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                @enderror
                <div class="py-3">
                    <button class="btn btn-dark w-100 shadow">Restablecer tú Contraseña</button>
                    {{--<a href="{{ route('admin.create') }}" class="btn btn-danger">Ingresar</a>--}}
                </div>
            </form>

        </div>
    </div>


@endsection
