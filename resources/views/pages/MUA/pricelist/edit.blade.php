@extends('layouts.mua')

@section('title')
    Edit Pricelist
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard-heading">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Pricelist</h3>
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
                            <form class="" action="{{route('pricelist-mua.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                <label for="name">Name Pricelist</label>
                                <input type="text" class="form-control" id="name" 
                                name="name" placeholder="Name of Pricelis"
                                value="{{$item->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Price</label>
                                    <input type="number" class="form-control" id="name" 
                                    name="price" placeholder="Price Make Up"
                                    value="{{$item->price}}">
                                    </div>

                                <div class="form-group">
                                <label >Description</label>
                                <textarea class="form-control" id="editor" name="description" rows="3" value="{{old('description', '')}}"></textarea>
                                </div>
                                
                                <input type="text" name="mua_id" value={{$makeupartist->id}} hidden>
                                <label for="">Category</label>
                                <div class="input-group">
                                    <select name="category_id" class="custom-select">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">
                                        {{$category->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="col text-right mt-3">
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
@push('addon-script')
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endpush