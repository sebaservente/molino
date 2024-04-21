<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Desayunos y Meriendas')

@section('main')
    <h1 class="text-center my-3 ">Desayunos y Meriendas</h1>

    <div class="div__productos">
        @foreach($productos as $desayuno)
            {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $desayuno->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $desayuno->titulo }}</h2>
                            {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                        </div>
                        <div class="modal-body">
                            <div class="img__productos ">
                                @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100"
                                             alt="{{ $desayuno->imagen_descripcion }}">
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
                            <p class="">{{ $desayuno->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $desayuno->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($desayuno->categoria->nombre == 'Desayunos y Meriendas')
                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $desayuno->producto_id }}">
                        <div class="img__productos">
                            @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                    <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100"
                                         alt="{{ $desayuno->imagen_descripcion }}">
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
                                <p class="datos__parrafo">{{ $desayuno->titulo }}</p>
                                <p class="datos__descripcion">{{ $desayuno->descripcion }}</p>
                            </div>
                            <p class="fw-bold text-dark">$ <span> {{ $desayuno->precio }}</span></p>
                        </div>
                    </a>
                </div>
            @endif

        @endforeach
    </div>

@endsection
