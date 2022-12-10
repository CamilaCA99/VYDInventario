<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CAtegory;

class HomeController extends Controller
{
    public function index(){
        $categories = Category::where('user_id', auth()->user()->id)->get();
        $products = Product::where('user_id', auth()->user()->id)->get();
        return view('home', compact('products', 'categories'));
    }
        
}
