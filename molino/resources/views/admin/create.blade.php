<?php
/**
 * @var
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="text-center my-3">Administración Mill</h1>
    <div>
        <h2>Crear Producto</h2>
        <div>
            <form action="">
                <div>
                    <label for="">Titulo</label>
                    <input type="text">
                </div>
                <div>
                    <label for="">Precio</label>
                    <input type="text">
                </div>
                <div>
                    {{--<button class="btn btn-dark">Ingresar</button>--}}
                    <a href="{{ route('admin.create') }}" class="btn btn-dark">Crear Producto</a>
                </div>
            </form>

        </div>
    </div>


@endsection
