<?php
/**
 * @var \App\Models\Desayuno[] $desayunos
 */
?>
@extends('template.main')

@section('title', 'Desayunos y Meriendas')

@section('main')
    <h1 class="text-center my-3">Mill Desayunos y Meriendas</h1>

    <div class="div_productos">
        @foreach($desayunos as $desayuno)
            <div class="productos my-3 shadow">
                <div class="img_productos">
                    @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                        <picture class="">
                            <source media="(min-width: 751px)" srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                            <source media="(min-width: 380px)" srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                            <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100" alt="{{ $desayuno->imagen_descripcion }}">
                        </picture>
                    @else
                        <picture class="">
                            <source media="(min-width: 751px)" srcset="{{ asset('img/molino.png') }}">
                            <source media="(min-width: 380px)" srcset="{{ asset('img/molino.png') }}">
                            <img src="{{ asset('img/molino.png') }}" class="w-100" alt="Imagen logo de la marca">
                        </picture>
                    @endif
                </div>

                <div class="datos_productos">
                    <p>{{ $desayuno->titulo }}</p>
                    <p>$ {{ $desayuno->precio }}</p>
                </div>
            </div>

        @endforeach
    </div>

@endsection
