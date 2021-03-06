@extends('layouts.app')

@section('title')
    Edit Post
@endsection
@section('content')


<div class="card border-dark my-3 shadow">
    <div class="card-header bg-info text-white text-center font-weight-bold shadow">Edit Post</div>

    <form class="w-75 text-left m-auto py-3" method="POST" action="{{url('/posts/update',$post->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="firstName">First Name</label>
            <input type="text" name="firstname" class="form-control" id="firstName" value="{{$post->firstname}}">
        </div>
        <div class="form-group ">
        <label for="lastName">Last Name</label>
        <input type="text" name="lastname" class="form-control" id="lastName" value="{{$post->lastname}}">
    </div>
    <div class="form-group">
        <label for="subject">Subject</label>
        <input type="text" name="subject" class="form-control" id="subject" value="{{$post->subject}}">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control" name="body" id="body" cols="3" rows="3">{{$post->body}}</textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Photo</label>
        <input type="file" name="post_image" class="form-control-file"  id="exampleFormControlFile1">
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-outline-info ">Update Post</button>
        </div>
    </form>
  </div>









    @endsection
