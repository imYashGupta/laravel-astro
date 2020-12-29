<?php
Route::get("/test",function ()
{
    return Hash::make("12345678"); 
});
Route::middleware("auth")->prefix('admin')->group(function ()
{
    Route::get("/",function ()
    {
        return view("admin.index");
    });
    
    Route::get("/dashboard",function ()
    {
        return view("admin.index");
    })->name("dashboard");
    Route::resource('users', 'UserController');
    Route::resource("category","CategoryController");
    Route::get('{any}', 'AdmiriaController@index');
});