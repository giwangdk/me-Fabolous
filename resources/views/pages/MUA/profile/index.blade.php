@extends('layouts.mua')

@section('title')
    Make Up Artist
@endsection

@push('addon-style')
<style>
    .nama{
        font-size: 25px;
        font-weight: 600;
    }
    .avatar img{
        width: 200px;
        height: 200px;
        border-radius: 100%
    }
    .img-logo{
    width:30px;
    }

    .card-logo p{
        font-weight: 500;
        padding: 10px 0;
        margin-bottom: 0
    }
</style>
@endpush
@section('content')
<div class="container-fluid text-center">
    <div class="profile-mua p-5 bg-white">
        <div class="row">
            <div class="avatar col-lg-3 col-md-6">
                <img src="/images/instagram.svg" alt="">
            </div>
            <div class="col-lg-8 col-md-6 d-flex flex-column justify-content-start text-left ml-lg-5">
                    <p class="nama" >Ineke Andiny</p>
                    <p class="alamat"><i class="fas fa-thumbtack mr-2"></i>Selabintana</p>
                    <div class="card-logo p-0 d-flex">
                        <img src="/images/instagram.svg" class="img-logo mr-2" alt="">
                        <p>@inkekeandiny</p>
                    </div>
                    <div class="card-logo p-0 d-flex ">
                        <img src="/images/whatsapp.svg" class="img-logo mr-2" alt="">
                        <p >08666643234</p>
                    </div>
                    <div class="description">
                        <p>Jalan Selabintana, gang cimanggah, rt 05/02. Sukabumi 43112</p>
                    </div>
                </div>
                </div>
                   
                    <a href="#" class="btn btn-primary w-100 mt-5">Edit My MUA Profile</a>
                </div>
</div>


@endsection
@push('addon-script')
<script>
    CKEDITOR.replace( 'editor' );
</script>
@endpush