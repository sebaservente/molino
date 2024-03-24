<?php
/**
 * @var \App\Models\Producto[] $productos
 * @var \App\Models\Producto[] $productosBebidas
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3 bg-warning">Bebidas</h1>
    <div class="modal fade" id="staticBackdrop{{ $productosBebidas->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>{{ $productosBebidas->titulo }}</h2>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <div class="div__productos">
        @foreach($productos as $bebidas)
            @if($bebidas->categoria == 'bebidas')
{{--                --}}{{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">--}}
{{--                    Launch demo modal--}}
{{--                </button>--}}
                <a href="#" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $productosBebidas->producto_id }}">
                    <div class="productos my-3 shadow">
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

                        <div class="datos__productos">
                            <p class="datos__parrafo">{{ $bebidas->titulo }}</p>
                            <p class="datos__parrafo">$ <span> {{ $bebidas->precio }}</span></p>
                        </div>
                    </div>
                </a>


            @endif
        @endforeach
    </div>

@endsection
