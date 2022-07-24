@extends('layouts.mua')

@section('title')
    Book- Me.Fabulous
@endsection

@push('addon-style')
    <style>
        .breadcrumb{
            margin:10px 20px 0px 20px;
        }
        .detail-transaksi{
        margin: 10px 20px 20px 20px;
        
    }
    .detail-transaksi-left{
        
        background: #ffff;
        padding:15px;
        border-radius: 20px;
    }
    
    .detail-transaksi-right{
        
        background: rgb(242, 250, 255);
        padding:15px;
        border-radius: 20px;
    }
    h5{
            color:#d6f9ff;
        }
    </style>
@endpush


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href={{route('invoice-mua.index')}}>Invoice</a></li>
      <li class="breadcrumb-item active" aria-current="page">Detail Invoice</li>
    </ol>
  </nav>
  <div class="row detail-transaksi">
    <div class="col-7 ">
        
    <div class="detail-transaksi-left">
        <div class="container-fluid">
                    <h3 class="text-center">Detail Transaksi</h4>
                <hr>
                <table class="table table-striped">
                    <tbody>
                      <tr>
                        <th scope="row">Booking ID</th>
                        <td>{{$item->transaction->kode}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Makeup Artist</th>
                        <td>{{$item->mua->name}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Jenis Makeup</th>
                        <td>{{$item->pricelist->name}}</td>
                      </tr>
                      
                        <th scope="row">Notes</th>
                        <td>{{$item->transaction->notes}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Date</th>
                        <td>{{$item->transaction->date}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Total Harga</th>
                        <td>{{$item->transaction->total_price}}</td>
                      </tr>
                      <tr>
                        <th scope="row">Status Penyewaan</th>
                        <td>{{$item->status_penyewaan}}</td>
                      </tr>
                      
                    </tbody>
                  </table>
        </div>
    </div>
    </div>
    <div class="col-5">
        
    <div class="detail-transaksi-right">
        <div class="container-fluid">
                    <h3 class="text-center">Detail Penyewa</h4>
                <hr>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Penyewa</th>
                            <td>{{$item->user->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Email</th>
                            <td>{{$item->transaction->email}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Phone Number</th>
                            <td>{{$item->transaction->phone_number}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Address</th>
                            <td>{{$item->transaction->address}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Status pembayaran</th>
                            <td>{{$item->status_pembayaran}}</td>
                          </tr>
                    </tbody>
                  </table>
        </div>
    </div>
    </div>
  </div>
 @endsection  