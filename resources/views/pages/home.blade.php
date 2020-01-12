@extends('layouts.app')
@section('title')
    Home
@endsection
@section('content')
    <div class="content">
        <div class="title m-b-md my-3 text-center">
            <h2 class="mb-3">Home Page</h2>
            <h5 class="mt-5">Welcome {{$name}}</h5>
    </div>
@endsection
