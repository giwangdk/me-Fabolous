<?php

namespace App\Http\Controllers;

use App\Category;
use App\Makeupartist;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $makeupartists = Makeupartist::all();
        return view('pages.categories', compact('categories', 'makeupartists'));
    }
}
