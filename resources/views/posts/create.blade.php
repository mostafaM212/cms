@extends('layouts.app')

@section('container')

{{--    <form method="post" action="/posts">--}}
    {!! Form::open(['method'=>'POST','action'=>'postController@store']) !!}

            <h1>create post</h1>
            <div class="form-group">

                {!! Form::label('title','title') !!}
                {!! Form::text('title',null,['class'=>'Form-control']) !!}

            </div>
{{--            <input type="text" name="title" placeholder="enter title">--}}
             <input type="hidden" name="_token" value="{{csrf_token()}}">
{{--            <input type="submit" value="submit">--}}
                {!! Form::submit('create',['class'=>'btn btn-primary']) !!}
             @if(count($errors)>0)
                 @foreach($errors->all() as $error)
                     <div class="alert alert-danger">
                        <Li>{{$error}}</Li>
                     </div>
                 @endforeach
             @endif

    {!! Form::close() !!}

@endsection
