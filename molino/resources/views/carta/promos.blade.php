<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Platos')

@section('main')

    <h1 class="text-center my-3">Promos</h1>
    {{--<div class="img__productos shadow">
        <picture class="">
            <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
            <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
            <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                 alt="Imagen logo de la marca">
        </picture>
    </div>--}}
    <div class="div__productos">
        @foreach($productos as $promos)
            {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $promos->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $promos->titulo }}</h2>
                            {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                        </div>
                        <div class="modal-body">
                            {{--<div class="img__productos">
                                @if($promos->imagen != null && public_path('img/reserva') . '/' . $promos->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $promos->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $promos->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $promos->imagen) }}" class="w-100"
                                             alt="{{ $promos->imagen_descripcion }}">
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
                            <p class="">{{ $promos->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $promos->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($promos->categoria->nombre == 'Promos')
                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $promos->producto_id }}">
                        {{--<div class="img__productos">
                            @if($promos->imagen != null && public_path('img/reserva') . '/' . $promos->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ asset('img/reserva/' . $promos->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ asset('img/reserva/' . $promos->imagen) }}">
                                    <img src="{{ asset('img/reserva/' . $promos->imagen) }}" class="w-100"
                                         alt="{{ $promos->imagen_descripcion }}">
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
                        <div class="datos__productos">
                            <div class="div__datos w-75">
                                <p class="datos__parrafo">{{ $promos->titulo }}</p>
                                <p class="datos__descripcion">{{ $promos->descripcion }}</p>
                            </div>
                            <p class="fw-bold text-dark parrafoPrecio">$ <span> {{ $promos->precio }}</span></p>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>

@endsection
