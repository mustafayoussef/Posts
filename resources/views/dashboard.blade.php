@extends('layouts.app')
@section('title')
    Dashboard
@endsection
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

                    You are logged in!
                    <h3>Welcome {{Auth::user()->name}}</h3>
                    {{-- <h3>Welcome {{$user->name}}</h3> --}}
                    <div class="text-right">
                        <a href="{{url('posts/create')}}" class="btn btn-outline-info text-right">Create Post</a>
                    </div>
                </div>
            </div>

            <h5 class="mt-3 font-weight-bold ">My Posts</h5>
@if (count($posts)>0)
            @foreach ($posts as $post)

            <div class="card border-info my-3 shadow" >

                <div class="card-header  font-weight-bold">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="subject mt-2 ">
                                <h5>{{$post->subject}}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="text-right">
                                <a href="{{url('posts/delete',$post->id)}}" class="btn btn-outline-danger ">Delete Post</a>
                                <a href="{{url('posts/edit',$post->id)}}" class="btn btn-outline-success ">Edit Post</a>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="content-body text-center">
                        <p>{{$post->body}}</p>
                    </div>
                </div>
              </div>
            @endforeach
            @else




            <div class="card border-primary text-center">
                <div class="card-header">
                    <h4>Sorry</h4>
                </div>
                <div class="card-body">
                    <h4 class="card-title">No Have Posts To Show</h4>
                </div>
            </div>
@endif
        </div>
    </div>
</div>
@endsection
