<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use App\Http\Controllers\API\AuthController;

Route::post('register', [AuthController::class, 'register'])->name('userCreate');
Route::post('login', [AuthController::class, 'login'])->name('userLogin');


Route::middleware(['auth:sanctum'])->group(function (){
    Route::post('logout', [AuthController::class, 'logout'])->name('userLogout');

    Route::post('product/add', [ProductController::class, 'store'])->name('storeProduct');

    Route::get('all/products', [ProductController::class, 'index'])->name('showProducts');

    Route::get('product/{id}', [ProductController::class, 'show'])->name('specificProduct');

//Route::put('product/update/{id}', [ProductController::class, 'update'])->name('updateProduct');

    Route::post('product/update/{id}', [ProductController::class, 'update'])->name('updateProduct');

    Route::delete('product/delete/{id}', [ProductController::class, 'destroy'])->name('deleteProduct');
});



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
