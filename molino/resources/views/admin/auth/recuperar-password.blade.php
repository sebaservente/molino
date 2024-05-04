<?php
/**
 * @var
 */
?>
@extends('template.admin')

@section('title', 'Iniciar Sesión')

@section('admin')
    <h1 class="pt-4 text-center textBold8 text-uppercase fontSize1_3">Recuperar Contraseña</h1>
    <div class="py-5">
        <h2 class="text-center textBold8 text-uppercase">Recupera la Contraseña</h2>
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

                <div class="py-3">
                    <button class="btn btn-dark w-100 shadow">Recuperar Contraseña</button>
                    {{--<a href="{{ route('admin.create') }}" class="btn btn-danger">Ingresar</a>--}}
                </div>
            </form>

        </div>
    </div>


@endsection
