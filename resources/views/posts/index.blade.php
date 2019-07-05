@extends('layouts.app')

@section('content')
      <section class="jumbotron text-center" style = "height: 400px; background-image: url('/images/bagn.jpg');background-repeat: no-repeat; background-position: center; background-size: cover;">
      <div class="container">
        <h1 class="jumbotron-heading" style = "color: white">goGirl</h1>
        <p class="lead text-muted" style=" color: #963694; font-size: 2em;">VOILENCE AGAINST WOMEN STAYS BEHIND CLOSED DOOR</p>
        @if(!Auth::check())
        <p>
          <a href="{{ route('login') }}" class="btn btn-primary my-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-secondary my-2">Register</a>
        </p>
        @endif
      </div>
    </section>
    
            <div class="album py-5 bg-light">
      <div class="container">
  
        <div class="row">
            @if(count($posts) > 0) 
        @foreach($posts as $post)
          <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
              <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#674172  "/><text x="5%" y="5%" fill="#eceeef" dy="5em" style="font-size: 25px ">#{{$post->age}}&nbsp{{$post->address}}</text></svg>
              <div class="card-body">
                <p class="card-text"><a style="font-size: 25px; text-transform: uppercase;" href = "/posts/{{$post->id}}">{{$post->title}}</a></p>
                <div class="d-flex justify-content-between align-items-center">
                 <!-- <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                  </div> -->
                  <small class="text-muted">Shared on {{$post->created_at->toFormattedDateString()}}</small>
                </div>
              </div>
            </div>
        </div>
               @endforeach
       {{$posts->links()}}
    @else
        <p>No Posts Found</p> 

    @endif
          </div>
      </div>
  </div>
           
  
    
@endsection