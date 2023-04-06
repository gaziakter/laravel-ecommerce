<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function AddCategory(){
        return view('admin.categories.Add_category');
    }

    public function AllCategory(){
        $categories = Category::latest()->get();
        return view('admin.categories.All_category', compact('categories'));
    }

    public function AddSubCategory(){
        return view('admin.categories.Add_sub_category');
    }

    public function AllSubCategory(){
        return view('admin.categories.All_sub_category');
    }

    public function StoreCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);
        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('', '-', $request->category_name))
        ]);
        return redirect()->route('all.category')->with('message', 'Category added successfully!');
    }

    public function EditCategory($id){
        $categories = Category::findOrFail($id);
        return view('admin.categories.Edit_category', compact('categories'));
    }

    public function UpdateCategory(Request $request){
        $category_id = $request->category_id;

        $request->validate([
            'category_name' => 'required|unique:categories'
        ]);
        Category::findOrFail($category_id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace('', '-', $request->category_name))
        ]);
        return redirect()->route('all.category')->with('message', 'Category Updated successfully!');
    }

    public function DeleteCategory($id){
        Category::findOrFail($id)->delete();
        return redirect()->route('all.category')->with('message', 'Category Deleted successfully!');
    }
}
