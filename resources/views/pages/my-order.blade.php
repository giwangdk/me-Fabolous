@extends('layouts.app')

@section('title')
    My Order - Look better, Feel better
@endsection

@push('addon-style')
    <style>
        .my-order{
            margin-top: 100px;
        }
    </style>
@endpush

@section('content')
<div class="my-order">
    <div class="container mt-5">
        <h3 class="mt-4">Pesanan Saya</h4>
        
        @php
        $incrementCategory = 0
    @endphp
        <div class="row mt-4">
            @forelse ($transactions as $item)
            <div class="col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-delay="{{$incrementCategory+= 100}}">
                <div class="card">
                    <h5 class="px-3 pt-1 text-primary">{{$item->kode}}</h5>
                    <div class="card-title px-3  mt-1 d-flex justify-content-between">
                        <h5>{{$item->mua->name}}</h5>
                        <h6>{{$item->status_penyewaan}}</h6>
                    </div>
                    <div class="card-body px-3">
                        <h3>{{$item->pricelist->name}}</h3>
                        <p class="text-muted">{{$item->date}}</p>
                    </div>
                    <div class="card-bottom px-3 d-flex justify-content-between">
                        <h6 class="text-muted">
                            Total
                        </h6>
                        <h5>
                            Rp. {{$item->total_price}}
                        </h5>
                    </div>
                    <div class="btn btn-primary mx-3 my-3">{{$item->status_pembayaran}}</div>
                </div>
            </div>
            @empty
            <div class="text-center">
                <div class="card border-0 text-center p-3">
                    No Transaction Found
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>
@endsection