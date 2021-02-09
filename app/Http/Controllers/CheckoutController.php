<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use App\Order;
use App\OrderItem;
use App\Product;
use App\Setting;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;
use Srmklive\PayPal\Services\ExpressCheckout;

class CheckoutController extends Controller
{
    public function checkoutPage()
    {
        $countries=DB::table("countries")->get();
        if(Cart::count() > 0 AND auth()->check()){
            return view("pages.checkout",["countries" => $countries]);
        }
        return redirect()->route("cart");
    }

   /*  public function checkout(Request $request)
    {
        $request->validate([
            "firstname" => ["required","min:3","max:64"],
            "lastname"  => ["required","min:3","max:64"],
            "email" => ["required","email"],
            "phone" =>  ["required","regex:/(^[0-9 ]+$)+/"],
            "country"   => ["required","string"],
            "state" => ["required","string"],
            "city"  => ["required","string"],
            "address"   => ["required","min:3"],
            "terms" => ["accepted"],
            "pincode" => ["required"]
        ]);

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
    } */

    public function checkout(Request $request)
    {
        $coupon = session()->get("coupon");
        
        $request->validate([
            "firstname" => ["required","min:3","max:64"],
            "lastname"  => ["required","min:3","max:64"],
            "email" => ["required","email"],
            "phone" =>  ["required","regex:/(^[0-9 ]+$)+/"],
            "country"   => ["required","string"],
            "state" => ["required","string"],
            "city"  => ["required","string"],
            "address"   => ["required","min:3"],
            "terms" => ["accepted"],
            "pincode" => ["required"]
        ]);
        $request->all();
        $country= DB::table("countries")->where("id",$request->country)->first();
        $state= DB::table("states")->where("id",$request->state)->first();
        $city= DB::table("cities")->where("id",$request->city)->first();
        
        $product = [];
        $items = [];
        $invoiceID =Str::random(4)."-".random_int(100,10000);
        foreach(Cart::content() as $item ){
            array_push($items,["name" => $item->name,"price" => $item->price,"qty" => $item->qty]);
        }
        $product["items"] = $items;
        $product['invoice_id'] = $invoiceID;
        $product['invoice_description'] = "Order #{$product['invoice_id']} Bill";
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = str_replace( ',', '', Cart::subtotal());
        if(session()->has("coupon")){
            $product['shipping_discount'] = $coupon["discountAmount"];
        }
        
        session(["billing" => $request->all(),"checkout" => $product]);
        session()->put("billing.country",$country->name);
        session()->put("billing.state",$state->name);
        session()->put("billing.city",$city->name);
        $paypalModule = new ExpressCheckout;  
        return $res = $paypalModule->setExpressCheckout($product);
        return redirect($res['paypal_link']);

    }

    public function paymentCancel()
    {
        dd('Your payment has been declend. The payment cancelation page goes here!');
    }
  
    public function paymentSuccess(Request $request)
    {
        if(!session()->has("billing") && !session()->has("checkout")){
            return redirect("/");
        }
        // http://laravel-shop.test/payment-success?token=EC-5S353482HH4132909&PayerID=D6LDMRKDJ8KZU
        $paypalModule = new ExpressCheckout;
        $billing=session()->get("billing");
        $checkout=session()->get("checkout");
        $coupon = session()->get("coupon");
        $address="{$billing['address']},{$billing['city']},{$billing['state']},{$billing['country']} ({$billing['pincode']})";
         $response = $paypalModule->getExpressCheckoutDetails($request->token);
  
        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {
            $order=new Order();
            $order->user_id = auth()->user()->id;
            $order->invoice_id = $checkout["invoice_id"];
            $order->billing_email = $billing["email"];
            $order->billing_details = json_encode($billing);
            $order->coupon_id = $coupon ? $coupon["id"] : NULL;
            $order->status = 1;
            $order->address = $address;
            $order->address_json = json_encode(["country" => $billing["country"],"state" => $billing["state"],"city" => $billing["city"],"pincode" => $billing["pincode"],"address" => $billing["address"]]);
            $order->subtotal = str_replace( ',', '', Cart::subtotal() );
            $order->coupon_discount = $coupon ? $coupon["discountAmount"] : 0;
            // $order->shipping_charge = 0;
            $order->amount_paid = $response['AMT'];
            $order->paypal_response = json_encode($response);
            $order->payment_status = strtoupper($response['ACK']);
            $order->save();
            foreach(Cart::content() as $item){
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item->id;
                $orderItem->user_id = auth()->user()->id;
                $orderItem->qty = $item->qty;
                $orderItem->listed_price = $item->price;
                $orderItem->save();
            }

            Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new Invoice($order));
            Cart::destroy();
            session()->forget("coupon");
            session()->forget("billing");
            session()->forget("checkout");
            return view("pages.order-success");
        }
  
        dd('Error occured!');
    }


   

}
