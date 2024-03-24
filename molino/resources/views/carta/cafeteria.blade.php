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
            @if($cafeterias->categoria == 'cafeteria')
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
            @endif
        @endforeach
    </div>

@endsection
