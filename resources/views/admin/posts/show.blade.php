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
  <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST" id="delete-form">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-danger">Elimina</button>
  </form>

  <a href="{{route('admin.posts.index')}}" class="btn btn-secondary ml-2">
    <i class="fa-solid fa-arrow-left mr-2"></i></i>Indietro
  </a>
</div>
@endsection

@section('scripts')
<script>
  const deleteForm = document.getElementById('delete-form');
  deleteForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const confirmation = confirm('Sei sicuro di voler eliminare questo post?');
    if (confirmation) e.target.submit();
  });
</script>
@endsection