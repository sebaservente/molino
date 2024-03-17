<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= url('css/estilos.css')?>">
    <title>MILL</title>
</head>
<body class="antialiased">
    <nav>
        <h1>MILL</h1>
    </nav>
    <main>
        <h2>HOLA MUNDO MOLINO</h2>
        <h3>Colaboración especial sersebas08</h3>
        <p>Retocamos la key de sersebas08</p>
        <a href="<?= url('/carta/desayunos');?>">Desayunos y Meriendas</a>
        {{--<a href="/">Platos</a>
        <a href="carta/desayunos">Bebidas</a>--}}
    </main>
    <footer class="footer">
        <p>Mill &copy; 2024</p>
    </footer>
</body>
</html>
