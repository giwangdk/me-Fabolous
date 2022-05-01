@extends('layouts.mua')

@section('title')
    Add new Gallery
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard-heading">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Add New Make Up Artist Photo<!</h3>
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
                            <form class="" action="{{route('gallery.index')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" 
                                    name="photos" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">
                                        Upload makeupartist's photos
                                    </label>
                                    <label for="">{{$makeupartist->name}}</label>
                                </div>
                                <input type="text" name="mua_id" value={{$makeupartist->id}} hidden>
                                <div class="col text-right mt-4">
                                    <button type="submit" class="btn btn-primary ">Add</button>
                                </div>
                                
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection