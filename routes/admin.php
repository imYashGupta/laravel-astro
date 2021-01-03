<?php
Route::get("/test",function ()
{
    return Hash::make("12345678"); 
});
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
        "blog"      => "BlogController",
        "shipping" => "ShippingController"
    ]);
    Route::resource("product","Admin\ProductController")->except(["store","update"]);
    Route::post("product/store","Admin\ProductController@store")->name("product.store");
    Route::post("product/{prod}/update","Admin\ProductController@store")->name("product.update");
    Route::post("product/image/delete","Admin\ProductController@deleteImage");
    Route::get('{any}', 'AdmiriaController@index');
});