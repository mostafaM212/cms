@extends('layouts.app')

@section('container')

{{--    <form method="post" action="/posts/{{$post->id}}">--}}
{!! Form::model($post,['method'=>'PATCH','action'=>['postController@update',$post->id]]) !!}
        <h1>edit posts</h1>
{{--        <input type="hidden" name="_method" value="PUT">--}}
        <input type="text" name="title" placeholder="enter title"value="{{$post->title}}">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="submit" value="submit">
        {{csrf_field()}}
{{--    </form>--}}
{!! Form::close() !!}
{{--    <form method="post" action="/posts/{{$post->id}}">--}}
{!! Form::open(['method'=>'DELETE','action'=>['postController@destroy',$post->id]]) !!}
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Delete">
{!! Form::close() !!}
@endsection
