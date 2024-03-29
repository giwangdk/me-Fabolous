<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Makeupartist;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $categories = Category::count();
        $mua = Makeupartist::count();
        return  view('pages.admin.dashboard', compact('users', 'categories', 'mua'));
    }
}
