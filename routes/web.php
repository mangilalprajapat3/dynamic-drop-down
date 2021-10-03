<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'category','as'=>'category.'], function() {
    Route::get('/',[CategoryController::class,'index'])->name('index');
    Route::get('/create',[CategoryController::class,'create'])->name('create');
    Route::post('/store',[CategoryController::class,'store'])->name('store');
    Route::get('/edit/{id}',[CategoryController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[CategoryController::class,'update'])->name('update');
    Route::get('/delete/{id}',[CategoryController::class,'destroy'])->name('delete');
});

Route::group(['prefix' => 'subcategory','as'=>'subcategory.'], function() {
    Route::get('/',[SubcategoryController::class,'index'])->name('index');
    Route::get('/create',[SubcategoryController::class,'create'])->name('create');
    Route::post('/store',[SubcategoryController::class,'store'])->name('store');
    Route::get('/edit/{id}',[SubcategoryController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[SubcategoryController::class,'update'])->name('update');
    Route::get('/delete/{id}',[SubcategoryController::class,'destroy'])->name('delete');
});

Route::group(['prefix' => 'product','as'=>'product.'], function() {
    Route::get('/',[ProductController::class,'index'])->name('index');
    Route::get('/create',[ProductController::class,'create'])->name('create');
    Route::post('/store',[ProductController::class,'store'])->name('store');
    Route::get('/edit/{id}',[ProductController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[ProductController::class,'update'])->name('update');
    Route::get('/delete/{id}',[ProductController::class,'destroy'])->name('delete');
});
Route::post('getsubcategory',[CategoryController::class,'getSubcategoryByCategory'])->name('getsubcategory');

