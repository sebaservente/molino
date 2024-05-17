<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Home')

@section('main')
    <h1 class="text-center mt-4">Mill</h1>
    @foreach($productos as $platoDia)
    <div class="modal fade" id="staticBackdrop{{ $platoDia->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $platoDia->titulo }}</h2>
                    {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                </div>
                <div class="modal-body">
                    {{--<div class="img__productos">
                        @if($postres->imagen != null && public_path('img/reserva') . '/' . $postres->imagen)
                            <picture class="">
                                <source media="(min-width: 751px)"
                                        srcset="{{ asset('img/reserva/' . $postres->imagen) }}">
                                <source media="(min-width: 380px)"
                                        srcset="{{ asset('img/reserva/' . $postres->imagen) }}">
                                <img src="{{ asset('img/reserva/' . $postres->imagen) }}" class="w-100"
                                     alt="{{ $postres->imagen_descripcion }}">
                            </picture>
                        @else
                            <picture class="">
                                <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                                     alt="Imagen logo de la marca">
                            </picture>
                        @endif
                    </div>--}}
                    <p class="">{{ $platoDia->descripcion }}</p>
                    <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platoDia->precio }}</span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
        <div class="my-1 w-100 border"><a href="{{ 'promos' }}" class="btn btn-none w-100 fontSize1_5" >Promos</a></div>

        <div class="my-1 w-100 border"><a href="" class="btn btn-none w-100 fontSize1_5" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $platoDia->producto_id }}" >Platos del Día</a></div>

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
