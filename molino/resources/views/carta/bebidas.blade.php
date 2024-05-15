<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3 ">Bebidas</h1>

    <div class="div__productos">
        @foreach($productos as $bebidas)
            {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $bebidas->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $bebidas->titulo }}</h2>
                            {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($bebidas->imagen != null && public_path('img/reserva') . '/' . $bebidas->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $bebidas->imagen) }}" class="w-100"
                                             alt="{{ $bebidas->imagen_descripcion }}">
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
                            <p class="">{{ $bebidas->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $bebidas->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($bebidas->categoria->nombre == 'Bebidas')
                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $bebidas->producto_id }}">
{{--                        <div class="img__productos">--}}
{{--                            @if($bebidas->imagen != null && public_path('img/reserva') . '/' . $bebidas->imagen)--}}
{{--                                <picture class="">--}}
{{--                                    <source media="(min-width: 751px)"--}}
{{--                                            srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">--}}
{{--                                    <source media="(min-width: 380px)"--}}
{{--                                            srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">--}}
{{--                                    <img src="{{ asset('img/reserva/' . $bebidas->imagen) }}" class="w-100"--}}
{{--                                         alt="{{ $bebidas->imagen_descripcion }}">--}}
{{--                                </picture>--}}
{{--                            @else--}}
{{--                                <picture class="">--}}
{{--                                    <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">--}}
{{--                                    <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">--}}
{{--                                    <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"--}}
{{--                                         alt="Imagen logo de la marca">--}}
{{--                                </picture>--}}
{{--                            @endif--}}
{{--                        </div>--}}
                        <div class="datos__productos">
                            <div class="div__datos w-75">
                                <p class="datos__parrafo">{{ $bebidas->titulo }}</p>
                                <p class="datos__descripcion">{{ $bebidas->descripcion }}</p>
                            </div>
                            <p class="fw-bold text-dark parrafoPrecio">$ <span> {{ $bebidas->precio }}</span></p>
                        </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>

@endsection
