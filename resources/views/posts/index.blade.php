@extends('layouts.app')



@section('container')

    @foreach($posts as $post)
        <div>
          <li><a href="{{route('posts.show',$post->id)}}">{{$post->title }}</a></li>
            <a href="{{route('posts.edit',$post->id)}}">edit</a>
        </div>
    @endforeach

@endsection
