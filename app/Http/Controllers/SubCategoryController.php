<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    //
    public function AddSubCategory(){
        $categories = Category::latest()->get();
        return view('admin.categories.Add_sub_category', compact('categories'));
    }


    public function StoreSubCategory(Request $request){
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        SubCategory::insert([
            'sub_category_name' => $request->sub_category_name,
            'category_id' => $category_id,
            'category_name' =>  $category_name,
            'slug' => strtolower(str_replace('', '-', $request->sub_category_name))
        ]);
        Category::where('id', $category_id)->increment('sub_category_count', 1);

        return redirect()->route('all.sub.category')->with('message', 'Sub Category added successfully!');
    }

    public function AllSubCategory(){
        return view('admin.categories.All_sub_category');
    }
}
