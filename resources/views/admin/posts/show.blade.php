@extends('layout.app')

@section('content')
<h1>{{ $post->title}}</h1>
<p>{{$post->content}}</p>
<time>{{ $post->created_at }}</time>

@if($post->image) <img src="{{$post->image}}" alt="{{ $post->slug }}">@endif
@endsection