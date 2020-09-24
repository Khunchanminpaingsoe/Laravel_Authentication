@extends('layouts.main')

@section('title','HomePage')

@section('content')
<div class="container col-md-6 offset-md-2">
    <div class="card">
        <a href="{{url('/register')}}" class="btn btn-primary">
            Register
        </a>
        <a href="{{url('/login')}}" class="btn btn-primary">
            Login
        </a>
    </div>
</div>
@endsection