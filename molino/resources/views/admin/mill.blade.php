<?php
/**
 * @var
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="text-center my-3">Administración Mill</h1>
    <div class="py-5">
        <h2 class="text-center">Crear Producto</h2>
        <div class="div__formCrearProducto">
            <form action="{{ route('admin.create') }}" method="get" enctype="multipart/form-data" class="p-3 rounded rounded-lg shadow">
                <div class="py-2">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="py-2">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="py-3">
                    <button class="btn btn-dark w-100 shadow">Ingresar</button>
                   {{-- <a href="{{ route('admin.create') }}" class="btn btn-dark">Ingresar</a>--}}
                </div>
            </form>

        </div>
    </div>


@endsection
