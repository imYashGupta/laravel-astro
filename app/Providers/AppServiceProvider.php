<?php

namespace App\Providers;

use App\Notification;
use App\User;
use App\Setting;
use Illuminate\Support\Facades\DB;
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
            $description = Setting::where("name","description")->first();
            $title = Setting::where("name","title")->first();
            $keywords = Setting::where("name","keywords")->first();
            $email = Setting::where("name","email")->first();
            $phone = Setting::where("name","phone")->first();
            $address = Setting::where("name","address")->first();
            $map_data = Setting::where("name","map_data")->first();
            $logo = Setting::where("name","logo")->first();
            $favicon = Setting::where("name","favicon")->first();
            $footer_text = Setting::where("name","footer_text")->first();

           $admin = User::find(1);


            view()->share('appData',[
                "cartItem" => Cart::content(),
                "cartTotal" => Cart::subtotal(),
                "cartCount" => Cart::count(),
                "name" => $name->value,
                "description"  => $description->value,
                "title" => $title->value,
                "keywords"  => $keywords->value,
                "email" => $email->value,
                "phone" => $phone->value,
                "address" => $address->value,
                "map_data" => $map_data->value,
                "logo" => $logo->value,
                "favicon" => $favicon->value,
                "footer_text" => $footer_text->value,
                "admin" => $admin
            ]);

            View::composer('pages.includes.header', function($view)
            {
                 
                $view->with('header',[
                    "cartItem" => Cart::content(),
                    "cartTotal" => Cart::subtotal(),
                    "cartCount" => Cart::count(),
                ]);
            });
            View::composer('pages.includes.footer', function($view)
            {
                $services=DB::table("page_management")->whereIn("name",["horoscopes","numerology","kundli-dosh","birth-journal","vastu-shastra","gemstones"])->get();     
                $services->map(function ($service)
                {
                    $service->description = json_decode($service->content,true)["description"];
                    /* $service->_content = json_decode($service->content,true)["content"];
                    $service->image = json_decode($service->content,true)["image"]; */
                    $service->name =  $service->name;
                    $service->main = json_decode($service->content,true)["main"];
        
                });
                 
                $view->with('footer',[
                    "services" => $services,
                ]);
            });

            View::composer('layouts.sidebar', function($view)
            {
                $notifications=Notification::latest()->get();
                $unseen=Notification::whereNull("seen")->get();
                $view->with('notifications',$notifications)->with("unseen",$unseen);
            });

    }
}
