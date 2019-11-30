
    @csrf
    <div class="form-group">
        <label for="title">Titulo</label>
        <input id="title" name="title" type="text" class="form-control" value="{{ old('title', $post->title) }}" > 
        @error('title') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="url_clean">Url limpia</label>
        <input id="url_clean" name="url_clean" type="text" class="form-control" value="{{ old('url_clean', $post->url_clean) }}" > 
        @error('url_clean') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="category_id">Categoria</label>
        <select id="category_id" name="category_id" class="form-control">
            @foreach ($categories as $title => $id )
                <option {{ $post->category_id == $id ? 'selected="selected"' : '' }} value="{{ $id }}">{{ $title }}</option>
            @endforeach
        </select>      
    </div>

    <div class="form-group">
        <label for="posted">Posted</label>
        <select id="posted" name="posted" class="form-control">
            @include('dashboard.partials.option-yes-not', ['val' => $post->posted] )
        </select>      
    </div>

    <div class="form-group">
        <label for="content">Contenido</label>
        <textarea id="content" name="content" rows="3" class="form-control">{{ old('content', $post->content) }}</textarea>
        @error('content') 
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>    
