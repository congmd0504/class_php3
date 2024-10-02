@extends('layout')
@section('title')
    home
@endsection
@section('content')
    @foreach ($posts as $post)
        <div>
            <a href="{{ route('posts.detail', ['id' => $post->id]) }}}}">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->description }}</p>
                <hr>
            </a>
        </div>
    @endforeach
    {{$posts->links()}}
@endsection
