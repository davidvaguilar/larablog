
    @csrf
    <div class="form-group">
        <label for="name">Nombre</label>
        <input id="name" name="name" type="text" class="form-control" value="{{ old('name', $user->name) }}" > 
        @error('name') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="surname">Apellido</label>
        <input id="surname" name="surname" type="text" class="form-control" value="{{ old('surname', $user->surname) }}" > 
        @error('surname') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" > 
        @error('email') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    @if ($pasw)
        <div class="form-group">
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="form-control" value="{{ old('password', $user->password) }}" > 
            @error('password') 
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
    @endif
  

    <button type="submit" class="btn btn-primary">Enviar</button>    
