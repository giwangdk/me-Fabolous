<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index(){
            $transactions = Transaction::where('user_id', '=', Auth::user()->id)->get();
            $s = Transaction::with(['pricelist', 'mua', 'user']);
    return view('pages.my-order', compact('transactions'));
}
}