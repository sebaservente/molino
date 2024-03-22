<?php
/**
 * @var \App\Models\Desayuno[] $desayunos
 */
?>
@extends('template.main')

@section('title', 'Desayunos y Meriendas')

@section('main')
    <h1 class="text-center my-3">Mill Desayunos y Meriendas</h1>

    <div class="div__productos">
        @foreach($desayunos as $desayuno)
            <div class="productos my-3 shadow">
                <div class="img__productos">
                    @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                        <picture class="">
                            <source media="(min-width: 751px)" srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                            <source media="(min-width: 380px)" srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                            <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100" alt="{{ $desayuno->imagen_descripcion }}">
                        </picture>
                    @else
                        <picture class="">
                            <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
                            <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
                            <img src="{{ asset('img/cafeCleche.png') }}" class="w-100" alt="Imagen logo de la marca">
                        </picture>
                    @endif
                </div>

                <div class="datos__productos">
                    <p class="datos__parrafo">{{ $desayuno->titulo }}</p>
                    <p class="datos__parrafo">$ <span> {{ $desayuno->precio }}</span></p>
                </div>
            </div>

        @endforeach
    </div>

@endsection
