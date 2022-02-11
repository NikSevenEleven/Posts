 @extends('layouts.main')
@section('content')
    <div>
    <form action="{{route('post.store')}}" method="POST">
        @csrf
        <div class="form-group mb-2 mt-2">
            <label for="title">Title</label>
            <input value="{{old('title')}}" type="text" class="form-control" id="title"  placeholder="title" name="title">
            @error('title')
            <div class="text-danger">Поле обязателньо для заполнения</div>
            @enderror
        </div>

        <div class="form-group mb-2 mt-2">
            <label for="content">Content</label>
            <textarea   class="form-control" id="content"  placeholder="Content " name="content">{{old('content')}}</textarea>
            @error('content')
            <div class="text-danger">Поле обязателньо для заполнения</div>
            @enderror
        </div>

        <div class="form-group mb-2 mt-2">
            <label for="image">Image</label>
            <input value="{{old('image')}}" type="text" class="form-control" id="image"  placeholder="Image" name="image">
            @error('image')
            <div class="text-danger">Поле обязателньо для заполнения</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control mb-3" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{old('category_id')== $category->id ? 'selected': ''}}

                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Добавить пост</button>
    </form>
    </div>

@endsection
