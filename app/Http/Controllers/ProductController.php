<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function AddProduct(){
        return view('admin.product.Add_product');
    }


    public function AllProduct(){
        return view('admin.product.all_product');

    }
}
