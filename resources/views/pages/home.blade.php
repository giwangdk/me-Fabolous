@extends('layouts.app')

@section('title')
    Book- Look better, Feel better
@endsection

@section('content')
<div class="page-content page-home" data-aos="fade-down" >
    <div class="container">
        <div class="row">
            <div class="col-lg-6 "  data-aos="fade-down" data-aos-delay="100">
                <div class="tagline">
                    <h1>Book your <span>make up artist</span> with us!</h1>
                    <p class="text-muted">Let the beauty prompt out of you</p>
                </div>

            </div>
            <div class="col-md-6 img-right ml-auto col-lg-5" data-aos="fade-down" data-aos-delay="100">
                <img src="/images/undraw_makeup_artist_rxn8.svg" class="w-100" alt="">
            </div>
            <div class="col-8 m-auto" data-aos="fade-down" data-aos-delay="100">
                <div class="search-tab mt-4">
                    <input type="search" class="form-control input-search" value="get miracle beauty...">
                    <a class="btn btn-search" href=""><i class="fas fa-search fa-2x"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-steps">
    <div class="container">
        <h2 class="text-center my-4" data-aos="fade-up" >Book your make up artist <br> in 3 steps</h2>
        <div class="row d-flex justify-content-around text-center m-auto ">
            <div class="col-md-3 col-sm-12 mt-3 card-step" data-aos="fade-up" data-aos-delay="100">
                <div class="icon-step">
                    <img src="/images/Step 1_Isometric.svg" alt="">
                </div>
                <div class="icon-text">
                    <h5>Choose you MUA</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit..</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 mt-3 card-step" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-step">
                    <img src="/images/Step 2_Isometric.svg" alt="">
                </div>
                <div class="icon-text">
                    <h5>Pick up your date!</h5>
                    <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit.</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-12 mt-3 card-step" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-step">
                    <img src="/images/Step 3_Isometric.svg" alt="">
                </div>
                <div class="icon-text">
                    <h5>Book your MUA</h5>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-categories my-5">
    <div class="container">
        <h2 data-aos="fade-up" >Look pretty, feel pretty</h2>
        <div class="row">
            @php
                $incrementCategory = 0
            @endphp
            @forelse ($categories as $category)
            <div class="col-lg-3 col-md-4 col-sm-12  " data-aos="fade-up" data-aos-delay="{{$incrementCategory += 100}}">
                <div class="card-categories mr-2 ">
                    <div class="card-title">
                        <img src="{{Storage::url($category->photo)}}" alt="">
                        <h3>{{$category->name}}</h3>
                    </div>
                    <div class="card-body">
                        <p>{!! $category->description !!}</p>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-lg-3 col-md-4 col-sm-12  ">
                <div class="card-categories mr-2 ">
                    No Categories Found
                </div>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="page-mua">
    <div class="container">
        <div class="row">
            @forelse ($makeupartists as $mua)
            <div class="col-lg-3 col-md-4 col-sm-12" data-aos="fade-up" data-aos-delay="{{$incrementCategory+= 100}}">
                <div class="card text-center p-3">
                    <div class="card-img">
                        <img src="{{Storage::url($mua->photo)}}">
                    </div>
                    <div class="card-body">
                        <h5>{{$mua->name}}</h5>
                        <p class="text-muted">{{$mua->location}}</p>
                    </div>
                    <a href="{{route('detail', $mua->id)}}" class="btn btn-card">See Detail</a>
                </div>
            </div>
            @empty
            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="card text-center p-3">
                    No Mua Found
                </div>
            </div>
            @endforelse



        </div>
    </div>
</div>
@endsection