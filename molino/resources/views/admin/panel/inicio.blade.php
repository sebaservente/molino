@extends('template.panel')
@section('title', 'Inicio')
@section('panel')
<div class="page-heading"><div><p class="eyebrow">Mill · Administración</p><h1>Tu carta, al día</h1><p>Administrá los productos que ven tus clientes.</p></div><a class="btn-primary" href="{{ route('admin.create') }}">+ Agregar producto</a></div>
<div class="summary-grid">
@foreach(['cafeteria' => 'Cafetería y meriendas', 'comidas' => 'Comidas'] as $clave => $nombre)
    <section class="panel-card"><h2>{{ $nombre }}</h2><p class="summary-number">{{ $resumen[$clave]['total'] }} <span>productos</span></p><p>{{ $resumen[$clave]['visibles'] }} visibles en la carta</p><a class="btn-outline" href="{{ route('admin.productos', ['carta' => $clave]) }}">Administrar productos</a></section>
@endforeach
</div>
<div class="panel-card"><h2>Accesos rápidos</h2><div class="form-actions"><a href="{{ route('admin.categorias') }}">Organizar categorías</a><a href="{{ route('admin.papelera') }}">Papelera ({{ $papeleraTotal }})</a><a href="{{ route('index') }}" target="_blank" rel="noopener">Ver carta pública ↗</a></div><p class="hint">Las categorías de ambas cartas se cuentan en cada una.</p></div>
@endsection
