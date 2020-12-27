<?php
Route::get("/test",function ()
{
    return Hash::make("12345678"); 
});
Route::prefix('admin')->group(function ()
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
    // Route::get('{any}', 'AdmiriaController@index');
});