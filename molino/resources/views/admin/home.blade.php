<?php
/**
 * @var \App\Models\Producto[] $productos
 * @var array $buscarParams
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="py-4 px-3  fontSize1 textBold8 text-uppercase text-center">Administración Mill</h1>
    <div class="div__index">

        <div class="menuHome mt-4">
            <div class="my-1 w-100 border"><a href="{{ route('admin.desayuno' ) }}" class="btn btn-none w-100 fontSize1_5" >Desayunos y Meriendas</a></div>
            <div class="my-1">
                <div class="my-1 w-100 border"><a href="{{ route('admin.cafeteria' ) }}" class="btn btn-none w-100 fontSize1_5" >Cafeteria</a></div>
                <div class="my-1 w-100 border"><a href="{{ route('admin.platos' ) }}" class="btn btn-none w-100 fontSize1_5" >Platos</a></div>
            </div>
            <div class="my-1">
                <div class="my-1 w-100 border"><a href="{{ route('admin.ensaladas' ) }}" class="btn btn-none w-100 fontSize1_5" >Ensaladas</a></div>
                <div class="my-1 w-100 border"><a href="{{ route('admin.bebidas' ) }}" class="btn btn-none w-100 fontSize1_5" >Bebidas</a></div>
            </div>
            <div class="my-1">
                <div class="my-1 w-100 border"><a href="{{ route('admin.licuados') }}" class="btn btn-none w-100 fontSize1_5" >Licuados</a></div>
                <div class="my-1 w-100 border"><a href="{{ route('admin.postres')}}" class="btn btn-none w-100 fontSize1_5" >Postres</a></div>
            </div>
            <div class="my-1 w-100 border"><a href="{{ route('admin.promos') }}" class="btn btn-none w-100 fontSize1_5" >Promos</a></div>
            <div class="my-1 w-100 border"><a href="{{ route('admin.platoDia') }}" class="btn btn-none w-100 fontSize1_5" >Platos del Día</a></div>
            <div class="my-1 w-100 border"><a href="{{ route('admin.papelera') }}" class="btn btn-none w-100 fontSize1_5" >Papelera</a></div>

        </div>
        <div class="divBuscador  mb-3">
            <h2 class="textBold8">Buscador</h2>
            <form action="{{ route('admin.home') }}" method="GET">
                <div class="my-2">
                    <label for="b-titulo" class="form-label" hidden="">Titulo</label>
                    <input type="text" id="b-titulo" name="titulo" class="form-control" value="{{ $buscarParams['titulo'] ?? null }}">
                </div>
                <button type="submit" class="btn btn-dark">Buscar</button>
            </form>
            <div class="div__productos">
                @foreach($productos as $producto)
                    {{-- todo Ventana Modal : Luego Hacer un componente--}}

                    <div class="modal fade" id="staticBackdrop{{ $producto->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content text-center">
                                <div class="modal-header">
                                    <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $producto->titulo }}</h2>
                                    {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
                                </div>
                                <div class="modal-body">
                                    {{--<div class="img__productos">
                                        @if($producto->imagen != null && public_path('img/reserva') . '/' . $producto->imagen)
                                            <picture class="">
                                                <source media="(min-width: 751px)"
                                                        srcset="{{ asset('img/reserva/' . $producto->imagen) }}">
                                                <source media="(min-width: 380px)"
                                                        srcset="{{ asset('img/reserva/' . $producto->imagen) }}">
                                                <img src="{{ asset('img/reserva/' . $producto->imagen) }}" class="w-100"
                                                     alt="{{ $producto->imagen_descripcion }}">
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
                                    <p class="">{{ $producto->descripcion }}</p>
                                    <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $producto->precio }}</span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                </div>
                            </div>
                            <div class="productos ">
                                <a href="#" class="text-decoration-none shadow">
                                    {{--                        <div class="img__productos">--}}
                                    {{--                            @if($producto->imagen != null && public_path('img/reserva') . '/' . $producto->imagen)--}}
                                    {{--                                <picture class="">--}}
                                    {{--                                    <source media="(min-width: 751px)"--}}
                                    {{--                                            srcset="{{ asset('img/reserva/' . $producto->imagen) }}">--}}
                                    {{--                                    <source media="(min-width: 380px)"--}}
                                    {{--                                            srcset="{{ asset('img/reserva/' . $producto->imagen) }}">--}}
                                    {{--                                    <img src="{{ asset('img/reserva/' . $producto->imagen) }}" class="w-100"--}}
                                    {{--                                         alt="{{ $producto->imagen_descripcion }}">--}}
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
                                            <p class="datos__parrafo">{{ $producto->titulo }}</p>
                                            <p class="datos__descripcion">{{ $producto->descripcion }}</p>
                                        </div>
                                        <p class="fw-bold text-dark parrafoPrecio">$ <span> {{ $producto->precio }}</span></p>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                    <div class="productos ">
                        <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $producto->producto_id }}">
                            {{--                        <div class="img__productos">--}}
                            {{--                            @if($producto->imagen != null && public_path('img/reserva') . '/' . $producto->imagen)--}}
                            {{--                                <picture class="">--}}
                            {{--                                    <source media="(min-width: 751px)"--}}
                            {{--                                            srcset="{{ asset('img/reserva/' . $producto->imagen) }}">--}}
                            {{--                                    <source media="(min-width: 380px)"--}}
                            {{--                                            srcset="{{ asset('img/reserva/' . $producto->imagen) }}">--}}
                            {{--                                    <img src="{{ asset('img/reserva/' . $producto->imagen) }}" class="w-100"--}}
                            {{--                                         alt="{{ $producto->imagen_descripcion }}">--}}
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
                                    <p class="datos__parrafoAdmin">{{ $producto->titulo }}</p>
                                    {{--<p class="datos__descripcion">{{ $producto->descripcion }}</p>--}}
                                </div>
                                <p class="fw-bold text-dark parrafoPrecio">$ <span> {{ $producto->precio }}</span></p>
                            </div>
                        </a>
                    </div>

                @endforeach
            </div>
        </div>
    </div>


@endsection
