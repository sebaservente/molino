<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <div class="div__productos py-3 px-2">
        <h2 class="py-4 px-4 w-100 fontSize1 textBold8 text-uppercase text-center">Platos</h2>
        @foreach($productos as $platos)
           {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $platos->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $platos->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
{{--                                @if($platos->imagen != null && Storage::disk('public')->has('img/reserva/' . $platos->imagen))--}}
                                @if($platos->imagen != null && 'img' . '/' . $platos->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ url('img/' . $platos->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ url('img/' . $platos->imagen) }}">
                                        <img src="{{ url('img/' . $platos->imagen) }}" class="w-100"
                                             alt="{{ $platos->imagen_descripcion }}">
                                    </picture>
                                @else
                                    <picture class="">
                                        <source media="(min-width: 751px)" srcset="{{ url('img/cafeCleche.png') }}">
                                        <source media="(min-width: 380px)" srcset="{{ url('img/cafeCleche.png') }}">
                                        <img src="{{ url('img/cafeCleche.png') }}" class="w-100"
                                             alt="Imagen logo de la marca">
                                    </picture>
                                @endif
                            </div>
                            <p class="">{{ $platos->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platos->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <div class="btn__productosAdmin">
                                    <div class="hola px-2"><a href="{{ route('admin.upload' ,['id' => $platos->producto_id]) }}" class="text-decoration-none text-dark "><i class="bi bi-pencil-square px-1"></i>Actualizar</a></div>
                                    <div class="btnEliminarAdmin px-2">
                                        <a href="#" class="text-decoration-none text-dark "  data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{ $platos->producto_id }}"><i class="bi bi-trash px-1"></i>Eliminar</a>
                                    </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop2{{ $platos->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $platos->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($platos->imagen != null && 'img' . '/' . $platos->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ url('img/' . $platos->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ url('img/' . $platos->imagen) }}">
                                        <img src="{{ url('img/' . $platos->imagen) }}" class="w-100"
                                             alt="{{ $platos->imagen_descripcion }}">
                                    </picture>
                                @else
                                    <picture class="">
                                        <source media="(min-width: 751px)" srcset="{{ url('img/cafeCleche.png') }}">
                                        <source media="(min-width: 380px)" srcset="{{ url('img/cafeCleche.png') }}">
                                        <img src="{{ url('img/cafeCleche.png') }}" class="w-100"
                                             alt="Imagen logo de la marca">
                                    </picture>
                                @endif
                            </div>
                            <p class="">{{ $platos->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platos->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.delete', ['id' => $platos->producto_id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($platos->categoria->nombre == 'Platos')
                <div class="div__adminProductos shadow mx-1 my-2">
                    <a href="#" class="text-decoration-none text-dark d-flex w-100 " data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $platos->producto_id }}">
                        <div class="img__productosAdmin ">
                            @if($platos->imagen != null && 'img' . '/' . $platos->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ url('img/' . $platos->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ url('img/' . $platos->imagen) }}">
                                    <img src="{{ url('img/' . $platos->imagen) }}" class="w-100"
                                         alt="{{ $platos->imagen_descripcion }}">
                                </picture>
                            @else
                                <picture class="">
                                    <source media="(min-width: 751px)" srcset="{{ url('img/cafeCleche.png') }}">
                                    <source media="(min-width: 380px)" srcset="{{ url('img/cafeCleche.png') }}">
                                    <img src="{{ url('img/cafeCleche.png') }}" class="w-100"
                                         alt="Imagen logo de la marca">
                                </picture>
                            @endif
                        </div>
                        <div class="datos__productosAdmin">
                        <div class="div__datosAdmin w-100 px-1">
                            <p class="datos__parrafoAdmin m-0 py-1">{{ $platos->titulo }}</p>
                          {{--  <p class="datos__descripcion">{{ $platos->descripcion }}</p>--}}
                        </div>
                        {{--<p class="fw-bold text-dark">$ <span> {{ $platos->precio }}</span></p>--}}
                    </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endsection
