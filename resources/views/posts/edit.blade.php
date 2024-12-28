@extends('layouts.app')

@section('title') Edit @endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="Post" action="{{route('posts.update',$post->id)}}">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label class="form-label">Title</label>
            <input name="title" type="text" class="form-control" value="{{$post->title}}" type="hidden" value="PUT">
        </div>
        <div class="mb-3">
            <label class="form-label">posted by</label>
            <input name="posted_by" type="text" class="form-control" value="{{$post->posted_by}}">
        </div>

        <div class="mb-3">
            <label  class="form-label">Description</label>
            <textarea name="description" class="form-control"  rows="3" type="hidden" value="PUT">{{$post->description}}</textarea>
        </div>

        <div class="mb-3">
            <label  class="form-label">Post Creator</label>
            <select name="post_creator" class="form-control">
            @foreach($users as $user)
{{--                    <option @if($user->id == $post->user_id) selected @endif value="{{$user->id}}">{{$user->name}}</option>--}}
                    <option @selected($post->user_id == $user->id) value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>

           
        </div>

        <button class="btn btn-info">Edit</button>
    </form>


@endsection
