<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function HomePage(){
        $all_product = Product::latest()->get();
        return view('customer.home', compact('all_product'));
    }
}
