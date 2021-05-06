@extends('layouts.app')

@section('title')
    MUA- Look better, Feel better
@endsection

@section('content')
<div class="page-categories">
    <div class="container">
        <div class="row ">
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

<div class="page-mua my-4">
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