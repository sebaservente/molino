<?php
/**
 * @var
 */
?>
@extends('template.main')

@section('title', 'Home')

@section('main')
    <h1 class="text-center mt-4">Mill</h1>
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
    <div class="divModalMill drop-shadow-lg">
        <picture class="picture__img w-10">
            <source media="(min-width: 751px)" srcset="<?= url('img/molino.png'); ?>"<?= url('../img/molino.png'); ?>>
            <source media="(min-width: 380px)" srcset="<?= url('img/molino.png'); ?>">
            <img src="<?= url('img/molino.png'); ?>" class="rounded rounded-full m-auto" alt="Mi imagen responsive">
        </picture>
        <div class="">
            <h2 class="">Mill</h2>
            <h3 class="">Raul scalabrini ortiz 801</h3>
            <h4 class=""><span>Horarios</span></h4>
            <p class="fw-bold"><span>Lunes a viernes</span> 8:00hs a 20:00hs</p>
            <p class="fw-bold"><span>Sabados</span> 10:00hs a 20:00hs</p>
            <p class="fw-bold"><span>Domingos</span> Cerrados</p>
        </div>
    </div>
@endsection
