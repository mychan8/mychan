@extends('layouts.login')

@section('form')
	<form action="{{ URL::asset('sign-up') }}" method="POST">
@endsection

@section('button')
	<input type="submit" name="submit" style="background: black; color: white; border-color: gold;" value="Registrarse">
@endsection

@section('answer')
	<br><small><a href="sign-in">¿Ya tienes una cuenta?</a> Sólo te tomará unos segundos...</small><br>
@endsection