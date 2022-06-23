<?php

namespace App\Http\Controllers\MUA;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Gallery;
use App\Makeupartist;
use App\Review;
use App\Transaction;

class DashboardController extends Controller
{
    public function index()
    {
        $reviews=null;
        $transactions=null;
        $galleries=null;

        if(Makeupartist::where('user_id', '=', Auth::user()->id)->exists()){
            $makeupartist = Makeupartist::where('user_id', '=', Auth::user()->id)->get()->first();
            if (Review::where('mua_id', '=', $makeupartist->id)->exists()) {
                $review = Review::where('mua_id', '=', $makeupartist->id)->get();
                $reviews = $review->count();
            }

            if (Transaction::where('mua_id', '=', $makeupartist->id)->get()) {
                $transaction = Transaction::where('mua_id', '=', $makeupartist->id)->get();
                $transactions = $transaction->count();
            }

            if ( Gallery::where('mua_id', '=', $makeupartist->id)->get()) {
                $gallery = Gallery::where('mua_id', '=', $makeupartist->id)->get();
                $galleries = $gallery->count();
            }
           
        }
        return  view('pages.MUA.dashboard', compact('reviews', 'transactions', 'galleries'));
        
    }
}
