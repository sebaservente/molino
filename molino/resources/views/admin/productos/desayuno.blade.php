<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('desayuno')
    <h1 class="py-4 px-4   fontSize1 textBold8 text-uppercase">DESAYUNOS Y MERIENDAS</h1>
    <div class="div__productos py-3 px-2">
        <h2 class="text-center fontSize1">Desayunos y Meriendas</h2>
        @foreach($productos as $desayuno)
           {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $desayuno->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $desayuno->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100"
                                             alt="{{ $desayuno->imagen_descripcion }}">
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
                            <p class="">{{ $desayuno->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $desayuno->precio }}</span></p>
                        </div>
                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop2{{ $desayuno->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $desayuno->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100"
                                             alt="{{ $desayuno->imagen_descripcion }}">
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
                            <p class="">{{ $desayuno->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $desayuno->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.delete', ['id' => $desayuno->producto_id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($desayuno->categoria->nombre == 'Desayunos y Meriendas')
                <div class="div__adminProductos shadow px-2 my-2">
                    <div class="img__productosAdmin shadow">
                        @if($desayuno->imagen != null && public_path('img/reserva') . '/' . $desayuno->imagen)
                            <picture class="">
                                <source media="(min-width: 751px)"
                                        srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                <source media="(min-width: 380px)"
                                        srcset="{{ asset('img/reserva/' . $desayuno->imagen) }}">
                                <img src="{{ asset('img/reserva/' . $desayuno->imagen) }}" class="w-100"
                                     alt="{{ $desayuno->imagen_descripcion }}">
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
                    <div class="datos__productosAdmin">
                        <div class="div__datosAdmin">
                          {{--  <p class="datos__parrafoAdmin text-center">{{ $desayuno->titulo }}</p>--}}
                          {{--  <p class="datos__descripcion">{{ $desayuno->descripcion }}</p>--}}
                        </div>
                        {{--<p class="fw-bold text-dark">$ <span> {{ $desayuno->precio }}</span></p>--}}
                    </div>
                    {{--<div class="btn__productosAdmin">
                        <div class="hola px-2"><a href="#" class="text-decoration-none text-dark "  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $desayuno->producto_id }}"><i class="bi bi-eye px-1"></i>Ver</a></div>
                        <div class="hola px-2"><a href="{{ route('admin.upload' ,['id' => $desayuno->producto_id]) }}" class="text-decoration-none text-dark "><i class="bi bi-pencil-square px-1"></i>Editar</a></div>
                        <div class="btnEliminarAdmin px-2">
                            <a href="#" class="text-decoration-none text-dark "  data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{ $desayuno->producto_id }}"><i class="bi bi-trash px-1"></i>Eliminar</a>
                        </div>
                    </div>--}}
                </div>
            @endif
        @endforeach
    </div>
@endsection
