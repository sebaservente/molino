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
                        <textarea
                            id="descripcion"
                            name="descripcion"
                            class="form-control"
                            placeholder="Descripción del Producto"
                            @error('descripcion') aria-describedby="error-descripcion" @enderror>{{ old('descripcion') }}</textarea>
                    </div>
                    @error('descripcion')
                    <div class="text-dark textBold8" id="error-descripcion"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror
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
                        <input
                            type="text"
                            id="imagen_descripcion"
                            name="imagen_descripcion"
                            class="form-control"
                            placeholder="Descripción de la Imagen"
                            value="{{ old('imagen_descripcion') }}"
                            @error('imagen_descripcion') aria-describedby="error-imagen_descripcion" @enderror>
                    </div>
                    @error('imagen_descripcion')
                    <div class="text-dark textBold8" id="error-imagen_descripcion"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                    @enderror
                    <div class="my-2">
                        <button class="btn btn-dark" type="submit">Crear Producto</button>
                        {{--<a href="{{ route('admin.create') }}" class="btn btn-dark">Crear Producto</a>--}}
                    </div>
                </form>
            </div>
        </div>

    </div>



@endsection
