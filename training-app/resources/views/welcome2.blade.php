<!DOCTYPE html>
<html lang="en">
<head>
    @extends('bootstrapCDN')
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('/css/welcomeStyle.css') }}">
    <title>Document</title>
</head>
<body class="mt-3 p-0">
    <div id="header" class="container border-bottom border-2 border-primary-subtle">
        <div class="row h-100">
            <div class="col-6 ps-4 d-flex justify-content-start align-items-center">
                <a href="" id="logo-sm"  class="logo"><img src="{{ url('/images/mitsumi-icon.png') }}" alt=""></a>
                <a href="" id="logo-lg" class="logo"><img src="{{ url('/images/logo-nobg.png') }}" alt=""></a>
            </div>
            <div class="col-6 pe-3 d-flex flex-column justify-content-center align-items-end">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="pb-1">Iniciar sesión</a>
                    <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="pt-1">Registrarse</a>  
                    @endif -->
                @endif
            </div>
        </div>
    </div>
    <div id="content" class="container mt-1 h-25">
        <h1>Esta será la página de bienvenida</h1>
    </div>
</body>
</html>