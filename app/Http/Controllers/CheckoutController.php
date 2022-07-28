<?php

namespace App\Http\Controllers;

use App\Invoice;
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
            'total_price'=>$name_price->price_dp,
            'date'=>$request->date,
            'address'=>$request->address,
            'kode'=>$kode,
            'notes'=>$request->notes,
        ]);
        
        $kode = 'STORE-'.mt_rand(000000, 999999);


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
                'gross_amount' => (int) $name_price->price_dp
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

        $snapToken = Snap::getSnapToken($midtrans);
        $item = Transaction::findOrFail($transactions->id);
        return view('pages.detail-book', compact(['item', 'snapToken']));

    }

    public function detail(Request $request, $id)
    {
        $item = Transaction::with(['pricelist', 'mua'])->findOrFail($id);
            return view('pages.detail-book', compact('item'));
    }

    public function bayar(Request $request, $id)
    {
        $item = Transaction::with(['pricelist', 'mua'])->findOrFail($id);
        $json = json_decode($request->get('json'));

        $invoice = new Invoice();
        $invoice->transaction_id = $item->id;
        $invoice->user_id = Auth::user()->id;
        $invoice->mua_id = $item->mua_id;
        $invoice->jenis_makeup = $item->makeup;
        $invoice->total_price = $json->gross_amount;
        $invoice->status_pembayaran = $json->transaction_status;
        $invoice->status_penyewaan  = 'PENDING';
        $invoice->transaction_code = $json->transaction_id;
        $invoice->order_id = $json->order_id;
        $invoice->payment_type = $json->payment_type;
        $invoice->payment_code = isset($json->payment_code) ? $json->payment_code : null;
        $invoice->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        return $invoice->save() ? redirect(url('/')) : redirect(url('/'))->with('error', 'Gagal menyimpan data');
    }

    public function callback(Request $request)
    {

    }
}
