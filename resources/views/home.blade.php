@extends('layouts.main')

@include('layouts.partials.nav')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <!--a href="{{url('/logout')}}" class="btn btn-primary">Logout</a-->
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
