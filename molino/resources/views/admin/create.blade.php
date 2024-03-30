<?php
/**
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="text-center my-3">Administración Mill</h1>
    <div>
        <div class="my-5">
            <div class="d-flex justify-content-center">
                <h2 class="h2__crearProducto">Crear Producto</h2>
                <a href="#" class="btn btn-danger shadow px-3">Cerrar Sesión</a>
            </div>
            <div class="div__formCrearProducto ">
                <form action="{{ route('admin.create.confirm') }}" method="post" enctype="multipart/form-data" class="p-2 rounded rounded-lg shadow">
                    @csrf
                    <div class="my-2">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text"
                               id="titulo"
                               class="form-control"
                               name="titulo"
                               placeholder="Titulo del Producto"
                               value="{{ old('titulo') }}"
                               @error('titulo') aria-describedby="error-titulo" @enderror>
                    </div>
                    @error('titulo')
                    <div class="text-dark textBold8" id="error-titulo"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror
                    <div class="my-2">
                        <label for="precio" class="form-label">Precio</label>
                        <input
                            type="text"
                            name="precio"
                            id="precio"
                            class="form-control"
                            name="precio"
                            placeholder="Precio del Producto"
                            value="{{ old('precio') }}"
                            @error('precio') aria-describedby="error-precio" @enderror>

                    </div>
                    @error('precio')
                    <div class="text-dark textBold8" id="error-precio"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror
                    <div class="my-2">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="my-2">
                        <label for="categoria" class="form-label">Categoria</label>
                        {{--<input type="text" name="categoria" id="categoria" class="form-control">--}}
                        <select name="categoria" @error('categoria') aria-describedby="error-categoria" @enderror >
                            <option value="desayunos">Desayunos</option>
                            <option value="cafeteria" selected>Cafeteria</option>
                            <option value="platos">Platos</option>
                            <option value="bebidas">Bebidas</option>
                            <option value="ensaladas">Ensaladas</option>

                        </select>
                        @error('categoria')
                        <div class="text-dark textBold8" id="error-categoria"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="my-2">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">
                    </div>

                    <div class="my-2">
                        <label for="imagen_descripcion" class="form-label">Descripciòn de la imagen</label>
                        <input type="text" id="imagen_descripcion" name="imagen_descripcion" class="form-control">
                    </div>
                    <div class="my-2">
                        <button class="btn btn-dark" type="submit">Crear Producto</button>
                        {{--<a href="{{ route('admin.create') }}" class="btn btn-dark">Crear Producto</a>--}}
                    </div>
                </form>
            </div>
        </div>
        <div>
            <h3 class="text-center">Productos</h3>
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
                                {{--<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>--}}
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
                               {{-- <a href="{{ route('admin.delete', ['id' => $producto->producto_id]) }}" class="btn btn-danger">Eliminar Producto</a>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="productos ">
                    <a href="#" class="text-decoration-none shadow"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $producto->producto_id }}">
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
                            <div class="div__datos">
                                <p class="datos__parrafo">{{ $producto->titulo }}</p>
                                <p class="datos__descripcion">{{ $producto->descripcion }}</p>
                            </div>
                            <p class="fw-bold text-dark">$ <span> {{ $producto->precio }}</span></p>
                            <p class="fw-bold text-dark">Categoria:  <span class="text-secondary"> {{ $producto->categoria }}</span></p>
                        </div>

                    </a>
                </div>
                <div class="text-center">
                    <a href="" class="btn btn-dark">Editar</a>
                    <a href=""
                       data-bs-toggle="modal" data-bs-target="#staticBackdrop1{{ $producto->producto_id }}"
                       class="btn btn-danger">Eliminar</a>
                </div>
            @endforeach
        </div>
    </div>



@endsection
