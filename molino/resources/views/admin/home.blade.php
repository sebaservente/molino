<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="py-4 px-3  fontSize1 textBold8 text-uppercase">CREAR PLATO DEL DÍA</h1>

    <div class="menuHome mt-4">
        <div class="my-1 w-100 border"><a href="{{ route('desayunos' ) }}" class="btn btn-none w-100 fontSize1_5" >Desayunos y Meriendas</a></div>
        <div class="my-1">
            <div class="my-1 w-100 border"><a href="{{ route('cafeteria' ) }}" class="btn btn-none w-100 fontSize1_5" >Cafeteria</a></div>
            <div class="my-1 w-100 border"><a href="{{ route('platos' ) }}" class="btn btn-none w-100 fontSize1_5" >Platos</a></div>
        </div>
        <div class="my-1">
            <div class="my-1 w-100 border"><a href="{{ route('ensaladas' ) }}" class="btn btn-none w-100 fontSize1_5" >Ensaladas</a></div>
            <div class="my-1 w-100 border"><a href="{{ route('bebidas' ) }}" class="btn btn-none w-100 fontSize1_5" >Bebidas</a></div>
        </div>
        <div class="my-1">
            <div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" >Licuados</a></div>
            <div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" >Postres</a></div>
        </div>
        <div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" >Platos del Día</a></div>
    </div>

@endsection
