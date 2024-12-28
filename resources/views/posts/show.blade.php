@extends('layouts.app')
@section('title')
show details
@endsection

@section('content')
<div>
    <h2 class="text-center">Post details </h2>
    </div>

    <div>
    <div class="card mt-4">
        <div class="card-header">
            Post Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Title: {{$post['title']}} </h5>
            <p class="card-text">Description: {{$post['description']}}</p>
        </div>
    </div>
   

    <div class="card mt-4">
        <div class="card-header">
            Post Creator Info
        </div>
        <div class="card-body">
            <h5 class="card-title">Name: {{$post['posted_by']}}</h5>
            
            <p class="card-text">Email: {{$post->user ? $post->user->email: 'not found'}}</p>
            
        
            <p class="card-text">Created At:{{$post['created_at']}} </p>
        </div>
    </div>
    </div>

@endsection
    
