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
Route::get("/cart","CartController@cart");
Route::post("/cart/update","CartController@update");
Route::post("/cart/coupon-apply","CartController@coupon");
Route::post('{product_slug}/review','ShopController@addReview')->name('product.addReview');



Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/pay","HomeController@payment");
Route::get('cancel-payment', 'HomeController@paymentCancel')->name('cancel.payment');
Route::get('payment-success', 'HomeController@paymentSuccess')->name('success.payment');
Route::resource("enquiry","EnquiryController");
Route::get("contact-us",function(){
    return view("pages.contact");
});
Route::get("about-us","HomeController@about")->name("about");

Route::get("services","HomeController@services")->name("services");
Route::get("services/{service}","HomeController@service")->name("service");
Route::get("blogs","BlogController@blogs")->name("blogs");
Route::get("blog/{slug}","BlogController@blog")->name("blog");
Route::get("faq",function(){
    return view("pages.faq");
});
Route::get("service",function(){
      return view("pages.service-single");
});
Route::get("appointment",function(){
    return view("pages.appointment");
})->name("appointment");
Route::get("{product_slug}",'ShopController@product')->name("product");