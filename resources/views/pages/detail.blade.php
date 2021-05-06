@extends('layouts.app')

@section('title')
    Detail MUA
@endsection

@section('content')
<div class="page-detail">
    <div class="container">
        <nav aria-label="breadcrumb p-0">
            <ol class="breadcrumb p-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Book MUA</a></li>
                <li class="breadcrumb-item active" aria-current="page">Ineke Andini</li>
            </ol>
        </nav>

        <div class="row mt-5">
            <div class="col-md-4 col-sm-12">
                <div class="card detail-mua">
                    <div class="card-top d-flex">
                        <img src="{{Storage::url($mua->photo)}}" alt="">
                        <p class="align-self-center ml-3">{{$mua->name}}</p>
                    </div>
                    <p class="badge  mt-3 p-2"><i class="fas fa-thumbtack mr-2"></i>Selabintana</p>
                    <div class="card-logo p-0 d-flex mt-1">
                        <img src="/images/instagram.svg" class="img-logo mr-2" alt="">
                        <p class="align-self-center">{{$mua->instagram}}</p>
                    </div>
                    <div class="card-logo p-0 d-flex ">
                        <img src="/images/whatsapp.svg" class="img-logo mr-2" alt="">
                        <p class="align-self-center">{{$mua->whatsapp}}</p>
                    </div>
                    <a href="{{route('book', $mua->id)}}" class="btn btn-primary w-100">Isi Form Book</a>
                </div>
            </div>
            <div class="col-md-8 col-sm-12">
                <div class="detail">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active pl-0" id="pricelist-tab" data-toggle="tab" href="#pricelist" role="tab" aria-controls="pricelist" aria-selected="true">Pricelist</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="gallery" aria-selected="false">Gallery</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="false">Description</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review" aria-selected="false">Reviews</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="pricelist" role="tabpanel" aria-labelledby="pricelist-tab">
                        @auth
                        <div class="row d-flex flex-column p-3">
                            @foreach ($mua->pricelists as $item)
                            <div class=" card col  ">
                                <div class="paket d-flex justify-content-between">
                                    <h5 class="paket">{{$item->name}}</h5>
                                    <p>Rp. {{number_format($item->price)}}</p>
                                </div>
                                <h6 class="category">{{$item->category->name}}</h6>
                                <!-- Button trigger modal -->
                                <button type="submit" class="btn btn-modal" data-toggle="modal" data-target="#yourModal{{$item->id}}">
                                    Click For detail <i class="fas fa-arrow-right"></i>
                                </button>
                                
                                
                                <!-- Modal -->
                                <div class="modal fade" id="yourModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg ">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                                <div class="row">
                                                    <div class="col-6 p-4 text-justify">
                                                        <h3>{{$item->name}}</h3>
                                                        <h5 class="text-muted mb-3">Description</h5>
                                                        {!! $item->description !!}
                                                    </div>
                                                    <div class="col-6">
                                                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                                                <div class="carousel-inner">
                                                                <div class="carousel-item active">
                                                                    <img src="/images/harsmakeup/165520604_816392108973225_2791174638957469438_n.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="/images/harsmakeup/165950063_1046449902531317_1044269296488041616_n.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                <div class="carousel-item">
                                                                    <img src="/images/harsmakeup/165520604_816392108973225_2791174638957469438_n.jpg" class="d-block w-100" alt="...">
                                                                </div>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                
                                @endforeach
                        </div> 
                        @else 
                        <div class="login d-flex justify-content-center flex-column align-items-center mt-5">
                            <p class="text-muted my-4 text-center">Kamu belum bisa lihat informasi ini, <br> Login dulu yuk !</p>
                            <a href="/login" class="btn-primary p-2" >
                                Login to See Detail<i class="fas fa-arrow-right ml-3"></i>
                            </a>
                        </div>
                        @endauth              
                    </div>
                    <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                        @auth
                        <div class="row p-3">
                            @foreach ($mua->galleries as $gallery)
                                <div class="col-4 mt-3">
                                    <img src="{{Storage::url($gallery->photos)}}" alt="">
                                </div>      
                                @endforeach
                        </div>
                        @else 
                        <div class="login d-flex justify-content-center flex-column align-items-center mt-5">
                            <p class="text-muted my-4 text-center">Kamu belum bisa lihat informasi ini, <br> Login dulu yuk !</p>
                            <a href="/login" class="btn-primary p-2 my-1" >
                                Login to See Detail<i class="fas fa-arrow-right ml-3"></i>
                            </a>
                        </div>
                        @endauth
                    </div>
                    <div class="tab-pane fade" id="description" role="tabpanel" aria-labelledby="description-tab">
                        @auth
                        <div class="mt-3">
                            {!! $mua->description !!} 
                            </div> 
                        @else 
                        <div class="login d-flex justify-content-center flex-column align-items-center mt-5">
                                <p class="text-muted my-4 text-center">Kamu belum bisa lihat informasi ini, <br> Login dulu yuk !</p>
                                <a href="/login" class="btn-primary p-2 my-1" >
                                    Login to See Detail<i class="fas fa-arrow-right ml-3"></i>
                                </a>
                            </div>
                        @endauth  
                    </div>
                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                        @auth
                        <form action="/detail/{{$mua->id}}" method="POST" class="mt-5">
                            @csrf
                                <div class="form-group "">
                                    <textarea name="review" class="form-control mt-3 my-editor" placeholder="Berikan Review Anda"></textarea>
                                </div>
                                <div class="form-group sm-form-group">
                                    <input type="hidden" class="form-control" name="mua_id" id="mua_id" value="{{$mua->id}}">
                                </div>
                                <button type="submit" class="btn btn-primary btn-post">Post Review</button>
                        </form>
                        @else 
                        <div class="login d-flex justify-content-center flex-column align-items-center mt-5">
                                <p class="text-muted my-4 text-center">Kamu belum bisa memberikan review , <br> Login dulu yuk !</p>
                                <a href="/login" class="btn-primary p-2 my-1" >
                                    Login <i class="fas fa-arrow-right ml-3"></i>
                                </a>
                            </div>
                        @endauth

              
                        <div class="review mt-5 ">
                            <h5>Reviews {{$mua->name}}</h5>

                            @foreach ($mua->reviews as $review)
                        <div class="col-12 p-0">
                        <div class="card card-review ">
                            <div class="card-body p-2">
                                <h6 class="badge-title">{{$review->author->name}}</h6>
                                <p class="card-text" style="font-size: 15px;">{{$review->review}}</p>
                            </div>
                        </div>
                        </div>
                        @endforeach
                        </div>

                    
                </div>
                </div>
                </div>
            </div>
        </div>
@endsection