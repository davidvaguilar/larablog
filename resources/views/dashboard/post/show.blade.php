@extends('dashboard.master')

@section('content')

<div class="form-group">
    <label for="title">Titulo</label>
    <input readonly type="text" class="form-control" value="{{ $post->title }}" > 
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input readonly type="text" class="form-control" value="{{ $post->url_clean }}" > 
</div>
<div class="form-group">
    <label for="content">Contenido</label>
    <textarea readonly rows="3" class="form-control">{{ $post->content }}</textarea>
</div>  

@endsection

