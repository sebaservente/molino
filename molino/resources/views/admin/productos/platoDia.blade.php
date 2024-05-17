<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <div class="div__productos py-3 px-2">
        <h2 class="py-4 px-4 w-100 fontSize1 textBold8 text-uppercase text-center">PLATO DEL DÍA</h2>
        @foreach($productos as $platoDia)
           {{-- todo Ventana Modal : Luego Hacer un componente--}}

            <div class="modal fade" id="staticBackdrop{{ $platoDia->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{$platoDia->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
{{--                                @if($platoDia->imagen != null && Storage::disk('public')->has('img/reserva/' . $platoDia->imagen))--}}
                                @if($platoDia->imagen != null && public_path('img/reserva' . '/' . $platoDia->imagen))
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ url('img/reserva/' .$platoDia->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ url('img/reserva/' . $platoDia->imagen) }}">
                                        <img src="{{ url('img/reserva/' . $platoDia->imagen) }}" class="w-100"
                                             alt="{{ $platoDia->imagen_descripcion }}">
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
                            <p class="">{{ $platoDia->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platoDia->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <div class="btn__productosAdmin">
                                    <div class="hola px-2"><a href="{{ route('admin.upload' ,['id' => $platoDia->producto_id]) }}" class="text-decoration-none text-dark "><i class="bi bi-pencil-square px-1"></i>Actualizar</a></div>
                                    <div class="btnEliminarAdmin px-2">
                                        <a href="#" class="text-decoration-none text-dark "  data-bs-toggle="modal" data-bs-target="#staticBackdrop2{{ $platoDia->producto_id }}"><i class="bi bi-trash px-1"></i>Eliminar</a>
                                    </div>
                            </div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="staticBackdrop2{{ $platoDia->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $platoDia->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
                                @if($platoDia->imagen != null && public_path('img/reserva' . '/' . $platoDia->imagen))
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ url('img/reserva/' . $platoDia->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ url('img/reserva/' . $platoDia->imagen) }}">
                                        <img src="{{ url('img/reserva/' . $platoDia->imagen) }}" class="w-100"
                                             alt="{{ $platoDia->imagen_descripcion }}">
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
                            <p class="">{{ $platoDia->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platoDia->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('admin.delete', ['id' => $platoDia->producto_id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Eliminar</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            @if($platoDia->categoria->nombre == 'Plato del Día')
                <div class="div__adminProductos shadow mx-1 my-2">
                    <a href="#" class="text-decoration-none text-dark d-flex w-100 " data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $platoDia->producto_id }}">
                        <div class="img__productosAdmin shadow">
                            @if($platoDia->imagen != null && public_path('img/reserva' . '/' .$platoDia->imagen))
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ url('img/reserva/' . $platoDia->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ url('img/reserva/' . $platoDia->imagen) }}">
                                    <img src="{{ url('img/reserva/' . $platoDia->imagen) }}" class="w-100"
                                         alt="{{$platoDia->imagen_descripcion }}">
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
                            <p class="datos__parrafoAdmin m-0 py-1">{{ $platoDia->titulo }}</p>
                          {{--  <p class="datos__descripcion">{{ $platoDia->descripcion }}</p>--}}
                        </div>
                        {{--<p class="fw-bold text-dark">$ <span> {{ $platoDia->precio }}</span></p>--}}
                    </div>
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endsection
