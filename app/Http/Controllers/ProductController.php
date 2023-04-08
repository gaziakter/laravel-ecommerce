<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function AddProduct(){
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.product.Add_product', compact('category', 'subcategory'));
    }


    public function AllProduct(){
        return view('admin.product.all_product');

    }

    public function StoreProduct(Request $request){
        $request->validate([
            'product_name' => 'required|unique:products',
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_sub_category_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('product_img');
        $image_name = hexdec(uniqid()).'.'. $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $image_name);
        $img_url = 'upload/'.  $image_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_sub_category_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('sub_category_name');

        Product::insert([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_category_id' => $request->product_category_id,
            'product_sub_category_id' => $request->product_sub_category_id,
            'product_category_name' => $category_name,
            'product_sub_category_name' =>  $subcategory_name,
            'product_img' =>  $img_url,
            'slug' => strtolower(str_replace('', '-', $request->product_name))
        ]);

        Category::where('id',  $category_id)->increment('product_count', 1);
        SubCategory::where('id',   $subcategory_id)->increment('product_count', 1);

        return redirect()->route('all.product')->with('message', 'Product add successfully!');
    }
}
