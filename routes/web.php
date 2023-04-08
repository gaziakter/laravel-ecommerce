<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

 // Category All Route 
 Route::controller(CategoryController::class)->group(function () {
    Route::get('/add/category', 'AddCategory')->name('add.category');
    Route::get('/all/category', 'AllCategory')->name('all.category');
    Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
    Route::get('/all/subcategory', 'AllSubCategory')->name('all.sub.category');
    Route::post('/store/category', 'StoreCategory')->name('store.category');
    Route::get('/edit/category/{id}','EditCategory')->name('edit.category');
    Route::post('/update/category','UpdateCategory')->name('update.category');
    Route::get('/delete/category/{id}','DeleteCategory')->name('delete.category');
});

 // Sub Category All Route 
 Route::controller(SubCategoryController::class)->group(function () {
    Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
    Route::post('/Add/subcategory', 'StoreSubCategory')->name('store.subcategory');
    Route::get('/All/Subcategory','AllSubCategory')->name('all.sub.category');
    Route::get('/Edit/Subcategory/{id}', 'EditSubcategory')->name('edit.subcategory');
    Route::post('/update/sub/category','UpdateSubCategory')->name('update.sub.category');
    Route::get('/delete/sub/category/{id}','DeleteSubCategory')->name('delete.subcategory');

});


 // Product All Route 
 Route::controller(ProductController::class)->group(function () {
    Route::get('/add/product', 'AddProduct')->name('add.product');
    Route::get('/all/product', 'AllProduct')->name('all.product');
    Route::post('/store/product', 'StoreProduct')->name('store.product');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
