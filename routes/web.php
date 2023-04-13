<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Customer\CustomerController;
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


Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'HomePage')->name('home');
});


Route::controller(ClientController::class)->group(function(){
    Route::get('/category/{id}/{slug}', 'CategoryPage')->name('category');
    Route::get('/product-details/{id}/{slug}', 'ProductDetails')->name('product.details');
});

// middleware use for auth
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

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
        Route::get('/Edit/image/{id}', 'EditImage')->name('edit.image');
        Route::post('/update/product/image', 'UpdateProductImage')->name('update.product.image');
        Route::get('/Edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::get('/delete/product/{id}', 'DeleteProduct')->name('delete.product');
    });

    Route::controller(LogoutController::class)->group(function(){
        Route::get('/logout', 'LogOut')->name('log.out');
    });


    Route::controller(CustomerController::class)->group(function(){
        Route::post('/add/cart', 'AddCart')->name('add.to.cart');
        Route::get('/cart/page', 'CartPage')->name('cart.page');
        Route::get('/cart/remove/{id}', 'RemoveCart')->name('remove.cart');
    });

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
