@extends('layouts.app')

@section('content')
<header>
  <h1>Nuovo Post</h1>
</header>
<hr>

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
<form action="{{route('admin.posts.store')}}" method="POST">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="form-group">
        <label for="title" class="form-label">Titolo Post:</label>
        <input type="text" name="title" id="title" placeholder="Titolo" value="{{old('title')}}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      </div>
    </div>
    <div class="col-12">
      <div class="form-group">
        <label for="content" class="form-label">Scrivi Post:</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="10">{{old('content')}}</textarea>
      </div>
      @error('image')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>
    <div class="col-10">
      <div class="form-group">
        <label for="image" class="form-label">Inserisci url immagine:</label>
        <input type="url" name="image" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Url dell'immagine" value="{{old('image')}}">
      </div>
      @error('image')
      <div class=" invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="col-2">
      <img src="https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640" class="img-fluid" id="preview" alt="placeholder">
    </div>
    <div class="col-12">
      <hr>
    </div>

    <div class="col-12 d-flex justify-content-end mt-3">
      <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk mr-2"></i>Salva</button>
    </div>
  </div>
</form>
@endsection

@section('scripts')
<script>
  const placeholder = "https://socialistmodernism.com/wp-content/uploads/2017/07/placeholder-image.png?w=640";
  const imageInput = document.getElementById('image');
  const imagePreview = document.getElementById('preview');

  imageInput.addEventListener('change', e => {
    const preview = imageInput.value ?? placeholder;
    imagePreview.setAttribute('src', preview);
  })
</script>
@endsection