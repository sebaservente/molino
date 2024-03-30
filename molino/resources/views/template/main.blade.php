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
            <source media="(min-width: 751px)" srcset="<?= url('../img/molino.png'); ?>"<?= url('../img/molino.png'); ?>>
            <source media="(min-width: 380px)" srcset="<?= url('../img/molino.png'); ?>">
            <img src="<?= url('../img/molino.png'); ?>" class="rounded rounded-full m-auto" alt="Mi imagen responsive">
        </picture>
        {{--<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-row-reverse p-1" id="navbarNav">
            <ul class="navbar-nav ">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('home', ['texto' => 'Bienvenidos']) }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('nosotros', ['texto' => 'Conocenos']) }}">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="--}}{{--{{ route('contacto') }}--}}{{--">Contacto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('panel') }}">Admin</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tienda
                        </a>
                        <ul class="dropdown-menu">
                            --}}{{-- <li><a class="dropdown-item" href="#">Hoteles (Proximamente)</a></li>
                             <li><a class="dropdown-item" href="{{ route('tienda.pases') }}">Pases</a></li>
                             <li class="nav-item">
                                 <a class="dropdown-item" href="{{ route('equipos') }}" >Equipos</a>
                             </li>
                             <li><hr class="dropdown-divider"></li>--}}{{--
                            --}}{{-- <li class="nav-item">
                                 <a class="dropdown-item" href="{{ route('carrito', ['user' => Auth::id()]) }}" >Mi Carrito
                                     --}}{{----}}{{--@if(Auth::user())
                                         <i class="bi bi-cart-plus px-1"></i>
                                         <span class=""> {{ \Auth::user()->carrito }}</span>
                                     @endif--}}{{----}}{{--
                                 </a>
                             </li>--}}{{--
                        </ul>
                    </li>
                    <li class="nav-item d-flex align-items-center li__main">
                        <a class="nav-link"
                           href="--}}{{--{{ route('perfil', ['id' => Auth::user()->usuario_id]) }}--}}{{--" >Mi Perfil
                        </a>
                    </li>
                    --}}{{--@if(Auth::user()->email === "admin@admin.com.ar")
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.tienda') }}">Admin</a>
                        </li>
                    @endif--}}{{--
                    <li class="nav-item">
                        <form action="--}}{{--{{route('auth.logout')}}--}}{{--" method="post">
                            @csrf
                            <button type="submit" class="btn nav-link">Cerrar Sesion</button>
                        </form>
                    </li>

                @elseguest
                    <li class="nav-item">
                        <a class="nav-link" href="--}}{{--{{ route('auth.login') }}--}}{{--">Iniciar Sesion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="--}}{{--{{ route('auth.registrarse') }}--}}{{--">Registrarse</a>
                    </li>

                @endauth
            </ul>
        </div>--}}
    </div>

</nav>

<main>
    {{--@if(Session::has('status.message'))
        <div class="msgAlert">{!!  Session::get('status.message') !!} </div>
    @endif--}}
    {{-- <div class="d-flex justify-content-end py-1 m-auto w-100 bg-warning">
        @auth()
            <p class="text-center text-dark parrafo__perfil px-1"><b>{{ Auth::user()->email }} </b></p>

            @if(Auth::user()->imagen != null && public_path('img/equipos') . '/' . Auth::user()->imagen)
                <picture class="picture__imgPerfil">
                    <source media="(min-width: 751px)" srcset="{{ asset('img/equipos/' . Auth::user()->imagen) }}">
                    <source media="(min-width: 380px)" srcset="{{ asset('img/equipos/' . Auth::user()->imagen) }}">
                    <img src="{{ asset('img/equipos/' . Auth::user()->imagen) }}"  class="rounded-full m-auto img__perfil " alt="foto de perfil usuario">
                </picture>
            @else
                <picture class="picture__imgPerfil">
                    <source media="(min-width: 751px)" srcset="{{ asset('img/botas-burton-motox150.jpg') }}">
                    <source media="(min-width: 380px)" srcset="{{ asset('img/botas-burton-motox150.jpg') }}">
                    <img src="{{ asset('img/botas-burton-motox150.jpg') }}" class="rounded-full m-auto img__perfil"  alt="Imagen logo de la marca">
                </picture>
            @endif
        @elseguest
            --}}{{--<p class="w-100 text-center  text-dark color__menu m-0">MERCADO PAGO - <span title="fuera de servicios" class="text-warning cursor-not-allowed">VER MAS</span> </p>--}}{{--
        @endauth
    </div>--}}
    <div class="container-fluid bg-dark">
        <ul class="navbar-nav me-auto my-lg-0 menu text-danger" style="--bs-scroll-height: 20rem">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mx-1 menu__ancla" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    MENU
                </a>
                <ul class="dropdown-menu">
                    <li><a href="{{ route('desayunos') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cup-hot px-2 unos"></i></span>Desayunos</a></li>
                        {{--<p class="Maña__uno uno desayuno py-3 uppercase"><span class="px-2 "><i class="bi bi-cup-hot px-2 unos"></i></span>Desayunos y Meriendas</p>--}}
                    <li><a href="{{ route('cafeteria') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cup px-2 unos"></i></span>Cafeteria</a>
                        {{--<p class="Maña__uno dos w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cup px-2 doss"></i></span>Cafeteria</p>--}}</li>
                    {{--<li><p class="Maña__uno tres w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cup-straw px-2 tress"></i></span>Bebidas</p></li>--}}
                    <li><a href="{{ route('bebidas')  }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cup-straw px-2 tress"></i></span>Bebidas</a>
                    <li><a href="{{ route('platos') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Platos</a>
                    <li><a href="{{ route('ensaladas') }}" class="text-decoration-none text-dark"><span class="px-2 py-3 uppercase"><i class="bi bi-cc-circle px-2 cincos"></i></span>Ensaladas</a>
                    {{--<li><p class="Maña__uno cuatro w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cc-circle px-2 cuatros"></i></span>Platos</p></li>--}}
                    {{--<li><p class="Maña__uno cinco w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cc-circle px-2 cincos"></i></span>Ensaladas</p></li>--}}
                    <li><hr class="dropdown-divider"></li>
                    <li><p class="Maña__uno w-100 py-3 uppercase"><span class="px-2"><i class="bi bi-cc-circle px-2"></i></span>Platos del día</p></li>
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

</body>
</html>
