@extends ('layout')

@section ('content')
    <div class="pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('articles.store') }}">
                        @csrf

                        <h2 class="text-uppercase pb-4">Add Article</h2>
                        <div class="form-group pb-2">
                            <label for="title"><h5 class="text-uppercase">Title</h5></label>
                            <input type="text" class="@error ('title') border-danger @enderror border rounded form-control" name="title" value="{{ old('title') }}" />
                            
                            @error ('title')
                                <p class="text-danger mt-1">{{ $errors->first('title') }}</p>
                            @enderror
                        </div>
                        <div class="form-group pb-2">
                            <label for="body"><h5 class="text-uppercase">Body</h5></label>
                            <textarea class="@error ('body') border-danger @enderror border rounded form-control" name="body" rows="5">{{ old('body') }}</textarea>
                            
                            @error ('body')
                                <p class="text-danger mt-1">{{ $errors->first('body') }}</p>
                            @enderror
                        </div>
                        <div class="form-group pb-2">
                            <label for="tags"><h5 class="text-uppercase">Tags</h5></label>
                            <select name="tags[]" class="browser-default custom-select" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            
                            @error ('tags')
                                <p class="text-danger mt-1">{{ $errors->first('tags') }}</p>
                            @enderror
                        </div>
                        <div class="form-group text-left"><button class="btn btn-primary text-uppercase text-right bg-dark border rounded" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection