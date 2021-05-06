@extends('layouts.app')

@section('title')
    Book- Me.Fabolous
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
                        </div>
                        <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                        </div>
                        <div class="form-row">
                            
                        <div class="form-group">
                        <br>
                        <button type="submit" class="btn btn-primary ">Book</button>
                    </form>
                    <?php 

                        if(isset($_POST['submit']))
                        {
                            $whatsapp=$_POST['whatsapp'];
                            $noHp=$_POST['noHp'];
                            $data = [
                            'whatsapp' => $whatsapp, // Receivers phone
                            'noHp' => $noHp, // Message
                        ];
                        $json = json_encode($data); // Encode data to JSON
                        // URL for request POST /message
                        $url = 'https://eu138.chat-api.com/instance136593/message?token=9d4j8zvj4eantnmr';
                        // Make a POST request
                        $options = stream_context_create(['http' => [
                                'method'  => 'POST',
                                'header'  => 'Content-type: application/json',
                                'content' => $json
                            ]
                        ]);
                        // Send a request
                        $result = file_get_contents($url, false, $options);
                        print_r($result);
                        }




                        ?>
                                        </div>
                                    </div>
                                
                            </div>
                            
                            </div>
@endsection  