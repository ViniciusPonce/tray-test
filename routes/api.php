<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//    <!-- Sellers Api Routes -->
Route::prefix('sellers')->group(function(){
    Route::get('/', 'Api\SellerController@index');
    Route::get('/{id}', 'Api\SellerController@show');

    Route::post('/', 'Api\SellerController@store');
    Route::put('/{id}', 'Api\SellerController@update');

    Route::delete('/{id}', 'Api\SellerController@destroy');
});
//    <!-- Sales Api Routes -->
Route::prefix('sales')->group(function(){
    Route::get('/', 'Api\SaleController@showSalesMail');
    Route::get('/{id}', 'Api\SaleController@show');
    Route::post('/', 'Api\SaleController@store');
});


