@extends('layouts.app')

@section('content')
<div class = "row">
    <div class="col-sm-1"></div>
<div class = "col-sm-8 blog-main">
    <a href='/posts' class = "btn btn-default">Back </a>
   

    <div class = "container">
    <h1 style = "text-transform: uppercase">{{$post->title}}</h1>
    <small>{{$post->created_at->toFormattedDateString()}}</small>
    <h2>#{{$post->age}}_{{$post->address}}</h2>

    <div class ="jumbotron">
            {!!$post->body!!}

    </div>
</div>
    <!--<hr>
    <a href="/posts/{{$post->id}}/edit" class = "btn btn-primary">Edit</a>
    </div>
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class'  => 'pull-right'])!!}
    
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('DELETE',['class' => 'btn btn-danger'])}}
 
    {!!Form::close()!!} -->
    <hr>
    <div class= container>
        <h3>Comments</h3>
        <div class="comments">
            <ul class = "list-group"> 
        @foreach($post->comments as $comment)
        <li class="list-group-item">
            
            <strong>{{$comment->user->name  }}&nbsp </strong>
            <small>{{  $comment->created_at->diffForHumans() }}</small>

            <div>
            &nbsp&nbsp&nbsp&nbsp&nbsp{{$comment->body}}
        </div>
        </li>
        </ul>

        @endforeach
    </div>
<br>

     <div class="card">
        <div class = "card-block">
            <form method ="POST" action = '/posts/{{$post->id}}/comments'>
                {{csrf_field()}}
                <div class = "form-group">
                    <textarea name = "body" placeholder = "Join us" class = "form-control">
                    </textarea>
                </div>
                @if(Auth::check())
                <div class = "form-group">
                    <button type= "submit" class = "btn btn-primary">Submit</button>
                </div>
                @else
                <div class = "form-group">
                        <p> <a class = "btn btn-primary "href="{{ route('login') }}">Login</a></p>
                    </div>
                @endif
            </form>
        </div>
    </div>

</div>

</div>
@include('inc.sidebar')
</div>
@endsection