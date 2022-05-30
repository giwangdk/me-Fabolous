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
        $name_price = Pricelist::where('id', '=', $price_id)->get()->first();

        $transactions = Transaction::create([
            'nama'=>$request->nama,
            'mua_id'=>$id,
            'user_id'=> Auth::user()->id,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'makeup'=>$price_id,
            'total_price'=>$name_price->price,
            'date'=>$request->date,
            'address'=>$request->address,
            'status_pembayaran'=>'UNPAID',
            'status_penyewaan' => 'PENDING',
            'kode'=>$kode,
            'notes'=>$request->notes,
        ]);
        
        $item = Transaction::findOrFail($transactions->id);
        return view('pages.detail-book', compact('item'));

    }

    public function detail(Request $request, $id)
    {
        $item = Transaction::findOrFail($id);
        return view('pages.detail-book', compact('item'));
    }

    public function bayar(Request $request, $id)
    {

        $kode = 'STORE-'.mt_rand(000000, 999999);
        $price_id = $request->price_id;
        $name_price = Pricelist::where('id', '=', $price_id)->get()->first();

        $transactions = Transaction::create([
            'nama'=>$request->nama,
            'mua_id'=>$id,
            'user_id'=> Auth::user()->id,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'makeup'=>$price_id,
            'total_price'=>$name_price->price,
            'date'=>$request->date,
            'address'=>$request->address,
            'status_pembayaran'=>'UNPAID',
            'status_penyewaan' => 'PENDING',
            'kode'=>$kode,
            'notes'=>$request->notes,
        ]);


        //Konfigurasi Midtrans
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        $midtrans = [
            'transaction_details' =>[
                'order_id' => $kode,
                'gross_amount' => (int) $name_price->price
            ],
            'customer_details' =>[
                'nama'=>$request->nama,
                'email'=>$request->email,
                           'phone_number'=>$request->phone_number,
               'address'=>$request->address,
            ],
            'enabled_payments' =>[
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb'=>[]
            ];

                        
            try {
                // Get Snap Payment Page URL
                $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
                
                return redirect($paymentUrl);
            }
            catch (Exception $e) {
                echo $e->getMessage();
            }
    }

    public function callback(Request $request)
    {

    }
}
