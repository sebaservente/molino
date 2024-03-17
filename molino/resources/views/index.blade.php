<?php
/**
 * @var
 */
?>
@extends('template.main')

@section('title', 'Home')

@section('main')
    <h1 class="text-center my-3">Mill Home</h1>
    <a href="{{ route('desayunos' ) }}" class="text-decoration-none text-dark" >Desayunos y Meriendas</a>
@endsection
