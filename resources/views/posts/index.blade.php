@extends('layouts.app')

@section('title')
    Posts
@endsection
@section('content')

<div class="text-center my-3">
    <h1 class="">Posts</h1>
</div>


<div class="row">
    @if (count($posts)>0)


    @foreach ($posts as $post)
    <div class="col-md-4 my-2 ">
        <div class="card shadow">
            <div class="card-header bg-info text-white font-weight-bold shadow text-center">
                {{$post->firstname}} {{$post->lastname}}
            </div>
            <div class="card-body">
                <div class="image d-flex" style="height: 250px">
                    <img src="{{url('/storage/post_image',$post->post_image)}}" class="img-fluid pb-3 justify-content-center" alt="laravel">
                </div>
                <h5 class="card-title text-center font-weight-bold">{{$post->subject}}</h5>
                <div class="text-center">
                    <span class="badge badge-success"> Created at : {{$post->created_at}} </span>
                    <span class="badge badge-success "> By : {{$post->user->name}} </span> <br><br>
                </div>
                <div class="text-center">
                    <a href="{{url('/posts',$post->id)}}" class="btn btn-outline-info">Read More</a>
                </div>
            </div>
        </div>
    </div>
       @endforeach
       @else

       <div class="card border-primary m-auto text-center" style="width: 50rem;">
        <div class="card-header"><h4>Sorry</h4></div>
        <div class="card-body">
          <h4 class="card-title">No Have Posts To Show</h4>
        </div>
      </div>
       @endif









</div>
    <div class=" my-3 d-flex">
        <div class="m-auto text-center">
            {{$posts->links()}}
        </div>
    </div>

@endsection
