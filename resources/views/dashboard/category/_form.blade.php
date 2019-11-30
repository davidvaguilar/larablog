
    @csrf
    <div class="form-group">
        <label for="title">Titulo</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ old('title', $category->title) }}" > 
        @error('title') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input id="url_clean" name="url_clean" type="text" class="form-control" value="{{ old('url_clean', $category->url_clean) }}" > 
        @error('url_clean') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Enviar</button>    
