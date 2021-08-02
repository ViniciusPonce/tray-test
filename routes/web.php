<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/index', function () {
    return view('index');
});

//    <!-- Seller Routes -->
Route::get( '/seller-register', function (){
    return view('sellers.registerSeller');
});

Route::get( '/seller-search', function(){
    return view('sellers.searchSeller');
});

//    <!-- Sales Routes -->

Route::get( '/new-sale', function (){
    return view('sales.newSale');
});

Route::get( '/search-sales', function(){
    return view('sales.searchSale');
});

Route::get('send-mail', function(){
    return new \App\Mail\ReportSeller();
});

Route::get('/test-mail', function(){
    return view('mail.ReportSeller');
});
