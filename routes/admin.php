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
        "review"   => "ReviewController",
        "faq" => "FaqController",
    ]);
 

        Route::resource("product","Admin\ProductController")->except(["store","update"]);
        Route::post("product/store","Admin\ProductController@store")->name("product.store");
        Route::post("product/{prod}/update","Admin\ProductController@store")->name("product.update");
        Route::post("product/image/delete","Admin\ProductController@deleteImage");
        Route::get("review/{review}/action","ReviewController@action")->name("review.action");
        Route::get("error","AdminController@error")->name("admin.error");
        // Route::get('{any}', 'AdminController@index');
        Route::get("settings","SettingController@index")->name("settings");
        Route::post("settings","SettingController@update")->name("settings.update");

        Route::get("pages/about","PageManagement@about")->name("page.about");
        Route::post("pages/about","PageManagement@updateAbout")->name("page.about-update");
        Route::get("pages/privacy-policy","PageManagement@privacyPolicy")->name("page.privacy");
        Route::post("pages/privacy-policy","PageManagement@updatePrivacyPolicy")->name("page.privacy-update");
        Route::get("pages/terms-and-conditions","PageManagement@termsAndCondition")->name("page.terms");
        Route::post("pages/terms-and-conditions","PageManagement@updateTermsAndCondition")->name("page.terms-update");
        Route::get("pages/services","PageManagement@services")->name("page.services");

        Route::get("pages/services/{service}","PageManagement@service")->name("page.service");
        Route::post("pages/services/{service}","PageManagement@updateService")->name("page.service-update");
});
 