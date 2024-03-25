<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3 bg-warning">Cafeteria</h1>

    <div class="div__productos">
        @foreach($productos as $cafeterias)

            {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $cafeterias->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($cafeterias->imagen != null && public_path('img/reserva') . '/' . $cafeterias->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $cafeterias->imagen) }}" class="w-100"
                                             alt="{{ $cafeterias->imagen_descripcion }}">
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
                            <h2>{{ $cafeterias->titulo }}</h2>
                            <p class="textBold8">Precio: $ <span class="textBold4">{{ $cafeterias->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

        @if($cafeterias->categoria == 'cafeteria')
                <a href="#" class="text-decoration-none"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $cafeterias->producto_id }}">
                    <div class="productos my-3 shadow">
                        <div class="img__productos">
                            @if($cafeterias->imagen != null && public_path('img/reserva') . '/' . $cafeterias->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                    <img src="{{ asset('img/reserva/' . $cafeterias->imagen) }}" class="w-100"
                                         alt="{{ $cafeterias->imagen_descripcion }}">
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
                            <p class="datos__parrafo">{{ $cafeterias->titulo }}</p>
                            <p class="datos__parrafo">$ <span> {{ $cafeterias->precio }}</span></p>
                        </div>
                    </div>
                </a>

            @endif
        @endforeach
    </div>

@endsection
