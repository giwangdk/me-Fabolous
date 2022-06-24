@extends('layouts.mua')

@section('title')
    Edit Status Penyewaan
@endsection
@section('content')
<div class="container-fluid">
    <div class="dashboard-heading">
        <div class="row">
            <div class="col-7 align-self-center">
                <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Edit Status Penyewan</h3>
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
                            <form class="" action="{{route('transaction-mua.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                <label for="name">Makeup</label>
                                <input disabled type="text" class="form-control" id="name" 
                                name="name" placeholder="Name of Pricelis"
                                value="{{$item->pricelist->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Total Price</label>
                                    <input disabled type="number" class="form-control" id="name" 
                                    name="price" 
                                    value="{{$item->total_price}}">
                                    </div>

                                    <div class="form-group">
                                        <label >Status Pembayaran</label>
                                        <input disabled  class="form-control" name="status_pembayaran"
                                        value="{{$item->status_pembayaran}}">
                                        </div>
                                
                                <label for="">Status Penyewaan</label>
                                <div class="input-group">
                                    <select name="category_id" class="custom-select">
                                    <option value="{{$item->status_penyewaan}}" selected disabled>{{$item->status_penyewaan}}</option>
                                    <option value="PENDING">PENDING</option>
                                    <option value="ONPROGRESS">ONPROGRESS</option>
                                    <option value="FINISHED">FINISHED</option>
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