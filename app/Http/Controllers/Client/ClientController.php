<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    //
    public function CategoryPage($id){
        $categories = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('customer.category', compact('categories', 'products'));
    }


    public function ProductDetails($id){
        $products = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_category_name');
        $related_product = Product::where('product_category_name', $subcat_id)->latest()->get();
        return view('customer.product_details', compact('products', 'related_product'));
    }
}
