@extends('layouts.app')

@section('title')
    Book- Me.Fabulous
@endsection

@push('addon-style')
    <style>
        .detail{
        background: #f8f3ed;
        border-radius: 20px;
        padding:15px;
        
    }
    h5{
            color:#683B2B;
        }
    </style>
@endpush


@section('content')
    <div class="form-book">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <img src="/images/human.png" alt="">
                </div>
                <div class="col-lg-6 col-md-12 detail">
                    <h4 class="text-center">Confirm Your Booking!</h4>
                <hr>
                <h5>Detail Pesanan</h5>
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-6">
                        <h6>Book ID</h6>
                        <h6 class="mb-2 mt-3">Makeup Artist</h6>
                        <h6 class="mb-2 mt-0">Jenis Makeup</h6>
                        <h6 class="mb-2 mt-0">Notes</h6>
                        <br>
                        <h5>Tanggal Penyewaan</h5>
                        <br>
                        <h5>Total Pembayaran</h5>
                    </div>
                    
                    <div class="col-6 text-right">
                        <p class="mb-2">{{$item->kode}}</p>
                        <h6 class="mb-2 mt-3">{{$item->mua->name}}</h6>
                        <p class="mb-2">{{$item->pricelist->name}}</p>
                        <p class="mb-2">{{$item->notes}}</p>
                        <br>
                        <p>{{$item->date}}</p>
                        <br>
                        <p>Rp. {{$item->total_price}}</p>
                    </div>
                </div>
                
                <a class="btn btn-logout text-center" href="{{route('bayar', $item->id)}}">Sign In </a>
                </div>
            </div>
        </div>
    </div>
 @endsection  