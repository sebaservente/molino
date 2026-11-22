@extends('template.panel')
@section('title', 'Categorías')
@section('panel')
<div class="page-heading"><div><h1>Categorías</h1><p>Elegí la carta y el orden de cada sección.</p></div><a class="btn-primary" href="{{ route('admin.categorias.crear') }}">+ Agregar categoría</a></div>
<div class="category-list">
@forelse($categorias as $categoria)
<article class="panel-card category-row"><div><h2>{{ $categoria->nombre }}</h2><p>{{ \App\Models\Categoria::CARTAS[$categoria->carta] ?? $categoria->carta }} · Orden {{ $categoria->posicion }} · {{ $categoria->productos_count }} productos (incluye papelera)</p></div><div class="form-actions"><a href="{{ route('admin.categorias.editar', $categoria->categoria_id) }}">Editar</a>@if($categoria->productos_count === 0)<form method="post" action="{{ route('admin.categorias.borrar', $categoria->categoria_id) }}" data-confirm="Eliminar la categoría vacía «{{ $categoria->nombre }}». Esta acción no se puede deshacer.">@csrf<label class="permanent-check"><input type="checkbox" name="confirmar" value="1" required> Confirmo eliminar</label><button class="text-action danger">Borrar</button></form>@else<span class="hint">Para borrar, primero reasigná sus productos.</span>@endif</div></article>
@empty<div class="panel-empty">Todavía no hay categorías.</div>@endforelse
</div>
@endsection
