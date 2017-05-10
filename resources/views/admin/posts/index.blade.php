@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_post'))

        <p class="bg-danger">{{session('deleted_post')}}</p>

    @endif

    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
            <th>Id</th>
            <th>Photo</th>
            <th>Owner</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>

        <tbody>

        @if($posts)
            @foreach($posts as $post)

          <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" width="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td>{{$post->user->name}}</td>
            <td>{{$post->category ? $post->category->name : 'Un categorized'}}</td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}">{{str_limit($post->title,40)}}</a></td>
            <td>{{str_limit($post->body, 40)}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
          </tr>

            @endforeach
        @endif

        </tbody>
    </table>

@stop
