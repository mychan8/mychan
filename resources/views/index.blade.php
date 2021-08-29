@extends('layouts.template')

@section('content')
    @foreach ($mw as $text)
        <div>
            <div>
                <h3><a href='/b/{{ htmlspecialchars($text->title) }}'>{{ $text->title }}</a></h3>
                <h4>{{ $text->updated_at }}</h4>
            </div>
            <textarea>{{ $text->content }}</textarea>
        </div>
    @endforeach
@endsection