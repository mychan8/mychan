@extends('layouts.blog')

@section('name', $mw[0]->user)

@section('title', $mw[0]->title)

@section('date', $mw[0]->updated_at)

@section('content', $mw[0]->content)

@section('remark')
	@if( isset($comment) )
	    @foreach ($comment as $com)
	        <div>
	            <div>
	                <h3 style="text-align: left;"><em style="color: gray">{{ $com->remarkID }}</em> <span><a href="mailto:{{ $com->email }}">{{ $com->nick }}</a> </span> <span style="font-size: x-small">{{ $com->updated_at }}</span></h3>
	            </div>
	            <div>{{ $com->content }}</div>
	        </div>
	    @endforeach
	@endif
@endsection