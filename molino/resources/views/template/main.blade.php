<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="icons/icon-192x192.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= url('css/estilos.css')?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <style>@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Kdam+Thmor+Pro&family=Luckiest+Guy&display=swap');</style>
    <title>@yield('title') :: Mill</title>
</head>
<body class="antialiased hidden">
<nav class="navbar navbar-expand-lg nav">
    <div class="container-fluid">
        <picture class="picture__img w-10">
            <source media="(min-width: 751px)" srcset="<?= url('img/molino.png'); ?>"<?= url('../img/molino.png'); ?>>
            <source media="(min-width: 380px)" srcset="<?= url('img/molino.png'); ?>">
            <img src="<?= url('img/molino.png'); ?>" class="rounded rounded-full m-auto" alt="Mi imagen responsive">
        </picture>
    </div>
</nav>
<main>
    <div class="container-fluid bg-dark">
        <ul class="navbar-nav me-auto my-lg-0 menu text-danger" style="--bs-scroll-height: 20rem">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mx-1 menu__ancla" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </a>
                <ul class="dropdown-menu">
                    <li class="my-2"><a href="{{ route('desayunos') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cup-hot px-2 unos"></i></span>Desayunos</a></li>
                        {{--<p class="Maña__uno uno desayuno py-3 uppercase"><span class="px-2 "><i class="bi bi-cup-hot px-2 unos"></i></span>Desayunos y Meriendas</p>--}}
                    <li class="my-2"><a href="{{ route('cafeteria') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cup px-2 unos"></i></span>Cafeteria</a>
                        {{--<p class="Maña__uno dos w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cup px-2 doss"></i></span>Cafeteria</p>--}}</li>
                    {{--<li><p class="Maña__uno tres w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cup-straw px-2 tress"></i></span>Bebidas</p></li>--}}
                    <li class="my-2"><a href="{{ route('ensaladas')  }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cup-straw px-2 tress"></i></span>Ensaladas</a>
                    <li class="my-2"><a href="{{ route('platos') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Platos</a>
                    <li class="my-2"><a href="{{ route('bebidas') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Bebidas</a>
                    <li class="my-2"><a href="{{ route('licuados') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Licuados</a>
                    <li class="my-2"><a href="{{ route('postres') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Postres</a>
                    <li class="my-2"><a href="{{ route('promos') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Promos</a>
                    <li><hr class="dropdown-divider"></li>
                    {{--<li class="my-2"><a href="" class="text-decoration-none text-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop--}}{{--{{ $postres->producto_id }}--}}{{--" ><span class="px-2 py-3 uppercase" ><i class="bi bi-cc-circle px-2 cincos" ></i></span>Plato del Día</a>--}}
                    <li><hr class="dropdown-divider"></li>
                    <li class="my-2"><a href="{{ route('index') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Inicio</a>
                </ul>
            </li>
        </ul>
    </div>
    <div>
        <h3 class="metodo__pago">Metodos de pago</h3>
    </div>
    <section class="min-vh-100">
        @yield('main')
        {{--<div class="div__somos py-2"></div>--}}
    </section>
</main>
<footer class="footer">
    <p>Mill &copy; 2024</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
@stack('js')
</body>
</html>

