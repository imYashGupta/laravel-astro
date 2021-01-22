<?php

use Illuminate\Support\Facades\Hash;
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

Route::get('/','HomeController@homepage')->name('homepage');
Route::get('/shop','ShopController@shop')->name('shop');
Route::post("/cart/add","CartController@add")->name("cart.add");
Route::get("/cart/remove/{rowId}","CartController@remove");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/pay","HomeController@payment");
Route::get('cancel-payment', 'HomeController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'HomeController@paymentSuccess')->name('success.payment');
Route::get("{product_slug}",'ShopController@product')->name("product");