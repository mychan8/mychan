<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <base href="/" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyChan</title>
    <meta name="target" content="all"/>
    <meta name="audience" content="all"/>

    <link rel="icon" href="{{ URL::asset('img/favicon.ico') }}" />

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/common.css'); }}">
    
    <!---
    <script type="text/javascript" src="{{ URL::asset('js/base.js'); }}"></script>--->

</head>
<body style="background-image: url({{ URL::asset('img/starsbg.gif') }});">
    <div class="header" id="grad">
        <h2 style="color: gold">MyChan</h2>@yield('account')
    </div>
<section class="home">
    <div class="in-flex">
        <div style="border: 2px solid line 2px">
            <h2>On MyChan, you can create your own blogboard for free with no experience or programming knowledge needed. </h2>
        </div>
        <div>
            <div style="background-color: black;">
                <h2>IMPORTANTE</h2>
            </div>
            <div style="background: #00002F;">
                <h3>Reglas</h3>
                <ul style="list-style-type: none; text-align: center;">
                    <li>I. Este sitio es para mayores de 18 años, al entrar y participar aceptas ser mayor de edad.</li>
                    <li>II. No postear enlaces o contenido ilegal dentro de las leyes del país en donde reside el usuario.</li>
                    <li>III. Los mensajes con spam serán eliminados por el administrador.</li>
                    <li>IV. Respeta a las personas que hay tras los comentarios.</li>
                </ul>
            </div>
            <!-- IMAGENES 
            <div></div>
                --->
            <div>
                <div style="background: #00002F; text-align: center;">
                    <h3>Estadísticas</h3>
                    <span>Publicaciones: @yield('stats')</span>
                </div>
            </div>
            <div>
                @yield('post')
            </div>
        </div>
    </div>
    <div class="in-flex" id="recent">
        <div style="background-color: black;">
            <h2>PUBLICACIONES RECIENTES</h2>
            @yield('content')
        </div>
    </div>
</section>
<div class="footer">
    <p style="font-size:small; text-align: center;"> <a href="{{ URL::asset('faq') }}">FAQ</a> || <a href="{{ URL::asset('sign-in') }}">Iniciar sesión</a> || <a href="https://github.com/mychan8/mychan">Source Code</a></p>
</div>
</body>