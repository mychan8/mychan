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
<section class="flex blue padding-5">
    <div class="border remark">
        <div class="padding-5">
            <h3 style="text-align: left">@yield('title') <span style="font-size: x-small">@yield('date')</span></h3>
        </div>
        <div class="padding-5">@yield('content')</div>
        <div class="padding-5">
            @yield('remark')
        </div>
    </div>
    <div class="border">
        <form action="post" method="post">

            @csrf

           <div id="grad2" class="flex-item">
                <textarea 
                name="content"
                class="textinput"
                rows="40" 
                cols="100" 
                maxlength="1000" 
                required="required"
                minlength="10" autocomplete="{{ old('content') }}"></textarea>
                @error('content')
                <br>
                    <small style="color: gold;">*{{ $message }}</small>
                <br>
                @enderror
            </div>     
            <div class="flex border-blue" id="grad2">
                <div>
                    <input type="text" name="user" id="name" maxlength="30" placeholder="Nombre" value="{{ old('user') }}">
                </div>
                <div>
                    <input type="text" name="email" maxlength="30" id="email" placeholder="Email" value="{{ old('email') }}">
                </div>
                <div>
                    <input type="hidden" name="goto" value="@yield('title')">
                    <input type="submit" name="submit" id="btn" value="Comentar">
                </div>
                </div>
            </div>
        </form>
    </div>
</section>

<div>
    <h4 style="padding: 20px;"><a href="/">Regresar</a></h4>
</div>

</body>