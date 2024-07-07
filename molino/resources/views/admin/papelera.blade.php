<?php
/**
 * @var \App\Models\Producto[] $productos
 * @var array $buscarParams
 */
?>
@extends('template.admin')

@section('title', 'Papelera Mill')

@section('admin')
    <h1 class="py-4 px-3  fontSize1 textBold8 text-uppercase text-center">Papelera</h1>
    <div class="div__index">
        <div class="divBuscador  mb-3">

            <div class="div__productos">


                    @if($productos->isNotEmpty())
                        @foreach($productos as $papelera)
                            {{-- todo Ventana Modal : Luego Hacer un componente--}}

                            <div class="modal fade" id="staticBackdrop{{ $papelera->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content text-center">
                                        <div class="modal-header">
                                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $papelera->titulo }}</h2>
                                            {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                        </div>
                                        <div class="modal-body">
                                            {{--<div class="img__productos">
                                                @if($papelera->imagen != null && public_path('img/reserva') . '/' . $papelera->imagen)
                                                    <picture class="">
                                                        <source media="(min-width: 751px)"
                                                                srcset="{{ asset('img/reserva/' . $papelera->imagen) }}">
                                                        <source media="(min-width: 380px)"
                                                                srcset="{{ asset('img/reserva/' . $papelera->imagen) }}">
                                                        <img src="{{ asset('img/reserva/' . $papelera->imagen) }}" class="w-100"
                                                             alt="{{ $papelera->imagen_descripcion }}">
                                                    </picture>
                                                @else
                                                    <picture class="">
                                                        <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                                        <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                                        <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                                                             alt="Imagen logo de la marca">
                                                    </picture>
                                                @endif
                                            </div>--}}
                                            <p class="">{{ $papelera->descripcion }}</p>
                                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $papelera->precio }}</span></p>
                                        </div>
                                        <div class="modal-footer">
                                            <div>
                                                <form action="{{ route('admin.restaurar', ['id' => $papelera->producto_id]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-dark" type="submit">Restaurar</button>
                                                </form>
                                            </div>
                                            <div>
                                                <form action="{{ route('admin.eliminar', ['id' => $papelera->producto_id]) }}" method="POST">
                                                    @csrf
                                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                                </form>
                                            </div>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="productos ">
                            <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $papelera->producto_id }}">
                                {{--                        <div class="img__productos">--}}
                                {{--                            @if($papelera->imagen != null && public_path('img/reserva') . '/' . $papelera->imagen)--}}
                                {{--                                <picture class="">--}}
                                {{--                                    <source media="(min-width: 751px)"--}}
                                {{--                                            srcset="{{ asset('img/reserva/' . $papelera->imagen) }}">--}}
                                {{--                                    <source media="(min-width: 380px)"--}}
                                {{--                                            srcset="{{ asset('img/reserva/' . $papelera->imagen) }}">--}}
                                {{--                                    <img src="{{ asset('img/reserva/' . $papelera->imagen) }}" class="w-100"--}}
                                {{--                                         alt="{{ $papelera->imagen_descripcion }}">--}}
                                {{--                                </picture>--}}
                                {{--                            @else--}}
                                {{--                                <picture class="">--}}
                                {{--                                    <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">--}}
                                {{--                                    <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">--}}
                                {{--                                    <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"--}}
                                {{--                                         alt="Imagen logo de la marca">--}}
                                {{--                                </picture>--}}
                                {{--                            @endif--}}
                                {{--                        </div>--}}
                                <div class="datos__productos">
                                    <div class="div__datos w-75">
                                        <p class="datos__parrafo">{{ $papelera->titulo }}</p>
                                        <p class="datos__descripcion">{{ $papelera->descripcion }}</p>
                                    </div>
                                    <p class="fw-bold text-dark parrafoPrecio">$ <span> {{ $papelera->precio }}</span></p>

                                </div>
                            </a>
                        </div>


                      @endforeach
                    @else
                        <div class="w-100 text-center bg-dark p-3 text-light rounded shadow">
                            <h3 class="w-100">No tienes productos eliminados</h3>
                        </div>
                    @endif


            </div>
        </div>
    </div>


@endsection
