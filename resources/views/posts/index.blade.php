@extends('layouts.app')
@section('title')
posts
@endsection
@section('content')
<div class="mt-5 text-center">
          <a href="{{route('posts.create')}}" type="button" class="btn btn-primary">CREATE POST</a>

</div>

    <table class="table table-info table-striped mt-5">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Posted by</th>
      <th scope="col">Description</th>
      <th scope="col">created at</th>
      <th scope="col"> Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post["title"]}}</td>
      <td>{{$post["posted_by"]}}</td>
      <td>{{$post["description"]}}</td>
      <td>{{$post["created_at"]->format('Y-m-d')}}</td>
      <td>
{{--                    /posts/{{$post['id']}}--}}
                    <a href="{{route('posts.show', $post['id'])}}" class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post['id'])}}" class="btn btn-primary">Edit</a>

                    <form style="display: inline;" method="post" action="{{route('posts.destroy',$post['id'])}}">
                        @csrf
                        <!-- @method('DELETE') -->
                        {{ method_field('DELETE') }}

                        <button type="submit" type="hidden" onclick="confirm('are you sure?')" value="delete" class="btn btn-danger">Delete</button>
                    </form>
                </td>
    </tr>

  @endforeach

    
  </tbody>
</table>
@endsection
   