<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index () {
        $categories = Category::all();
        return view('frontend.home.index', compact('categories'));
    }
}
