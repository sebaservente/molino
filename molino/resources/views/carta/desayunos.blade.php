<?php
/**
 * @var \App\Models\Desayuno[] $desayunos
 */
?>
@extends('template.main')

@section('title', 'Desayunos y Meriendas')

@section('main')
    <h1 class="text-center my-3">Mill Desayunos y Meriendas</h1>
    <a href="{{ route('index') }}" class="text-decoration-none text-dark">Home</a>
    <div>
        @foreach($desayunos as $auto)
            <p>{{ $auto->titulo }}</p>
            <p>$ {{ $auto->precio }}</p>
        @endforeach
    </div>

@endsection
