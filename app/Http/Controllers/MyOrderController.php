<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class MyOrderController extends Controller
{
    public function index(){
            $query = Transaction::where('user_id', '=', Auth::user()->id);
            $query = Transaction::with(['pricelist', 'mua', 'user']);
    return view('pages.mua.transaction.detail', compact('query'));
}
}