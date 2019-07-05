@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="/posts/create" class = "btn btn-primary">Share More</a><hr>
                    <h1>You Shared</h1>
                    <hr>
                    @if(count($posts) > 0) 
                    <div class="row">
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
                                        @else
                                        <p>No Posts Found</p> 
                    </div>
                                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
