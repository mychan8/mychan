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
</head>
<body style="background-image: url({{ URL::asset('img/starsbg.gif') }});">
    <div class="header" id="grad">
        <h2>@yield('name')</h2> 
    </div>
<section class="home">
    <div class="in-flex">
        <div class="border">
            <div style="border: 2px solid line 2px;">
                <h3 style="text-align: left">@yield('title') <span style="font-size: x-small">@yield('date')</span></h3>
            </div>
        <!-- IMAGENES 
            <div></div>
                --->
            <div style="text-align: center;">@yield('content')</div>
            <div>
                @yield('remark')
            </div>
        </div>
        <div class="border">
            <form action="post" method="POST">

                @csrf

               <div id="grad2" class="in-flex">
                    <textarea 
                    name="content"
                    class="textinput"
                    rows="40" 
                    cols="100" 
                    maxlength="500"
                    minlength="10">@yield('tag')</textarea>
                </div>
                <div class="center" id="grad2">
                    <div>
                        <input type="text" name="user" id="name" maxlength="30" placeholder="Nombre">
                        <input type="text" name="email" maxlength="30" id="email" placeholder="Email">
                        <input type="hidden" name="goto" value="@yield('title')">
                        <input type="submit" name="submit" id="btn" value="Postear">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<div>
    <h4 style="margin:40px"><a href="/">Regresar</a></h4>
</div>
</body>