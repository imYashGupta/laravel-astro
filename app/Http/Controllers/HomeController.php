<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Srmklive\PayPal\Services\ExpressCheckout;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
            // $this->middleware('auth');
    }

    public function homepage()
    {
        $testimonials=Testimonial::where("status",1)->get();

        return view('pages.index',["testimonials" => $testimonials]);
    }

    public function about()
    {
        $testimonials=Testimonial::where("status",1)->get();
        $getAbout=DB::table("page_management")->where("name","about")->first();    
        $about= json_decode($getAbout->content,true); 
        return view('pages.about',["testimonials" => $testimonials,"about" => $about]);
    }

    public function services()
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
        return view("pages.services",["services" => $services]);
    }

    public function service(Request $request,$service)
    {
        $getService=DB::table("page_management")->where("name",$service)->first();     
        $_service = json_decode($getService->content,true);
        return view("pages.service-single",["service" => $_service,"name" => $getService->name]);
   
    }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function payment(Request $request)
    {
        $product = [];
        $product['items'] = [
            [
                'name' => 'Nike Joyride 2',
                'price' => 112,
                'desc'  => 'Running shoes for Men',
                'qty' => 2
            ]
        ];
  
        $product['invoice_id'] = 1;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = 224;
  
        $paypalModule = new ExpressCheckout;
  
        $res = $paypalModule->setExpressCheckout($product);
  
        return redirect($res['paypal_link']);

    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        return $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            dd('Payment was successfull. The payment success page goes here!');
        }
  
        dd('Error occured!');
    }
}
