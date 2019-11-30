@extends('dashboard.master')

@section('content')

<div class="form-group">
    <label for="title">Titulo</label>
    <input readonly type="text" class="form-control" value="{{ $category->title }}" > 
</div>
<div class="form-group">
    <label for="url_clean">Url limpia</label>
    <input readonly type="text" class="form-control" value="{{ $category->url_clean }}" > 
</div>

@endsection

