@extends('layouts.blog')

@section('name')
	<a href="b/{{ str_replace(' ', '-', $mw[0]->user) }}">{{ $mw[0]->user }}</a>
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
	        <div>
	            <div>
	                <h3 style="text-align: left;"><em style="color: gray">{{ $comment[$i]->remarkID }}</em> <span><a href="mailto:{{ $comment[$i]->email }}">{{ $comment[$i]->nick }}</a> </span> <span style="font-size: x-small">{{ $comment[$i]->updated_at }}</span></h3>
	            </div>
	            <div>{{ $comment[$i]->content }}</div>
	        </div>
	    @endfor
	@endif
@endsection