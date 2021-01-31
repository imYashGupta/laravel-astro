<?php

namespace App\Providers;

use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Gloudemans\Shoppingcart\Facades\Cart;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
            $name = Setting::where("name","name")->first();
            $email = Setting::where("name","email")->first();
            $phone = Setting::where("name","phone")->first();
            $address = Setting::where("name","address")->first();
            $map_data = Setting::where("name","map_data")->first();
            $logo = Setting::where("name","logo")->first();
            $favicon = Setting::where("name","favicon")->first();
            $footer_text = Setting::where("name","footer_text")->first();

           


            view()->share('appData',[
                "cartItem" => Cart::content(),
                "cartTotal" => Cart::subtotal(),
                "name" => $name->value,
                "email" => $email->value,
                "phone" => $phone->value,
                "address" => $address->value,
                "map_data" => $map_data->value,
                "logo" => $logo->value,
                "favicon" => $favicon->value,
                "footer_text" => $footer_text->value
            ]);

    }
}
