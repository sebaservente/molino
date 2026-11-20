<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#fbf6e9">
    <title>Administración · Mill</title>
    <link rel="icon" href="{{ asset('icons/icon-192x192.png') }}">
    <link rel="stylesheet" href="{{ asset('css/carta-mill.css') }}?v=20261118-dos-cartas">
    <link rel="stylesheet" href="{{ asset('css/login-mill.css') }}?v=20261119">
    <script src="{{ asset('js/login-mill.js') }}?v=20261119" defer></script>
</head>
<body class="mill-carta theme-cafeteria mill-login">
<main class="login-container">
    <header class="brand-header">
        <a class="brand" href="{{ route('index') }}" aria-label="Mill, el bar de la esquina, volver a la carta">
            <img class="brand-windmill" src="{{ asset('img/molino.png') }}" alt="" width="56" height="96">
            <span class="brand-wordmark">
                    <img src="{{ asset('img/nombre_mill.png') }}" alt="Mill" width="240" height="50">
                    <span>El bar de la esquina</span>
                </span>
        </a>
    </header>
    <section class="login-panel" aria-labelledby="login-title">
        <h1 id="login-title">Administración</h1>
        <p class="login-intro">Ingresá para administrar la carta de Mill.</p>
        @if(session('status.message'))
            <p class="login-notice" role="alert">{{ session('status.message') }}</p>
        @endif
        <form action="{{ route('login.In') }}" method="post">
            @csrf
            <div class="login-field">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="tu@email.com" autocomplete="username" required autofocus @error('email') aria-invalid="true" aria-describedby="error-email" @enderror>
                @error('email')<p class="login-error" id="error-email">{{ $message }}</p>@enderror
            </div>
            <div class="login-field">
                <label for="password">Contraseña</label>
                <div class="login-password">
                    <input type="password" name="password" id="password" autocomplete="current-password" required @error('password') aria-invalid="true" aria-describedby="error-password" @enderror>
                    <button class="password-toggle" type="button" aria-controls="password" aria-pressed="false" aria-label="Mostrar contraseña" hidden>
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" aria-hidden="true"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/></svg>
                    </button>
                </div>
                @error('password')<p class="login-error" id="error-password">{{ $message }}</p>@enderror
            </div>
            <div class="login-options">
                <label class="remember-label"><input type="checkbox" name="remember" value="1" @checked(old('remember'))> Recordarme</label>
                <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
            </div>
            <button class="login-submit" type="submit">Ingresar</button>
        </form>
    </section>
    <a class="login-back" href="{{ route('index') }}">← Volver a la carta</a>
    <p class="login-footer">Mill · El bar de la esquina</p>
</main>
</body>
</html>
