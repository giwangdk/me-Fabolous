@extends('layouts.app')

@section('title')
    Book- Me.Fabulous
@endsection


@section('content')
    <div class="form-book">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <img src="/images/human.png" alt="">
                </div>
                <div class="col-lg-6 col-md-12">
                    <form>
                        <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="noHp">Phone Number </label>
                            <input type="text" class="form-control" id="noHp">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="mua">Make Up Artist </label>
                            <input type="text" class="form-control" id="mua" value="{{$mua->name}}">
                        </div>
                        <input type="hidden" name="whatsapp" value="{{$mua->whatsapp}}">
                        <div class="form-group col-md-6">
                            <label for="inputState">Make Up</label>
                            
                            <select id="inputState" class="form-control">
                                @foreach ($mua->pricelists as $pricelist)
                                <option value="{{$pricelist->id}}">{{$pricelist->name}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="date">Date </label>
                                <br>
                            <input type="date" id="date" name="date"
                                value="2021-03-22"
                                min="2021-01-01" max="2021-12-31">
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-row">
                            
                        <div class="form-group">
                        <br>
                        
                        <a class ="btn btn-primary" 
                        href="https://wa.me/62{{$mua->whatsapp}}?text=Halo%20kak%20{{$mua->name}}!%0APerkenalkan%20saya%20....%2C%20ingin%20booking%20makeup%20untuk%20tanggal%20...%20apakah%20tersedia%3F%20Terimakasih">Book via WhatsApp</a>
                        
                    </form>
 @endsection  