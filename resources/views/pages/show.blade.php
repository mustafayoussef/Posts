@extends('layouts.app')

@section('title')
    {{$post->subject}}
@endsection
@section('content')


<div class="card border-info mb-3" >
    <div class="card-header text-center font-weight-bold">{{$post->firstname}} {{$post->lastname}}</div>
    <div class="card-body text-info">
        <h2 class="card-title text-center">{{$post->subject}}</h2>
        <div class="image text-center">
            <img src="{{url('/storage/post_image',$post->post_image)}}" class="img-fluid w-25 h-25" alt="">
        </div>
        <p class="card-text">{{$post->body}}</p>
        <div class="row">
            <div class="col-md-6">
                <span class="badge badge-success"> Created at : {{$post->created_at}} </span>
                <span class="badge badge-success"> By : {{$post->user->name}} </span> <br><br>
            </div>
            <div class="col-md-6">
                @if (!Auth::guest())
                @if (Auth::user()->id == $post->user_id)
                <div class="text-right">
                    <a href="{{url('posts/delete',$post->id)}}" class="btn btn-outline-danger ">Delete Post</a>
                    <a href="{{url('posts/edit',$post->id)}}" class="btn btn-outline-success ">Edit Post</a>
                </div>
                @endif
                @endif
            </div>
        </div>
    </div>
  </div>
  <div class="text-right">
      <a href="/posts" class="btn btn-outline-info ">Back</a>
</div>


@endsection
