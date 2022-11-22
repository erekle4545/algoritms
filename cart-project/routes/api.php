<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1','middleware'=>'auth:sanctum'],function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::group(['prefix' => 'v1'], function () {
    Route::get('/products', [\App\Http\Controllers\ProductsController::class, 'index']);
    Route::resource('cart',\App\Http\Controllers\CartController::class);
    Route::get('/delete/cart/product/{id}',[\App\Http\Controllers\CartController::class,'removeProductFromCart']);

    Route::put('/update/cart',[\App\Http\Controllers\CartController::class,'setCartProductQuantity']);

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
});
