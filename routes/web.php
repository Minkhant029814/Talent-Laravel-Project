<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/categories',[CategoryController::class ,'index'])->name('categories.index');
Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
Route::post('/categories/store',[CategoryController::class,'store'])->name('categories.store');

Route::get('/categories/{id}',[CategoryController::class,'show'])->name('categories.show');
Route::post('/categories/{id}',[CategoryController::class,'delete'])->name('categories.delete');

Route::get('/categories/{id}/edit',[CategoryController::class,'edit'])->name('categories.edit');
Route::post('/categories/{id}/update',[CategoryController::class,'update'])->name("categories.update");

// /Route for products
// Route::get('/articles/detail/{id}',[ArticleController::class,'detail']);

// Route::get('/output',[ArticleController::class,'index']);

Route::get('/products',[ProductController::class,'index'])->name('product.Index');
Route::get('/products/details/{id}',[ProductController::class, 'show'])->name('product.details');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product/save',[ProductController::class,'saveProduct'])->name('product.save');
Route::get('/products/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::get('/products/edit/{id}',[ProductController::class,'edit'])->name('products.edit');
Route::post('/prouducts/update/{id}',[ProductController::class,'update'])->name('products.update');


///for User

Route::resource('/users',UserController::class);

// Auth::routes();
Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


