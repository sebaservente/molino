<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3 bg-warning">Platos</h1>

    <div class="div__productos">
        @foreach($productos as $platos)
            @if($platos->categoria == 'platos')
                <div class="productos my-3 shadow">
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
                        <p class="datos__parrafo">{{ $platos->titulo }}</p>
                        <p class="datos__parrafo">$ <span> {{ $platos->precio }}</span></p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
