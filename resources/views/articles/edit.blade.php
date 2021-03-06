@extends ('layout')

@section ('content')
    <div class="pt-4 pb-4">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if ($article)
                        <form method="POST" action="{{ route('articles.update', $article) }}">
                            @csrf
                            @method('PUT')

                            <h2 class="text-uppercase pb-4">Edit Article</h2>
                            <div class="form-group pb-2"><label for="title"><h5 class="text-uppercase">Title</h5></label><input value="{{ $article->title }}" type="text" class="border rounded form-control" name="title" placeholder="Title" /></div>
                            <div class="form-group pb-2"><label for="body"><h5 class="text-uppercase">Body</h5></label><textarea class="border rounded form-control" name="body" placeholder="Body..." rows="5">{{ $article->body }}</textarea></div>
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
                    @else
                        <h2 class="text-uppercase">Article not found !</h2>
                    @endif
                </div>
        </div>
    </div>
@endsection