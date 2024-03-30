<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3">Platos</h1>

    <div class="div__productos">
        @foreach($productos as $platos)
            {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $platos->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $platos->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($platos->imagen != null && public_path('img/reserva') . '/' . $platos->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $platos->imagen) }}" class="w-100"
                                             alt="{{ $platos->imagen_descripcion }}">
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
                            <p class="">{{ $platos->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platos->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($platos->categoria == 'platos')
                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $platos->producto_id }}">
                        <div class="img__productos">
                            @if($platos->imagen != null && public_path('img/reserva') . '/' . $platos->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                    <img src="{{ asset('img/reserva/' . $platos->imagen) }}" class="w-100"
                                         alt="{{ $platos->imagen_descripcion }}">
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
                            <div class="div__datos">
                                <p class="datos__parrafo">{{ $platos->titulo }}</p>
                                <p class="datos__descripcion">{{ $platos->descripcion }}</p>
                            </div>
                            <p class="fw-bold text-dark">$ <span> {{ $platos->precio }}</span></p>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>

@endsection
