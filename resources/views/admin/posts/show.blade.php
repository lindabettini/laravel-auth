@extends('layouts.app')

@section('content')
<h1>{{ $post->title}}</h1>
<div class="clearfix">
  @if($post->image)
  <img src="{{$post->image}}" alt="{{ $post->slug }}" class="float-left mr-2">
  @endif
  <p>{{$post->content}}</p>
</div>
<time>{{ $post->created_at }}</time>
<hr>
<div class="d-flex align-items-center justify-content-end">
  <a href="{{route('admin.posts.index')}}" class="btn btn-secondary">
    <i class="fa-solid fa-arrow-left mr-2"></i></i>Indietro
  </a>
</div>
@endsection