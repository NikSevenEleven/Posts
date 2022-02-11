 @extends('layouts.main')
@section('content')
    <div>
        <div>{{$post->id}}.{{$post->title}}</div>
        <div>{{$post->content}}</div>
    </div>
    <div><a href="{{route('post.edit',$post->id)}}" class="btn btn-primary mt-1 mb-1" >Редактировать пост</a></div>
    <form action="{{route('post.delete',$post->id)}}"  method="POST">
    @csrf
    @method('DELETE')
        <input type="submit" class="btn btn-danger mt-1 mb-1" value="Удалить пост">
    </form>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-primary mt-1 mb-1">Back</a>
    </div>
@endsection
