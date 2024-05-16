<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="py-4 px-3  fontSize1 textBold8 text-uppercase">Administración Mill</h1>
    <div class="menuHome mt-4">
        <div class="my-1 w-100 border"><a href="{{ route('admin.desayuno' ) }}" class="btn btn-none w-100 fontSize1_5" >Desayunos y Meriendas</a></div>
        <div class="my-1">
            <div class="my-1 w-100 border"><a href="{{ route('admin.cafeteria' ) }}" class="btn btn-none w-100 fontSize1_5" >Cafeteria</a></div>
            <div class="my-1 w-100 border"><a href="{{ route('admin.platos' ) }}" class="btn btn-none w-100 fontSize1_5" >Platos</a></div>
        </div>
        <div class="my-1">
            <div class="my-1 w-100 border"><a href="{{ route('admin.ensaladas' ) }}" class="btn btn-none w-100 fontSize1_5" >Ensaladas</a></div>
            <div class="my-1 w-100 border"><a href="{{ route('admin.bebidas' ) }}" class="btn btn-none w-100 fontSize1_5" >Bebidas</a></div>
        </div>
        <div class="my-1">
            <div class="my-1 w-100 border"><a href="{{ route('admin.licuados') }}" class="btn btn-none w-100 fontSize1_5" >Licuados</a></div>
            <div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" >Postres</a></div>
        </div>
        <div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" >Platos del Día</a></div>
    </div>

@endsection
