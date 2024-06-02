<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Home')

@section('main')
    <h1 class="text-center mt-4 w-100 nombre_mill"></h1>

   <div class="div__index">
       <div class="menuHome mt-4">
           <div class="my-1 rounded w-100 border "><a href="{{ route('desayunos' ) }}" class="btn btn-none w-100 fontSize1_5" >Desayunos y Meriendas</a></div>
           <div class="my-1">
               <div class="my-1 rounded w-100 border "><a href="{{ route('cafeteria' ) }}" class="btn btn-none w-100 fontSize1_5" >Cafeteria</a></div>
               <div class="my-1 rounded w-100 border "><a href="{{ route('platos' ) }}" class="btn btn-none w-100 fontSize1_5" >Platos</a></div>
           </div>
           <div class="my-1">
               <div class="my-1 rounded w-100 border "><a href="{{ route('ensaladas' ) }}" class="btn btn-none w-100 fontSize1_5" >Ensaladas</a></div>
               <div class="my-1 rounded w-100 border "><a href="{{ route('bebidas' ) }}" class="btn btn-none w-100 fontSize1_5" >Bebidas</a></div>
           </div>
           <div class="my-1">
               <div class="my-1 rounded w-100 border "><a href="{{ route('licuados') }}"  class="btn btn-none w-100 fontSize1_5" >Licuados</a></div>
               <div class="my-1 rounded w-100 border "><a href="{{ route('postres')}}" class="btn btn-none w-100 fontSize1_5" >Postres</a></div>
           </div>
           <div class="my-1 rounded w-100 border "><a href="{{ route('promos') }}" class="btn btn-none w-100 fontSize1_5" >Promos</a></div>
           {{--<div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $platoDia->producto_id }}" >Platos del Día</a></div>--}}
       </div>
       {{--HORARIOS MILL--}}
       <div class="divModalMill ">
           <div class="w-100 d-flex align-items-center mb-3">
               <picture class="picture__img w-10">
                   <source media="(min-width: 751px)" srcset="<?= url('img/molino.png'); ?>"<?= url('../img/molino.png'); ?>>
                   <source media="(min-width: 380px)" srcset="<?= url('img/molino.png'); ?>">
                   <img src="<?= url('img/molino.png'); ?>" class="rounded rounded-full m-auto" alt="Mi imagen responsive">
               </picture>
               <h2 class="nombre_mill_chico"></h2>
           </div>
           <div class="">
               <h3 class="">Raul Scalabrini Ortiz 801</h3>
               <div>
                   <h4 class=""><span>Horarios</span></h4>
                   <div>
                       <p class="fw-bold m-0">Lunes a viernes </p>
                       <p class="m-0 px-1">8:00hs a 20:00hs</p>
                   </div>
                   <div>
                       <p class="fw-bold m-0">Sabados</p>
                       <p class="m-0 px-1">10:00hs a 20:00hs</p>
                   </div>
                   <div>
                       <p class="fw-bold m-0">Domingos</p>
                       <p class="m-0 px-1">Cerrados</p>
                   </div>

               </div>

           </div>
       </div>
   </div>

@endsection
