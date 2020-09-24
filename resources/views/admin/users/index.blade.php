@extends('layouts.main')

@include('layouts.partials.nav')

@section('content')
    <div class="container">
            <div class="col-md-8 offset-md-1">
                <div class="card">
                    <div class="card-header"><h3>Users Management</h3></div>

                    <div class="card-body">
                    <table class="table table-sm table-dark">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Roles</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                <td>{{$user->id}}
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                
                                    @can('edit-users')
                                        <a href="{{action('UserController@edit',$user->id)}}">
                                        <button type="button" class="btn btn-primary btn-sm">EDIT</button>
                                        </a>
                                    @endcan
                                    @can('delete-users')
                                        <a href="{{action('UserController@destroy',$user->id)}}">
                                    <button type="button" class="btn btn-warning btn-sm">DELETE</button>
                                    </a>
                                    @endcan
                                    
                                </td>
                                </tr>
                            @endforeach   
                        </tbody>
                        </table>
                        <!--a href="{{url('/logout')}}" class="btn btn-primary">Logout</a-->
                    </div>
                </div>
            </div>
        </div>
@endsection
