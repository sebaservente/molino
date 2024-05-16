<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Desayunos y Meriendas')

@section('main')
    <h1 class="text-center my-3 ">Licuados</h1>
    {{--<div class="img__productosHome shadow">
        <picture class="">
            <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
            <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
            <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                 alt="Imagen logo de la marca">
        </picture>
    </div>--}}
    <div class="div__productos">
        @foreach($productos as $licuados)
             todo Ventana Modal : Luego Hacer un componente

            <div class="modal fade" id="staticBackdrop{{ $licuados->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $licuados->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos ">
                                @if($licuados->imagen != null && public_path('img/reserva') . '/' . $licuados->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $licuados->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $licuados->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $licuados->imagen) }}" class="w-100"
                                             alt="{{ $licuados->imagen_descripcion }}">
                                    </picture>
                                @else
                                    <picture class="">
                                        <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                        <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                        <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                                             alt="Imagen logo de la marca">
                                    </picture>
                                @endif
                            </div>
                            <p class="">{{ $licuados->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $licuados->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($licuados->categoria->nombre == 'Licuados')
                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $licuados->producto_id }}">
                        <div class="img__productos">
                            @if($licuados->imagen != null && public_path('img/reserva') . '/' . $licuados->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ asset('img/reserva/' . $licuados->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ asset('img/reserva/' . $licuados->imagen) }}">
                                    <img src="{{ asset('img/reserva/' . $licuados->imagen) }}" class="w-100"
                                         alt="{{ $licuados->imagen_descripcion }}">
                                </picture>
                            @else
                                <picture class="">
                                    <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                    <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                    <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                                         alt="Imagen logo de la marca">
                                </picture>
                            @endif
                        </div>
                        <div class="datos__productos">
                            <div class="div__datos w-75">
                                <p class="datos__parrafo">{{ $licuados->titulo }}</p>
                                <p class="datos__descripcion">{{ $licuados->descripcion }}</p>
                            </div>
                            <p class="fw-bold text-dark parrafoPrecio">$ <span> {{ $licuados->precio }}</span></p>
                        </div>
                    </a>
                </div>
            @endif

        @endforeach
    </div>

@endsection
