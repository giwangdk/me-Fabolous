<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index(){
            $transactions = Invoice::with(['transaction', 'pricelist', 'mua', 'user'])->where('user_id', '=', Auth::user()->id)->get();
    return view('pages.my-order', compact('transactions'));
}
}