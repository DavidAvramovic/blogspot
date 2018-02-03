@extends('layouts.admin')




@section('content')

    {{--@if (Session::has('deleted_user'));--}}


    {{--<h4 class="bg bg-danger">{{session('deleted_user')}}</h4>--}}



    {{--@endif--}}

    <h1>Posts</h1>

    <table class="table">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>User</th>
            <th>Category</th>
            <th>Title</th>
            <th>Content</th>
            <th>View</th>
            <th>View</th>
            <th>Created</th>
            <th>Updated</th>
          </tr>
        </thead>

        <tbody>

        @if($posts)

            @foreach($posts as $post)
          <tr>
            <td>{{$post->id}}</td>
            <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" alt=""></td>
            <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
            <td>{{$post->category ? $post->category->name : "Uncotegorized"}}</td>
            <td>{{$post->title}}</td>
            <td>{{str_limit($post->body,30)}}</td>
            <td><a href="{{route('home.post', $post->slug)}}">View Post</a></td>
            <td><a href="{{route('admin.comments.show', $post->id)}}">View Comments</a></td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>

          </tr>
        </tbody>
            @endforeach
         @endif

      </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">


            {{$posts->render()}}

        </div>
    </div>

@stop