@extends('layouts.app')

@section('content')
<div class = "container">
    <h1>Create Posts</h1>
    {{ Form::open(['action' => 'PostsController@store', 'method'=> 'POST']) }}
        <div class = "form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', '',['class' => 'form-control','placeholder'=> 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('age','Age')}}
            {{Form::text('age')}}
            {{Form::label('address','Address')}}
            {{Form::text('address')}}
        </div>
        <div class = "form-group">
                {{Form::label('body', 'Description')}}
                {{Form::textarea('body', '',['id' => 'article-ckeditor','class' => 'form-control','placeholder'=> 'Description'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {{ Form::close() }}
</div>
@endsection