<?php
/**
 * @var \Illuminate\Support\ViewErrorBag $errors
 * @var \App\Models\Producto $producto
 * @var \App\Models\Categoria $categorias
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="text-center my-3">Administración Mill</h1>
    <div>
        <div class="my-5">
            <div class="">
                <h2 class="h2__crearProducto">Editar Producto</h2>
                <p class="text-center "> {{ $producto->titulo }}</p>

                <p class=" text-center"><a href="#" class="btn btn-danger shadow px-3">Volver al Home</a></p>

            </div>
            <div class="div__formCrearProducto ">
                <form action="{{ route('admin.uploadConfirm', ['id' => $producto->producto_id]) }}" method="post" enctype="multipart/form-data" class="p-2 rounded rounded-lg shadow">
                    @csrf
                    <div class="my-2">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text"
                               id="titulo"
                               class="form-control"
                               name="titulo"
                               placeholder="Titulo del Producto"
                               value="{{ old('titulo', $producto->titulo ) }}"
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
                            value="{{ old('precio' , $producto->precio) }}"
                            @error('precio') aria-describedby="error-precio" @enderror>

                    </div>
                    @error('precio')
                    <div class="text-dark textBold8" id="error-precio"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror

                    <div class="my-2">
                        <label for="precio_dos" class="form-label">Precio Dos</label>
                        <input type="text"
                               id="precio_dos"
                               class="form-control"
                               name="precio_dos"
                               placeholder="Precio 2 del Producto"
                               value="{{ old('precio_dos', $producto->precio_dos) }}"
                               @error('precio_dos') aria-describedby="error-precio_dos" @enderror>
                    </div>
                    @error('precio_dos')
                    <div class="text-dark textBold8" id="error-precio_dos"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror
                    <div class="my-2">
                        <label for="descripcion_dos" class="form-label">Descripción Dos</label>
                        <input type="text"
                               id="descripcion_dos"
                               class="form-control"
                               name="descripcion_dos"
                               placeholder="Descripción 2 del Producto"
                               value="{{ old('descripcion_dos', $producto->descripcion_dos) }}"
                               @error('descripcion_dos') aria-describedby="error-descripcion_dos" @enderror>
                    </div>
                    @error('descripcion_dos')
                    <div class="text-dark textBold8" id="error-descripcion_dos"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror




                    <div class="my-2">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion' , $producto->descripcion) }}</textarea>
                    </div>
                    <div class="my-2">
                        <label for="categoria_id" class="form-label">Categoria</label>
                        {{--<input type="text" name="categoria" id="categoria" class="form-control">--}}
                        <select name="categoria_id"
                                id="categoria_id"
                                class="form-control"
                                @error('categoria_id') aria-describedby="error-categoria_id" @enderror >
                            @foreach($categorias as $categoria)
                                <option
                                    value="{{ $categoria->categoria_id }}"
                                    {{-- @if($categoria->categoria_id == old('categoria_id')) selected @endif--}}
                                    @selected($categoria->categoria_id == old('categoria_id', $producto->categoria_id))
                                >{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                        @error('categoria_id')
                        <div class="text-dark textBold8" id="error-categoria_id"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="my-2">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input type="file" id="imagen" name="imagen" class="form-control">
                    </div>

                    <div class="my-2">
                        <label for="imagen_descripcion" class="form-label">Descripciòn de la imagen</label>
                        <input
                            type="text"
                            id="imagen_descripcion"
                            name="imagen_descripcion"
                            class="form-control"
                            placeholder="Descripción de la Imagen"
                            value="{{ old('imagen_descripcion' , $producto->imagen_descripcion) }}"
                            @error('imagen_descripcion') aria-describedby="error-imagen_descripcion" @enderror>
                    </div>
                    @error('imagen_descripcion')
                    <div class="text-dark textBold8" id="error-imagen_descripcion"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror
                    <div class="my-2">
                        <button class="btn btn-dark" type="submit">Editar Producto</button>
                        {{--<a href="{{ route('admin.create') }}" class="btn btn-dark">Crear Producto</a>--}}
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection
