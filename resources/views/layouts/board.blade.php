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

    <style type="text/css">.in-flex { flex: 1; min-width: 150px; } .border a { text-decoration: underline; } </style>

</head>
<body style="background-image: url({{ URL::asset('img/starsbg.gif') }});">
    <div class="header" id="grad">
        <p style="color: gold;">@yield('title')</p>
    </div>
<section class="flex">
    <div class="flex-item">
        @yield('description')
        <!---- Hilos ----->
        <div style="margin: 20px; background:#00003F;" class="border">
            @yield('thread')
        </div>
        @yield('post')
    </div>
</section>
    <div class="border">
        @yield('hilos')
    </div>
    <div style="text-align: center;"><a href="/">Regresar</a></div>
</body>