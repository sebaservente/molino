<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3 bg-warning">Ensaladas</h1>

    <div class="div__productos">
        @foreach($productos as $ensaladas)
            @if($ensaladas->categoria == 'ensaladas')
                <div class="productos my-3 shadow">
                    <div class="img__productos">
                        @if($ensaladas->imagen != null && public_path('img/reserva') . '/' . $ensaladas->imagen)
                            <picture class="">
                                <source media="(min-width: 751px)"
                                        srcset="{{ asset('img/reserva/' . $ensaladas->imagen) }}">
                                <source media="(min-width: 380px)"
                                        srcset="{{ asset('img/reserva/' . $ensaladas->imagen) }}">
                                <img src="{{ asset('img/reserva/' . $ensaladas->imagen) }}" class="w-100"
                                     alt="{{ $ensaladas->imagen_descripcion }}">
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
                        <p class="datos__parrafo">{{ $ensaladas->titulo }}</p>
                        <p class="datos__parrafo">$ <span> {{ $ensaladas->precio }}</span></p>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection
