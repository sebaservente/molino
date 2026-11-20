<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fbf6e9">
    <meta name="description" content="Mill, el bar de la esquina. Conocé nuestra carta de cafetería y comidas.">
    <link rel="icon" href="{{ asset('icons/icon-192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('css/carta-mill.css') }}?v=20261118-dos-cartas">
    <title>@yield('title', 'Carta') · Mill</title>
</head>
<body class="mill-carta theme-{{ $cartaTipo }}">
    <a class="skip-link" href="#carta">Ir a la carta</a>
    <div class="menu-sheet">
        <header class="brand-header">
            <a class="brand" href="{{ route('index') }}" aria-label="Mill, el bar de la esquina, inicio">
                <img class="brand-windmill" src="{{ asset('img/molino.png') }}" alt="" width="56" height="96">
                <span class="brand-wordmark">
                    <img src="{{ asset('img/nombre_mill.png') }}" alt="Mill" width="240" height="50">
                    <span>El bar de la esquina</span>
                </span>
            </a>
        </header>
        <nav class="menu-navigation" aria-label="Carta de Mill">
            <div class="primary-tabs">
                <a class="tab-cafe" href="{{ route('index', ['carta' => 'cafeteria']) }}" @if($cartaTipo === 'cafeteria') aria-current="page" @endif>Cafetería y meriendas</a>
                <a class="tab-comidas" href="{{ route('index', ['carta' => 'comidas']) }}" @if($cartaTipo === 'comidas') aria-current="page" @endif>Comidas</a>
            </div>
            @if($secciones->isNotEmpty())
                <div class="category-links" aria-label="Categorías">
                    @foreach($secciones as $id => $items)
                        @php($nombreCategoria = $items->first()->categoria->nombre)
                        <a href="{{ route('index', ['carta' => $cartaTipo]) }}#categoria-{{ $id }}">{{ $titulos[$normalizar($nombreCategoria)] ?? $nombreCategoria }}</a>
                    @endforeach
                </div>
            @endif
        </nav>
        <main id="carta" tabindex="-1">@yield('main')</main>
        <footer class="menu-footer">
            <p class="address">Raúl Scalabrini Ortiz 801</p>
            <div class="footer-details"><p>Lunes a viernes · 8:00 a 20:00<br>Sábados · 10:00 a 20:00 · Domingos cerrado</p><p>Consultá nuestros métodos de pago.<br><a href="#carta">Volver arriba ↑</a></p></div>
            <p class="copyright">Mill &copy; {{ date('Y') }}</p>
        </footer>
    </div>
</body>
</html>
