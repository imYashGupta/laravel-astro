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
Route::get("/cart","CartController@cart")->name("cart");
Route::post("/cart/update","CartController@update");
Route::post("/cart/coupon-apply","CartController@coupon");
Route::post('{product_slug}/review','ShopController@addReview')->name('product.addReview');

//sb-fljj24599986@personal.example.com
//7!E>Qz[e


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get("/dashboard","DashboardController@dashboard")->name("user.dashboard");
Route::get("/profile","DashboardController@profile")->name("user.profile");
Route::get("/profile/edit","DashboardController@profileEdit")->name("user.profile.edit");
Route::post("/profile/basic-info","DashboardController@updateBasicInfo")->name("user.profile.info");
Route::post("/profile/address","DashboardController@updateAddress")->name("user.profile.address");
Route::get("/profile/password","DashboardController@password")->name("user.profile.password");
Route::post("/profile/password/update","DashboardController@updatePassword")->name("user.profile.update");

Route::get("/orders","DashboardController@orders")->name("user.orders");
Route::get("/orders/{order}","DashboardController@order")->name("user.order");
Route::get("/orders/token/{token}","DashboardController@orderToken")->name("user.order.token");
// Route::get("/my-appoinments","DashboardController@appoinments")->name("user.my-appoinments");

Route::get("/pay","HomeController@payment");
Route::get('cancel-payment', 'CheckoutController@paymentCancel')->name('cancel.payment');
Route::get('order-success', 'CheckoutController@paymentSuccess')->name('success.payment');


Route::resource("tickets","TicketController");
Route::post("tickets/{ticket}/reply","TicketController@storeReply")->name("ticket.storeReply");
Route::post("/enquiry.store","EnquiryController@store")->name("enquiry.store");


Route::get("contact-us",function(){
    return view("pages.contact");
})->name("contact-us");
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
Route::get("appointment","HomeController@appointment")->name("appointment");
Route::post("appointments","AppointmentController@store")->name("appointments.store");
Route::get("appointment-submited/{id}","HomeController@appointmentSubmited")->name("appointment.submit");

Route::get("checkout","CheckoutController@checkoutPage")->name("checkout");
Route::post("checkout","CheckoutController@checkout")->name("checkout.store");

//Newsletter
Route::post("newsletter","NewsletterController@store")->name("newsletter.store");
Route::get("newsletter/unsubscribe/{email}/","NewsletterController@unsubcribe")->name("newsletter.unsubcribe");


Route::get("{product_slug}",'ShopController@product')->name("product");
