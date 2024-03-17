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
        <h2>Login de Ingreso</h2>
        <div>
            <form action="">
                <div>
                    <label for="">Email</label>
                    <input type="text">
                </div>
                <div>
                    <label for="">Contraseña</label>
                    <input type="text">
                </div>
                <div>
                    {{--<button class="btn btn-dark">Ingresar</button>--}}
                    <a href="{{ route('admin.create') }}" class="btn btn-dark">Ingresar</a>
                </div>
            </form>

        </div>
    </div>


@endsection
