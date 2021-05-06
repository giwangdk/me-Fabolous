<?php

namespace App\Http\Controllers;

use App\Makeupartist;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index($id)
    {
        $mua = Makeupartist::with(['galleries', 'pricelists', 'reviews'])->where('id', $id)->firstOrFail();
        return view('pages.book', compact('mua'));
    }
}
