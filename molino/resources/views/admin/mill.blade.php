<?php
/**
 * @var
 */
?>
@extends('template.admin')

@section('title', 'Iniciar Sesión')

@section('admin')
    <h1 class="pt-4 text-center textBold8 text-uppercase fontSize1_3">Administración Mill</h1>
    <div class="py-5">
        <h2 class="text-center textBold8 text-uppercase">Login de Ingreso</h2>
        <div class="div__formCrearProducto">
            <form action="{{ route('login.In') }}" method="post" class="p-3 rounded rounded-lg shadow">
                @csrf
                <div class="py-2">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email')}}"
                        @error('email') aria-describedby="error-email" @enderror>

                </div>
                @error('email')
                <div class="text-dark textBold8" id="error-email"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                @enderror
                <div class="py-2">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control"
                           @error('password') aria-describedby="error-password" @enderror >
                </div>
                @error('password')
                <div class="text-dark textBold8" id="error-password"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                @enderror
                <div class="py-3">
                    <button class="btn btn-dark w-100 shadow">Ingresar</button>
                    {{--<a href="{{ route('admin.create') }}" class="btn btn-danger">Ingresar</a>--}}
                    <div class="pt-3"><a href="{{ route('password.request') }}" class="text-decoration-none text-dark fontSizePequeño">¿ Olvidaste tu Contraseña ?</a></div>
                </div>
            </form>



        </div>
    </div>


@endsection
