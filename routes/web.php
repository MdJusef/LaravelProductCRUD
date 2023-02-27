<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
//    Route::get('/dashboard', function () {
//        return view('dashboard');
//    })->name('dashboard');
    Route::get('/dashboard',[AdminController::class,'index'])->name('dashboard');
    Route::get('/add-product',[ProductController::class,'index'])->name('add-product');
    Route::post('/insert-product',[ProductController::class,'insertProduct'])->name('insert-product');
    Route::get('/show-product',[ProductController::class,'showProduct'])->name('show-product');
    Route::post('/delete-product',[ProductController::class,'deleteProduct'])->name('delete.product');
    Route::get('/edit-product/{product_id}',[ProductController::class,'editProduct'])->name('edit-product');
    Route::post('/update-product',[ProductController::class,'updateProduct'])->name('update.product');
});
