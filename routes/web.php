<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/login', 'App\Http\Controllers\HomeController@login')->name('home.login');
Route::get('/register', 'App\Http\Controllers\HomeController@register')->name('home.register');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');

Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::middleware('admin')->group(function(){
    Route::get('/admin', 'App\Http\Controllers\admin\AdminHomeController@index')->name('admin.home.index');

    Route::get('/admin/products', 'App\Http\Controllers\admin\AdminProductController@index')->name('admin.product.index');

    Route::post('/admin/products/store', 'App\Http\Controllers\admin\AdminProductController@store')->name('admin.product.store');

    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@destroy')->name('admin.product.delete');

    Route::get('/admin/product/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');

    Route::put('/admin/product/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
});

// Route::get('/', [HomeController::class, 'index'])->name("home.index");
// Route::get('/about', [HomeController::class, 'about'])->name("home.about");
// Route::get('/login', [HomeController::class, 'login'])->name('home.login');
// Route::get('/register', [HomeController::class, 'register'])->name('home.register');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');