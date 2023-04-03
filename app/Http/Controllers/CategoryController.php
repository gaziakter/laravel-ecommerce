<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function AddCategory(){
        return view('admin.categories.Add_category');
    }

    public function AllCategory(){
        return view('admin.categories.All_category');
    }

    public function AddSubCategory(){
        return view('admin.categories.Add_sub_category');
    }

    public function AllSubCategory(){
        return view('admin.categories.All_sub_category');
    }
}
