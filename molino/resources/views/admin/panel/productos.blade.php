@extends('template.panel')
@section('title', $papelera ? 'Papelera' : 'Productos')
@section('panel')
@php($rutaListado = $papelera ? 'admin.papelera' : 'admin.productos')
<div class="page-heading"><div><h1>{{ $papelera ? 'Papelera' : 'Productos' }}</h1><p>{{ $papelera ? 'Restaurá productos o eliminalos definitivamente.' : 'Los cambios se reflejan en la carta pública.' }}</p></div>@unless($papelera)<a class="btn-primary" href="{{ route('admin.create', $filtros) }}">+ Agregar producto</a>@endunless</div>
<nav class="panel-tabs" aria-label="Carta">@foreach(['cafeteria' => 'Cafetería y meriendas', 'comidas' => 'Comidas'] as $clave => $nombre)<a href="{{ route($rutaListado, ['carta' => $clave]) }}" @if($carta === $clave) aria-current="page" @endif>{{ $nombre }}</a>@endforeach</nav>
<form class="panel-filters" action="{{ route($rutaListado) }}" method="get">
    <input type="hidden" name="carta" value="{{ $carta }}">
    <div><label for="buscar">Buscar producto</label><input id="buscar" type="search" name="titulo" value="{{ $filtros['titulo'] ?? '' }}" placeholder="Nombre del producto" maxlength="150"></div>
    <div><label for="categoria">Categoría</label><select id="categoria" name="categoria_id"><option value="">Todas las categorías</option>@foreach($categorias as $categoria)<option value="{{ $categoria->categoria_id }}" @selected(($filtros['categoria_id'] ?? '') == $categoria->categoria_id)>{{ $categoria->nombre }}</option>@endforeach</select></div>
    <div><label for="estado">Visibilidad</label><select id="estado" name="estado"><option value="">Todas</option><option value="visible" @selected(($filtros['estado'] ?? '') === 'visible')>Visibles</option><option value="oculto" @selected(($filtros['estado'] ?? '') === 'oculto')>Ocultos</option></select></div>
    <button class="btn-primary">Buscar</button><a href="{{ route($rutaListado, ['carta' => $carta]) }}">Limpiar</a>
</form>
<div class="product-table"><div class="table-head"><span>Producto</span><span>Categoría</span><span>Precio</span><span>{{ $papelera ? 'Estado' : 'Visible' }}</span><span>Acciones</span></div>
@forelse($productos as $producto)
    <article class="table-row">
        <div class="cell-name"><strong>{{ $producto->titulo }}</strong><span class="hint">Orden: {{ $producto->posicion }}</span></div>
        <div class="cell-category">{{ $producto->categoria?->nombre ?? 'Sin categoría' }}</div>
        <div class="cell-price">$ {{ number_format($producto->precio, 0, ',', '.') }}</div>
        <div class="cell-visibility">
        @if($papelera)<span>En papelera</span>@else
            <form method="post" action="{{ route('admin.visible', array_merge($filtros, ['id' => $producto->producto_id])) }}">@csrf<input type="hidden" name="visible" value="{{ $producto->visible ? 0 : 1 }}"><button class="visibility-button {{ $producto->visible ? 'is-visible' : '' }}" aria-label="{{ $producto->visible ? 'Ocultar' : 'Mostrar' }} {{ $producto->titulo }} en la carta"><span aria-hidden="true" class="switch-track"></span>{{ $producto->visible ? 'Sí' : 'No' }}</button></form>
        @endif
        </div>
        <div class="cell-actions">
        @if($papelera)
            <form method="post" action="{{ route('admin.restaurar', array_merge($filtros, ['id' => $producto->producto_id])) }}">@csrf<button class="text-action">Restaurar</button></form>
            <form method="post" action="{{ route('admin.eliminar', array_merge($filtros, ['id' => $producto->producto_id])) }}" data-confirm="Eliminar definitivamente «{{ $producto->titulo }}». Esta acción no se puede deshacer.">@csrf<label class="permanent-check"><input type="checkbox" name="confirmar" value="1" required> Confirmo eliminar</label><button class="text-action danger">Eliminar definitivamente</button></form>
        @else
            <a href="{{ route('admin.upload', array_merge($filtros, ['id' => $producto->producto_id])) }}">Editar</a>
            <form method="post" action="{{ route('admin.delete', array_merge($filtros, ['id' => $producto->producto_id])) }}" data-confirm="Enviar «{{ $producto->titulo }}» a la papelera. Podés restaurarlo después.">@csrf<button class="text-action danger">Borrar</button></form>
        @endif
        </div>
    </article>
@empty
    <div class="panel-empty"><h2>No hay productos para mostrar</h2><p>Probá otra carta o cambiá los filtros.</p></div>
@endforelse
</div>
<div class="pagination-footer"><p>{{ $productos->total() }} productos · Página {{ $productos->currentPage() }} de {{ $productos->lastPage() }}</p><nav class="form-actions" aria-label="Paginación">@if($productos->previousPageUrl())<a class="btn-outline" href="{{ $productos->previousPageUrl() }}">← Anterior</a>@endif @if($productos->hasMorePages())<a class="btn-outline" href="{{ $productos->nextPageUrl() }}">Siguiente →</a>@endif</nav></div>
@endsection
