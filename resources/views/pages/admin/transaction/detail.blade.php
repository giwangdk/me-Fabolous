@extends('layouts.mua')

@section('title')
    Book- Me.Fabulous
@endsection

@push('addon-style')
    <style>
        .breadcrumb{
            margin:10px 40px 0px 40px;
        }
        .detail-transaksi{
        background: #ffff;
        margin: 10px 40px 40px 40px;
        border-radius: 20px;
        padding:15px;
        
    }
    h5{
            color:#683B2B;
        }
    </style>
@endpush


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={{route('transaction.index')}}>Transaksi</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Transaksi</li>
    </ol>
  </nav>
    <div class="detail-transaksi">
        <div class="container-fluid">
                    <h3 class="text-center">Detail Transaksi</h4>
                <hr>
                <div class="d-flex">
                    <div class="col-6">
                        <h6 class="mb-2 mt-3">Makeup Artist</h6>
                        <h6 class="mb-2 mt-0">Jenis Makeup</h6>
                        <h6 class="mb-2 mt-0">Notes</h6>
                        <br>
                        <h5>Tanggal Penyewaan</h5>
                        <br>
                        <h5>Total Pembayaran</h5>
                    </div>
                    
                    <div class="col-6 text-right">
                        <h6 class="mb-2 mt-3">{{$item->mua->name}}</h6>
                        <p class="mb-2">{{$item->pricelist->name}}</p>
                        <p class="mb-2">{{$item->notes}}</p>
                        <br>
                        <p>{{$item->date}}</p>
                        <br>
                        <p>Rp. {{$item->total_price}}</p>
                    </div>
                </div>
        </div>
    </div>
 @endsection  