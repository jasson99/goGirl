@extends('layouts.app')

@section('content')
	  <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">goGirl</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
        <p>
          <a href="{{ route('login') }}" class="btn btn-primary my-2">Login</a>
          <a href="{{ route('register') }}" class="btn btn-secondary my-2">Register</a>
        </p>
      </div>
    </section>
    
@endsection