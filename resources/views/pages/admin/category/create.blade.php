@extends('layouts.admin')

@section('title')
    Category
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard-heading">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Add New Category<!</h3>
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
                            <form class="" action="{{route('category.index')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" 
                                name="name" placeholder="Name of Category"
                                value="{{old('name', '')}}">
                                </div>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" 
                                    name="photo" id="validatedCustomFile" required>
                                    <label class="custom-file-label" for="validatedCustomFile">
                                        Upload category's photo
                                    </label>
                                </div>
                                
                                <div class="form-group">
                                <label >Description</label>
                                <textarea class="form-control" id="editor" name="description" rows="3" value="{{old('description', '')}}"></textarea>
                                </div>
                                <div class="col text-right">
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
@push('addon-script')
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endpush