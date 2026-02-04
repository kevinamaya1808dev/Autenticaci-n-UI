<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi Machote Laravel</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Mi Proyecto</a>
            <div class="navbar-nav ms-auto">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}" class="nav-link">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="nav-link">Registrarse</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </nav>
    <div class="container mt-5 text-center">
        <h1>Bienvenido a mi Machote</h1>
        <p>Base lista con Laravel UI, Bootstrap y Traducción.</p>
    </div>
</body>
</html>