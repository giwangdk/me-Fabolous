@extends('layouts.mua')

@section('title')
    Dashboard Admin Pricelist
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">List of My Transactions<!</h3>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Book Id</th>
                                    <th>Penyewa</th>
                                    <th>Jenis Makeup</th>
                                    <th>Date</th>
                                    <th>Status Pembayaran</th>
                                    <th>Status Penyewaan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverside: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                {data: 'id', name: 'id'},
                {data: 'transaction.kode', name: 'kode', width: '15%' },
                {data: 'user.name', name: 'user.name'},            
                {data: 'transaction.makeup', name: 'transaction.makeup'},            
                {data: 'trasnaction.date', name: 'trasnaction.date', width: '15%' }, 
                {data: 'status_pembayaran', name: 'status_pembayaran'},
                {data: 'status_penyewaan', name: 'status_penyewaan'},
                {
                    data: 'action', 
                    name: 'action',
                    orderable: false,
                    scrollable: false,
                },
            ],
        })
    </script>
@endpush