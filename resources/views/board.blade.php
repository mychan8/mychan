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
   	@if( ! empty( $thread[0]->title ) )
	    	@foreach ($thread as $thr)
		    	<a href="/p/{{ str_replace(' ', '-',  $thr->title) }}">{{ $thr->title }}</a>
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
