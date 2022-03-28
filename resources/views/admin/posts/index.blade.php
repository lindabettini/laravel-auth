@extends('layouts.app');

@section('content')
<header>
  <h1>I miei post</h1>
</header>
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Slug</th>
      <th scope="col">Creato il</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

    @forelse($posts as $post)
    <tr>
      <th scope="row">{{ $post->id }}</th>
      <td>{{ $post->title }}</td>
      <td>{{ $post->slug }}</td>
      <td>{{$post->created_at}}</td>
      <td class="d-flex justify-content-end align-items-center">
        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-sm btn-primary"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="">
        <h3>Non ci sono post</h3>
      </td>
    </tr>
    @endforelse
  </tbody>
</table>
@endsection