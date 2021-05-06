<?php

namespace App\Http\Controllers;

use App\Category;
use App\Makeupartist;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(4)->get();
        $makeupartists = Makeupartist::take(4)->get();
        return view('pages.home', compact('categories', 'makeupartists'));
    }
}
