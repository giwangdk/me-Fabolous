@extends('layouts.admin')

@section('title')
Edit User
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard-heading">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit User</h3>
            </div>
        </div>
    </div>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul >
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}/</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-2">
                    <div class="card-body">
                            <form class="" action="{{route('user.update', $item->id)}}" method="POST" >
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                <label for="name">Name User</label>
                                <input type="text" class="form-control" id="name" 
                                name="name" placeholder="Name of User"
                                value="{{$item->name}}" >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email User</label>
                                    <input type="text" class="form-control" id="email" 
                                    name="email" placeholder="enter email..."
                                    value="{{$item->email}}" >
                                </div>
                                <div class="form-group">
                                    <label for="password">Password User</label>
                                    <input type="password" class="form-control" id="password" 
                                    name="password" placeholder="enter password..." >
                                </div>
                                <div class="form-group">
                                    <label >Roles</label>
                                    <select name="roles" class="form-control"  >
                                        <option value="USER">User</option>
                                        <option value="ADMIN">Admin</option>
                                    </select>
                                </div>
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-primary ">Edit</button>
                                </div>
                                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection