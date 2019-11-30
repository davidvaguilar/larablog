@extends('dashboard.master')

@section('content')

<div class="form-group">
    <label for="title">Nombre</label>
    <input readonly type="text" class="form-control" value="{{ $user->name }}" > 
</div>
<div class="form-group">
    <label for="surname">Apellido</label>
    <input readonly type="text" class="form-control" value="{{ $user->surname }}" > 
</div>
<div class="form-group">
    <label for="email">Email</label>
    <input readonly type="text" class="form-control" value="{{ $user->surname }}" > 
</div>


@endsection

