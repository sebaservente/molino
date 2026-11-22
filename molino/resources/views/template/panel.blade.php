<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fbf6e9">
    <title>@yield('title', 'Administración') · Mill</title>
    <link rel="icon" href="{{ asset('icons/icon-192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('css/carta-mill.css') }}?v=20261118-dos-cartas">
    <link rel="stylesheet" href="{{ asset('css/panel-mill.css') }}?v=20261119">
    <script src="{{ asset('js/panel-mill.js') }}?v=20261119" defer></script>
</head>
<body class="mill-carta theme-cafeteria mill-panel">
<a class="skip-link" href="#contenido">Ir al contenido</a>
<div class="panel-shell">
    <aside class="panel-sidebar">
        <a class="brand" href="{{ route('admin.home') }}" aria-label="Mill, administración">
            <img class="brand-windmill" src="{{ asset('img/molino.png') }}" alt="" width="56" height="96">
            <span class="brand-wordmark"><img src="{{ asset('img/nombre_mill.png') }}" alt="Mill" width="240" height="50"><span>El bar de la esquina</span></span>
        </a>
        <details class="panel-menu" open>
            <summary>Menú de administración</summary>
            <nav aria-label="Administración">
                @foreach(['admin.home' => 'Inicio', 'admin.productos' => 'Productos', 'admin.categorias' => 'Categorías', 'admin.papelera' => 'Papelera'] as $ruta => $nombre)
                    <a href="{{ route($ruta) }}" @if(request()->routeIs($ruta) || ($ruta === 'admin.categorias' && request()->routeIs('admin.categorias.*')) || ($ruta === 'admin.productos' && request()->routeIs('admin.create*', 'admin.upload*'))) aria-current="page" @endif>{{ $nombre }}</a>
                @endforeach
                <a href="{{ route('index') }}" target="_blank" rel="noopener">Ver carta ↗</a>
                <form method="post" action="{{ route('logout') }}">@csrf<button class="sidebar-logout">Cerrar sesión</button></form>
            </nav>
        </details>
    </aside>
    <main class="panel-content" id="contenido" tabindex="-1">
        @if(session('panel.ok'))<div class="panel-notice" role="status">{{ session('panel.ok') }}</div>@endif
        @if(session('panel.error'))<div class="panel-notice panel-notice--error" role="alert">{{ session('panel.error') }}</div>@endif
        @if($errors->any())<div class="panel-notice panel-notice--error" role="alert"><strong>Revisá los datos del formulario.</strong><ul>@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div>@endif
        @yield('panel')
    </main>
</div>
<dialog class="confirm-dialog" id="confirm-dialog" aria-labelledby="confirm-title">
    <form method="dialog"><h2 id="confirm-title">Confirmar acción</h2><p id="confirm-message"></p><div class="form-actions"><button value="cancel" class="btn-outline">Cancelar</button><button value="confirm" class="btn-danger">Confirmar</button></div></form>
</dialog>
</body>
</html>
