 @extends('layouts.main')
@section('content')
    <div>
    <form action="{{route('post.update',$post->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group mb-2 mt-2">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title"  placeholder="title" name="title" value="{{$post->title}}">
        </div>
        <div class="form-group mb-2 mt-2">
            <label for="content">Content</label>
            <textarea  class="form-control" id="content"  placeholder="Content " name="content">{{$post->content}}</textarea>
        </div>
        <div class="form-group mb-2 mt-2">
            <label for="image">Image</label>
            <input type="text" class="form-control" id="image"  placeholder="Image" name="image" value="{{$post->image}}">
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select class="form-control mb-3" id="category" name="category_id">
                @foreach($categories as $category)
                    <option
                        {{$category->id === $post->category->id ? 'selected':''}}
                        value="{{$category->id}}">{{$category->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach($tags as $tag)
                    <option
                        @foreach($post->tags as $postTag)
                        {{$tag->id === $postTag ->id ? 'selected':''}}
                        @endforeach
                        value="{{$tag->id}}">{{$tag->title}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Обновить</button>
    </form>
    </div>
@endsection
