<?php

namespace App\Http\Controllers;

use App\Pricelist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;


class CheckoutController extends Controller
{
    public function process(Request $request, $id)
    {

        $kode = 'STORE-'.mt_rand(000000, 999999);
        $price_id = $request->price_id;
        $name_price = Pricelist::where('id', '=', $price_id);

        $transactions = Transaction::create([
            'name'=>$request->name,
            'mua_id'=>$id,
            'user_id'=> Auth::user()->id,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'makeup'=>$price_id,
            'price'=>$name_price,
            'date'=>$request->date,
            'address'=>$request->address,
            'status_pembayaran'=>'UNPAID',
            'status_penyewaan' => 'PENDING',
            'kode'=>$kode,
            'notes'=>$request->notes,
        ]);
    }

    public function callback(Request $request)
    {

    }
}
