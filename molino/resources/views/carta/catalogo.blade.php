@php
    $normalizar = fn ($nombre) => \Illuminate\Support\Str::lower(\Illuminate\Support\Str::ascii(trim($nombre)));
    $seleccion = isset($categoriaActual) ? $normalizar($categoriaActual) : null;
    $cartaTipo = in_array(request()->query('carta'), ['cafeteria', 'comidas'], true) ? request()->query('carta') : 'cafeteria';
    $productosCarta = collect($productos)->filter(fn ($producto) => $producto->categoria !== null && $producto->visible);
    $categoriaSeleccionada = $seleccion ? $productosCarta->first(fn ($producto) => $normalizar($producto->categoria->nombre) === $seleccion)?->categoria : null;
    if ($categoriaSeleccionada && in_array($categoriaSeleccionada->carta, ['cafeteria', 'comidas'], true)) $cartaTipo = $categoriaSeleccionada->carta;
    $titulos = ['cafeteria' => 'Cafetería', 'plato del dia' => 'Plato del día'];
    $secciones = $productosCarta->groupBy(fn ($producto) => $producto->categoria_id)
        ->filter(fn ($items) => in_array($items->first()->categoria->carta, [$cartaTipo, 'ambas'], true))
        ->sortBy(fn ($items) => $items->first()->categoria->posicion);
    $grupos = $secciones->filter(fn ($items) => !$seleccion || $normalizar($items->first()->categoria->nombre) === $seleccion);
@endphp

@extends('template.main')
@section('title', $categoriaActual ?? ($cartaTipo === 'cafeteria' ? 'Cafetería y meriendas' : 'Comidas'))
@section('main')
    @if(isset($categoriaActual))
        <p class="menu-back"><a href="{{ route('index', ['carta' => $cartaTipo]) }}">Ver {{ $cartaTipo === 'cafeteria' ? 'cafetería y meriendas' : 'toda la carta de comidas' }}</a></p>
    @endif
    <div class="menu-grid {{ isset($categoriaActual) ? 'menu-grid--single' : '' }}">
        @forelse($grupos as $id => $items)
            @php
                $nombre = $items->first()->categoria->nombre;
                $clave = $normalizar($nombre);
                $esPromo = $clave === 'promos';
                $esBanda = in_array($clave, ['cosas dulces', 'dulces', 'sandwichs', 'sandwiches'], true) || $cartaTipo === 'comidas';
                $bandaAlternativa = in_array($clave, ['ensaladas', 'pollo', 'polentas', 'postres', 'bebidas'], true);
            @endphp
            <section class="menu-category {{ $esPromo ? 'menu-category--promo' : '' }}" aria-labelledby="categoria-{{ $id }}">
                <h1 class="category-title {{ $esBanda ? 'category-title--band' : '' }} {{ $bandaAlternativa ? 'category-title--alternate' : '' }}" id="categoria-{{ $id }}">{{ $titulos[$clave] ?? $nombre }}</h1>
                <div class="menu-products">
                    @foreach($items as $producto)
                        <article class="menu-product">
                            <div class="product-heading">
                                <h2>{{ $producto->titulo }}</h2>
                                <span class="product-price">$&nbsp;{{ number_format((float) $producto->precio, 0, ',', '.') }}</span>
                            </div>
                            @if(filled($producto->descripcion))
                                <p class="product-description">{{ $producto->descripcion }}</p>
                            @endif
                            @if($producto->precio_dos !== null)
                                <div class="product-option"><span>{{ filled($producto->descripcion_dos) ? $producto->descripcion_dos : 'Otra opción' }}</span><span class="product-price">$&nbsp;{{ number_format((float) $producto->precio_dos, 0, ',', '.') }}</span></div>
                            @elseif(filled($producto->descripcion_dos))
                                <p class="product-description">{{ $producto->descripcion_dos }}</p>
                            @endif
                        </article>
                    @endforeach
                </div>
            </section>
        @empty
            <section class="menu-empty"><h1 class="category-title">{{ $categoriaActual ?? ($cartaTipo === 'cafeteria' ? 'Cafetería y meriendas' : 'Comidas') }}</h1><p>Por el momento no hay productos disponibles en esta sección.</p></section>
        @endforelse
    </div>
@endsection
