@extends('layouts.template')

@section('account')

    @if( ! empty( session('user') ))
        <p style="text-align: center; font-size: medium"><a href="b/{{ str_replace(' ', '-', session('user')) }}">Cuenta</a> || <a href="{{ URL::asset('logout') }}">Salir</a></p>
    @else
        <p style="font-size: medium"><a href="sign-in">Iniciar sesión</a></p>
    @endif

@endsection

@section('content')
    @for ($i=0; $i <= 6; $i++)
        <div style="margin-bottom: 5px">
            <div>
                <h3><a href='/p/{{ str_replace(" ", "-", $mw[$i]->title) }}'>{{ $mw[$i]->title }}</a></h3>
                <h4>{{ $mw[$i]->updated_at }}</h4>
            </div>
            <textarea>{{ $mw[$i]->content }}</textarea>
        </div>
    @endfor
@endsection

@section('stats', $mw[0]->id)

@section('post')
    @if(null !== session('user'))
    <div style="margin: 5px;" class="border">
        <form action="{{ URL::asset('b/create-post') }}" method="POST">

            @csrf

           <div class="in-flex">
                <textarea 
                name="content"
                class="textinput"
                rows="40" 
                cols="100" 
                maxlength="500"
                minlength="10" value="{{ old('content') }}"></textarea>
                @error('content')
                <br>
                    <small style="color: gold;">*{{ $message }}</small>
                <br>
                @enderror
            </div>     
            <div class="border-blue flex-item">
                <div class="flex">
                    <div class="margin-5">
                        <input type="text" name="user" id="name" maxlength="30" placeholder="Nombre" value="{{ old('user') }}">
                    </div>
                    <div class="margin-5">
                        <input type="text" name="title" required="required" placeholder="Título" id="title" maxlength="30" minlength="5" value="{{ old('title') }}">
                    </div>
                    <div class="margin-5">
                        <input type="text" name="email" maxlength="30" id="email" placeholder="Email" value="{{ old('email') }}">
                        <input type="hidden" name="by" value="{{ $mw[0]->user }}">
                    </div>
                    <div class="margin-5">
                        <input type="submit" name="submit" id="btn" value="Crear publicación">
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endif
@endsection