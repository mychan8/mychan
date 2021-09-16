@extends('layouts.board')

@section('title', $mw[0]->user)

@section('description')
	@if( ! empty( $mw[0]->subtitle ))
	<div style="margin: 20px; background:#00003F;" class="border">
		<h3 style="margin: 5px;">{{ $mw[0]->subtitle }}</h3>
		<p style="text-align: center; margin: 5px;">{{ $mw[0]->description }}</p>
	</div>
	@endif
@endsection

@section('thread')
   	@if( ! empty( $post[0]->title ) )
    	@foreach ($post as $thread)
	    	<a href="/p/{{ str_replace(' ', '-',  $thread->title) }}">{{ $thread->title }}</a>
	    @endforeach
	@else
		<h3>No se creó ninguna publicación...</h3>
	@endif

@endsection

@section('post')
	@if(session('user') == $mw[0]->user)
	<div style="margin: 20px; background:#00003F;" class="border">
        <form action="{{ URL::asset('b/create-post') }}" method="post">

            @csrf

           <div id="grad2">
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
            <div id="grad2" class="flex border-blue">
                <div class="margin-5">
                    <input type="text" name="user" id="name" maxlength="30" placeholder="Nombre" value="{{ old('user') }}">
                </div>
                <div>
                    <input type="text" name="title" required="required" placeholder="Título" id="title" maxlength="30" minlength="5" value="{{ old('title') }}">
                    @error('title')
                    <br>
                        <small style="color: gold;">*{{ $message }}</small>
                    <br>
                    @enderror
                </div>
                <div class="margin-5">
                    <input type="text" name="email" maxlength="30" id="email" placeholder="Email" value="{{ old('email') }}">
                    <input type="hidden" name="by" value="{{ $mw[0]->user }}">
                </div>
                <div class="margin-5">
                    <input type="submit" name="submit" id="btn" value="Crear publicación">
                </div>
            </div>
        </form>
    </div>
	@endif
@endsection

@section('hilos')
    @foreach ($post as $post)
    <div style="padding: 5px; margin-bottom: 15px; background: #00003F">
        <div >
            <p style="margin: 5px; font-size: x-large;"><a href="{{ URL::asset('p/'.$post->title) }}">{{ $post->title }}</a> <small style="font-size: small">{{ $post->updated_at }}</small></p>
            <p style="text-align: center; margin: 5px;">{{ $post->content }}</p>
        </div>
        <div alt="comentarios">
            @if (!empty ($com[0]->goto))
                @for ($i=0; $i< count($com); $i++)
                    @if($com[$i]->goto == $post->title)
                        <p style="margin: 5px; padding: 10px;">{{ $com[$i]->content }}</p>
                    @endif
                @endfor
            @endif
        </div>
        <div style="margin-bottom: 15px;">
            <form action="post" method="POST">

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
                        <input type="hidden" name="goto" value="{{ $post->title }}">
                        <input type="submit" name="submit" id="btn" value="Comentar">
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endforeach
@endsection