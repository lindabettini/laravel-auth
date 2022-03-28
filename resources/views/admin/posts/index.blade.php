@extends('layouts.app');

@section('content')
<header>
  <h1>I miei post</h1>
</header>

@if(session('message'))
<div class="alert alert-{{session('type') ?? 'info' }}">{{session('message')}}</div>
@endif
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
      <td class="d-flex justify-content-end align-items-start">
        <a href="{{route('admin.posts.show', $post->id)}}" class="btn btn-primary mr-2"><i class="fa-solid fa-eye mr-2"></i>Vedi</a>

        <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" class="delete-form">
          @method('DELETE')
          @csrf
          <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash mr-2"></i>Elimina</button>
        </form>
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

@section('scripts')
<script src="{{asset('js/delete-confirm.js')}}" defer></script>
@endsection