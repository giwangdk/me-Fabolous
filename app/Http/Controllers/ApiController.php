<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;

class ApiController extends Controller
{
    //
    function payment_handler(Request $request)
    {
        $json = json_decode($request->getContent());

        $signature_key = hash('sha512', $json->order_id . $json->status_code . $json->gross_amount . env('MIDTRANS_SERVER_KEY'));
        if ($signature_key == $json->signature_key) {
            $transaction = Invoice::where('order_id', $json->order_id)->first();
            $transaction->status_pembayaran = $json->transaction_status;
            $transaction->update();
            return response()->json(['status' => 'success']);
        } else {
            return abort(404);
        }
    }
}
