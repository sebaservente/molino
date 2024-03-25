<?php
/**
 * @var \Illuminate\Support\ViewErrorBag $errors
 */
?>
@extends('template.admin')

@section('title', 'Administración Mill')

@section('admin')
    <h1 class="text-center my-3">Administración Mill</h1>
    <div class="my-5">

        <div class="d-flex justify-content-center">
            <h2 class="h2__crearProducto">Crear Producto</h2>
            <a href="#" class="btn btn-danger shadow px-3">Cerrar Sesión</a>
        </div>
        <div class="div__formCrearProducto ">
            <form action="{{ route('admin.create.confirm') }}" method="post" enctype="multipart/form-data" class="p-3 rounded rounded-lg shadow">
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
                    <textarea id="descripcion" name="descripcion" class="form-control"></textarea>
                </div>
                <div class="my-2">
                    <label for="categoria" class="form-label">Categoria</label>
                    {{--<input type="text" name="categoria" id="categoria" class="form-control">--}}
                    <select name="categoria">
                        <option value="desayunos">Desayunos</option>
                        <option value="cafeteria" selected>Cafeteria</option>
                        <option value="platos">Platos</option>
                        <option value="bebidas">Bebidas</option>
                        <option value="ensaladas">Ensaladas</option>
                    </select>
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


@endsection
