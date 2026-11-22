@extends('template.panel')
@section('title', $categoria->exists ? 'Editar categoría' : 'Agregar categoría')
@section('panel')
<p><a href="{{ route('admin.categorias') }}">← Categorías</a></p><h1>{{ $categoria->exists ? 'Editar categoría' : 'Agregar categoría' }}</h1>
<form class="panel-card product-form" method="post" action="{{ $categoria->exists ? route('admin.categorias.actualizar', $categoria->categoria_id) : route('admin.categorias.guardar') }}">@csrf
<div class="field"><label for="nombre">Nombre</label><input id="nombre" name="nombre" required minlength="2" maxlength="125" value="{{ old('nombre', $categoria->nombre) }}">@error('nombre')<p class="field-error">{{ $message }}</p>@enderror</div>
<div class="field"><label for="carta">Carta</label><select id="carta" name="carta" required>@foreach(\App\Models\Categoria::CARTAS as $valor => $etiqueta)<option value="{{ $valor }}" @selected(old('carta', $categoria->carta) === $valor)>{{ $etiqueta }}</option>@endforeach</select><p class="hint">Esta elección se aplica a todos los productos de la categoría.</p></div>
<div class="form-grid"><div class="field"><label for="abreviatura">Abreviatura (3 letras)</label><input id="abreviatura" name="abreviatura" required minlength="3" maxlength="3" pattern="[A-Za-z]{3}" value="{{ old('abreviatura', $categoria->abreviatura) }}"></div><div class="field"><label for="posicion">Orden de aparición</label><input id="posicion" name="posicion" type="number" min="0" max="100000" required value="{{ old('posicion', $categoria->posicion ?? 0) }}"></div></div>
<div class="form-actions"><button class="btn-primary">Guardar categoría</button><a class="btn-outline" href="{{ route('admin.categorias') }}">Cancelar</a></div>
</form>
@endsection
