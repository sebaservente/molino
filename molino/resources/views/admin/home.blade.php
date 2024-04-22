<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="pt-4 text-center textBold8 text-uppercase">Panel de Administración</h1>
    <div class="home__panel">
        {{--DESAYUNOS Y MERIENDAS--}}
        <div class="div__productos ">
            <h2 class="text-center fontSize1">Desayunos y Meriendas</h2>
            @foreach($productos as $desayuno)
                {{-- todo Ventana Modal : Luego Hacer un componente--}}

                <div class="modal fade" id="staticBackdrop{{ $desayuno->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $desayuno->titulo }}</h2>
                                {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
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
                                <div class="text-center">
                                    <a href="{{ route('admin.upload' ,['id' => $desayuno->producto_id]) }}" class="btn btn-dark">Editar</a>
                                    <form action="{{ route('admin.delete', ['id' => $desayuno->producto_id]) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger">Eliminar Producto</button>
                                    </form>
                                    {{--<a href=""
                                       data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{ $desayuno->producto_id }}"
                                       class="btn btn-danger">Eliminar</a>--}}
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                @if($desayuno->categoria->nombre == 'Desayunos y Meriendas')
                    <div class="productos ">
                        <a href="#" class="text-decoration-none shadow p-1"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $desayuno->producto_id }}">
                            <div class="img__productosHome">
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
                            <div class="datos__productos">
                                <div class="div__datos">
                                    <p class="datos__parrafo">{{ $desayuno->titulo }}</p>
                                   {{-- <p class="datos__descripcion">{{ $desayuno->descripcion }}</p>--}}
                                </div>
                                {{--<p class="fw-bold text-dark">$ <span> {{ $desayuno->precio }}</span></p>--}}
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        {{--CAFETERIA--}}
        <div class="div__productos ">
            <h2 class="text-center">Cafeteria</h2>
            @foreach($productos as $cafeterias)
                {{-- todo Ventana Modal : Luego Hacer un componente--}}

             {{--   <div class="modal fade" id="staticBackdrop{{ $cafeterias->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $cafeterias->titulo }}</h2>
                                --}}{{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}{{--
                            </div>
                            <div class="modal-body">
                                <div class="img__productos">
                                    @if($cafeterias->imagen != null && public_path('img/reserva') . '/' . $cafeterias->imagen)
                                        <picture class="">
                                            <source media="(min-width: 751px)"
                                                    srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                            <source media="(min-width: 380px)"
                                                    srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                            <img src="{{ asset('img/reserva/' . $cafeterias->imagen) }}" class="w-100"
                                                 alt="{{ $cafeterias->imagen_descripcion }}">
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
                                <p class="">{{ $cafeterias->descripcion }}</p>
                                <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $cafeterias->precio }}</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
--}}
                @if($cafeterias->categoria->nombre == 'Cafeteria')
                    <div class="productos ">
                        <a href="#" class="text-decoration-none shadow p-1"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $cafeterias->producto_id }}">
                            <div class="img__productosHome">
                                @if($cafeterias->imagen != null && public_path('img/reserva') . '/' . $cafeterias->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $cafeterias->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $cafeterias->imagen) }}" class="w-100"
                                             alt="{{ $cafeterias->imagen_descripcion }}">
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
                                <div class="div__datos">
                                    <p class="datos__parrafo">{{ $cafeterias->titulo }}</p>
                                    {{--<p class="datos__descripcion">{{ $cafeterias->descripcion }}</p>--}}
                                </div>
                                {{--<p class="fw-bold text-dark">$ <span> {{ $cafeterias->precio }}</span></p>--}}
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        {{--PLATOS--}}
        <div class="div__productos ">
            <h2 class="text-center">Platos</h2>
            @foreach($productos as $platos)
                {{-- todo Ventana Modal : Luego Hacer un componente--}}

            {{--             <div class="modal fade" id="staticBackdrop{{ $platos->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $platos->titulo }}</h2>
                                --}}{{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}{{--
                            </div>
                            <div class="modal-body">
                                <div class="img__productos">
                                    @if($platos->imagen != null && public_path('img/reserva') . '/' . $platos->imagen)
                                        <picture class="">
                                            <source media="(min-width: 751px)"
                                                    srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                            <source media="(min-width: 380px)"
                                                    srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                            <img src="{{ asset('img/reserva/' . $platos->imagen) }}" class="w-100"
                                                 alt="{{ $platos->imagen_descripcion }}">
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
                                <p class="">{{ $platos->descripcion }}</p>
                                <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $platos->precio }}</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
--}}
                @if($platos->categoria->nombre == 'Platos')
                    <div class="productos ">
                        <a href="#" class="text-decoration-none shadow p-1"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $platos->producto_id }}">
                            <div class="img__productosHome">
                                @if($platos->imagen != null && public_path('img/reserva') . '/' . $platos->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $platos->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $platos->imagen) }}" class="w-100"
                                             alt="{{ $platos->imagen_descripcion }}">
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
                                <div class="div__datos">
                                    <p class="datos__parrafo">{{ $platos->titulo }}</p>
                                    {{--<p class="datos__descripcion">{{ $platos->descripcion }}</p>--}}
                                </div>
                               {{-- <p class="fw-bold text-dark">$ <span> {{ $platos->precio }}</span></p>--}}
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        {{--ENSALADAS--}}
        <div class="div__productos ">
            <h2 class="text-center">Ensaladas</h2>
            @foreach($productos as $ensaladas)
                {{-- todo Ventana Modal : Luego Hacer un componente--}}

        {{--        <div class="modal fade" id="staticBackdrop{{ $ensaladas->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $ensaladas->titulo }}</h2>
                                --}}{{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}{{--
                            </div>
                            <div class="modal-body">
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
                                <p class="">{{ $ensaladas->descripcion }}</p>
                                <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $ensaladas->precio }}</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
--}}
                @if($ensaladas->categoria->nombre == 'Ensaladas')
                    <div class="productos ">
                        <a href="#" class="text-decoration-none shadow p-1"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $ensaladas->producto_id }}">
                            <div class="img__productosHome">
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
                                <div class="div__datos">
                                    <p class="datos__parrafo">{{ $ensaladas->titulo }}</p>
                                    {{--<p class="datos__descripcion">{{ $ensaladas->descripcion }}</p>--}}
                                </div>
                                {{--<p class="fw-bold text-dark">$ <span> {{ $ensaladas->precio }}</span></p>--}}
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
        {{--BEBIDAS--}}
        <div class="div__productos ">
            <h2 class="text-center">Bebidas</h2>
            @foreach($productos as $bebidas)
                {{-- todo Ventana Modal : Luego Hacer un componente--}}

     {{--           <div class="modal fade" id="staticBackdrop{{ $bebidas->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content text-center">
                            <div class="modal-header">
                                <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $bebidas->titulo }}</h2>
                                --}}{{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}{{--
                            </div>
                            <div class="modal-body">
                                <div class="img__productos">
                                    @if($bebidas->imagen != null && public_path('img/reserva') . '/' . $bebidas->imagen)
                                        <picture class="">
                                            <source media="(min-width: 751px)"
                                                    srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                            <source media="(min-width: 380px)"
                                                    srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                            <img src="{{ asset('img/reserva/' . $bebidas->imagen) }}" class="w-100"
                                                 alt="{{ $bebidas->imagen_descripcion }}">
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
                                <p class="">{{ $bebidas->descripcion }}</p>
                                <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $bebidas->precio }}</span></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
--}}
                @if($bebidas->categoria->nombre == 'Bebidas')
                    <div class="productos ">
                        <a href="#" class="text-decoration-none shadow p-1"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $bebidas->producto_id }}">
                            <div class="img__productosHome ">
                                @if($bebidas->imagen != null && public_path('img/reserva') . '/' . $bebidas->imagen)
                                    <picture class="">
                                        <source media="(min-width: 751px)"
                                                srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                        <source media="(min-width: 380px)"
                                                srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                        <img src="{{ asset('img/reserva/' . $bebidas->imagen) }}" class="w-100"
                                             alt="{{ $bebidas->imagen_descripcion }}">
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
                                <div class="div__datos">
                                    <p class="datos__parrafo">{{ $bebidas->titulo }}</p>
                                    {{--<p class="datos__descripcion">{{ $bebidas->descripcion }}</p>--}}
                                </div>
                                {{--<p class="fw-bold text-dark">$ <span> {{ $bebidas->precio }}</span></p>--}}
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

    {{--<div>
        <h3 class="text-center">Productos</h3>
        @foreach($productos as $producto)
             --}}{{--todo Ventana Modal : Luego Hacer un componente--}}{{--

            <div class="modal fade" id="staticBackdrop{{ $producto->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">{{ $producto->titulo }}</h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
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
                            </div>
                            <p class="">{{ $producto->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $producto->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="staticBackdrop1{{ $producto->producto_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h2 class="modal-title textBold8" id="staticBackdropLabel">Eliminando <span>{{ $producto->titulo }}</span></h2>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="img__productos">
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
                            </div>
                            <p class="">{{ $producto->descripcion }}</p>
                            <p class="textBold8 fontSize">Precio: $ <span class="textBold4">{{ $producto->precio }}</span></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <form action="{{ route('admin.delete', ['id' => $producto->producto_id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger">Eliminar Producto</button>
                            </form>
                             --}}{{--<a href="{{ route('admin.delete', ['id' => $producto->producto_id]) }}" class="btn btn-danger">Eliminar Producto</a>--}}{{--
                        </div>
                    </div>
                </div>
            </div>

            <div class="pb-2 ">
                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{ $producto->producto_id }}">
                        <div class="img__productos">
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
                        </div>
                        <div class="datos__productos">
                            <div>
                                <div class="div__datos">
                                    <p class="datos__parrafo">{{ $producto->titulo }}</p>
                                    <p class="datos__descripcion">{{ $producto->descripcion }}</p>
                                </div>
                                <p class="fw-bold text-dark">$ <span> {{ $producto->precio }}</span></p>
                                <p class="fw-bold text-dark">Categoria:  <span class="text-secondary"> {{ $producto->categoria }}</span></p>

                            </div>
                            <div class="text-center">
                                <a href="{{ route('admin.upload' ,['id' => $producto->producto_id]) }}" class="btn btn-dark">Editar</a>
                                <a href=""
                                   data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{ $producto->producto_id }}"
                                   class="btn btn-danger">Eliminar</a>
                            </div>
                        </div>

                    </a>
                </div>

            </div>

        @endforeach
    </div>--}}

@endsection
