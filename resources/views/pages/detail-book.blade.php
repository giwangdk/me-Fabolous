@extends('layouts.app')

@section('title')
Book- Me.Fabulous
@endsection

@push('addon-style')
<style>
    .detail {
        background: #f8f3ed;
        border-radius: 20px;
        padding: 15px;

    }

    h5 {
        color: #683B2B;
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
                        <h5>Total Pembayaran DP</h5>
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
                <div class="text-center">
                    <button class="btn btn-primary text-center d-block" id="pay-button"> Booking </button>
                </div>
            </div>
        </div>
    </div>
    <form id="submit-form" action="{{route('bayar', $item->id)}}" method="POST">
        @csrf
        <input type="hidden" name="json" id="json_callback">
    </form>
</div>
@endsection

@push('addon-script')
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-mMsOrclcSH01duf_"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay('{{$snapToken}}', {
            onSuccess: function (result) {
                /* You may add your own implementation here */
                alert("payment success!");
                console.log(result);
                send_response_to_form(result)
            },
            onPending: function (result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
                send_response_to_form(result)
            },
            onError: function (result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
                send_response_to_form(result)
            },
            onClose: function () {
                /* You may add your own implementation here */
                alert('you closed the popup without finishing the payment');
                send_response_to_form(result)
            }
        })
    });

    function send_response_to_form(result) {
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit-form').submit();
    }
</script>
@endpush