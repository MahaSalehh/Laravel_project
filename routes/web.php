<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

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
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('/navbar',[AdminController::class,'navbar']);

Route::get('/admindashboard',[AdminController::class,'admindashboard'])->name('admin.index')->middleware('admin');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');





// category
Route::get('/category',[CategoryController::class,'view_category'])->name('category')->middleware('admin');
Route::get
('/show_category',[CategoryController::class,'show_category'])->name('category_show');
Route::POST('/add_category',[CategoryController::class,'add_category'])->name('category.add')->middleware('admin');
Route::get('/delete_category/{id}',[CategoryController::class,'delete_category'])->middleware('admin');



// products routes
Route::get('/view_product',[ProductController::class,'view_product'])->name('products.view')->middleware('admin');
Route::post('/add_product',[ProductController::class,'add_product'])->middleware('admin');
Route::get('/show_product',[ProductController::class,'show_product'])->name('products.show')->middleware('admin');
Route::get('/delete_product/{id}',[ProductController::class,'delete_product'])->name('product.delete')->middleware('admin');
Route::get('/update_product/{id}',[ProductController::class,'edit_product'])->name('product.edit')->middleware('admin');
Route::post('/update_product_confirm/{id}',[ProductController::class,'update_product_confirm'])->name('products.update')->middleware('admin');
Route::get('/product_details/{id}', [ProductController::class,'product_details'])->middleware('admin');
// cart routes
Route::get('/product_details/{id}', [HomeController::class,'product_details'])->name('product.details');
Route::post('/add_cart/{id}',[HomeController::class,'add_cart'])->name('add.cart');
Route::get('/show_cart',[HomeController::class,'show_cart'])->name('show.cart');
// Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart'])->name('remove.cart');
Route::delete('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove.cart');
Route::get('/cash_order',[HomeController::class,'cash_order']);



require __DIR__.'/auth.php';
