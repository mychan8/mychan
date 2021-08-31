@extends('layouts.template')

@section('account')

    @if( ! empty( session('user') ))
        <small> || <a href="#" alt="crear nuevo post" onclick="newPost()">Crear</a> || <a href="#" alt='noti' onclick="noti()"><i><img style="width: 5%; height: 5%;" src="{{ URL::asset('img/bell.png') }}"></i></a> || <a href="{{ URL::asset('logout') }}">Salir</a></small>
    @else
        <small> || <a href="sign-in">Iniciar sesión</a></small>
    @endif

@endsection

@section('content')
    @for ($i=0; $i <= 6; $i++)
        <div>
            <div>
                <h3><a href='/b/{{ str_replace(" ", "-", $mw[$i]->title) }}'>{{ $mw[$i]->title }}</a></h3>
                <h4>{{ $mw[$i]->updated_at }}</h4>
            </div>
            <textarea>{{ $mw[$i]->content }}</textarea>
        </div>
    @endfor
@endsection

@section('stats')
	<span>Publicaciones: {{ $mw[0]->id }}</span>
@endsection