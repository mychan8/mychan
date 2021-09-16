@extends('layouts.blog')

@section('name')
	<a href="b/{{ str_replace(' ', '-', $mw[0]->by) }}">{{ $mw[0]->by }}</a>
@endsection

@section('title', $mw[0]->title)

@section('date', $mw[0]->updated_at)

@section('content', $mw[0]->content)

@section('remark')
	@if( isset($comment) )
	    @for ($i=0; $i < count($comment); $i++)
	    	@if( empty( $comment[$i]->nick ) )
	    		@break
	    	@endif
	    	<div class="margin-b-5 padding-5">
	            <div>
	                <h3 style="text-align: left;"><em style="color: gray">{{ $comment[$i]->remarkID }}</em> <span><a href="mailto:{{ $comment[$i]->email }}">{{ $comment[$i]->nick }}</a> </span> <span style="font-size: x-small">{{ $comment[$i]->updated_at }}</span></h3>
	            </div>
	            <div>{{ $comment[$i]->content }}</div>
	        </div>
	    @endfor
	@endif
@endsection