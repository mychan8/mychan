@extends('layouts.login')

@section('form')
	<form action="{{ URL::asset('sign-in') }}" method="POST">
@endsection

@section('button')
	<input type="submit" name="submit" style="background: black; color: white; border-color: gold;" value="Iniciar sesión">
@endsection

@section('answer')
	<br><small><a href="sign-up">¿No estás registrado?</a> Sólo te tomará unos segundos...</small><br>
@endsection