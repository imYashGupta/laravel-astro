<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

Route::get("/test",function ()
{
    return Hash::make("12345678"); 
});
Route::get("admin/lock-screen","AdminController@lockedScreen")->name("admin.locked");
Route::middleware(["auth","admin"])->prefix('admin')->group(function ()
{
    Route::get("/",function ()
    {
        return view("admin.index");
    });
    
    Route::get("/dashboard",function ()
    {
        return view("admin.index");
    })->name("dashboard");
    Route::resources([
        'users'     => 'UserController',
        "category"  => "CategoryController",
        "coupon"    => "CouponController",
        "blog-category" => "BlogCategoryController",
        "blog"      => "Admin\BlogController",
        "shipping" => "ShippingController",
        "testimonial" => "TestimonialController",
        "review"   => "ReviewController"
        ]);
        Route::resource("product","Admin\ProductController")->except(["store","update"]);
        Route::post("product/store","Admin\ProductController@store")->name("product.store");
        Route::post("product/{prod}/update","Admin\ProductController@store")->name("product.update");
        Route::post("product/image/delete","Admin\ProductController@deleteImage");
        Route::get("review/{review}/action","ReviewController@action")->name("review.action");
        Route::get("error","AdminController@error")->name("admin.error");
        // Route::get('{any}', 'AdminController@index');
});
 