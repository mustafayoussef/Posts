@extends('layouts.app')

@section('title')
    About Me
@endsection
@section('content')
    <div class="content text-center">
        <div class="title m-b-md my-3 text-center">
           <h2>About Page</h2>
    </div>
    <div>
        <ul class="list-unstyled">
            @foreach ($languages as $lang)
                <li><h5>{{$lang}}</h5></li>
            @endforeach
        </ul>
    </div>

@endsection
