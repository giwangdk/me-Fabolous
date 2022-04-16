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
    .error{
        color:red
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
                    <p class="nama" >
                    {{Auth::user()->mua_name}}
                    </p>
                    <p class="alamat"><i class="fas fa-thumbtack mr-2"></i>
                        @if ($mua)
                        {{$mua->location()}}
                    @else
                        <span class="error">
                            Lengkapi data Lokasi MUA mu!
                        </span>
                    @endif
                    </p>
                    <div class="card-logo p-0 d-flex">
                        <img src="/images/instagram.svg" class="img-logo mr-2" alt="">
                        <p>
                            @if ($mua)
                            {{$mua->instagram()}}
                        @else
                            <span class="error">
                                Lengkapi data Instagram MUA mu!
                            </span>
                        @endif
                        </p>
                    </div>
                    <div class="card-logo p-0 d-flex ">
                        <img src="/images/whatsapp.svg" class="img-logo mr-2" alt="">
                        <p >
                            @if ($mua)
                            {{$mua->whatsapp()}}
                        @else
                            <span class="error">
                                Lengkapi data Whatsapp MUA mu!
                            </span>
                        @endif
                        </p>
                    </div>
                    <div class="description">
                        <p>  @if ($mua)
                            {{$mua->name()}}
                        @else
                            <span class="error">
                                Lengkapi data Deskripsi MUA mu!
                            </span>
                        @endif</p>
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