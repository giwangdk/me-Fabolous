<?php

namespace App\Http\Controllers;

use App\Makeupartist;
use App\Gallery;
use App\Pricelist;
use App\Review;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $id)
    {
        $mua = Makeupartist::with(['galleries', 'pricelists', 'reviews'])->where('id', $id)->firstOrFail();

        return view('pages.detail', compact('mua'));
    }

    public function store(Request $request)
    {
        Review::create([
            "review" => $request["review"],
            "user_id" => Auth::id(),
            "mua_id" => $request["mua_id"],
        ]);
        Alert::success('Success', 'Review mu berhasil di post!');
        return redirect('/categories');
    }
}
