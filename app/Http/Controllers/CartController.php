<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function cart()
    {   
        $coupon = false;
        if(session()->has("coupon")){
             $coupon = session()->get("coupon");
        }
 
        return view("pages.cart",["cart" => ["items" => Cart::content(),"subtotal" =>  Cart::subtotal()],"coupon" => $coupon]);
    }

    public function add(Request $request)
    {   
        session()->forget("coupon");
        $product=Product::find($request->product);
        // return $product;
        if($product){
            if($product->availability ){
                $text="Product added to cart";
                
                $alreadyInCart=Cart::content()->where("id",$product->id)->first();
                if($alreadyInCart){
                    if(!is_null($product->max_qty) && $product->max_qty < $alreadyInCart->qty+$request->qty){                        
                        return $request->wantsJson() 
                            ? response()->json(["status" => "error","cart" => Cart::content(),"message" => "Can't add anymore item.","total" => Cart::subtotal()])
                            : redirect()->route("product",$product->slug)->with(["status" => "error","cart" => Cart::content(),"message" => "Can't add anymore item.","total" => Cart::subtotal()]);
                    }
                }
                Cart::add(["id" => $product->id,"name" => $product->name,"qty" => $request->qty,"price" => $product->price,"options" => ["thumbnailUrl" => $product->thumbnailUrl,"url" => URL::asset("")."$product->slug","min_qty" => $product->min_qty,"max_qty" => $product->max_qty]]);
               
                return $request->wantsJson()
                    ? response()->json(["status" => "success","cart" => Cart::content(),"message" => $text,"total" => Cart::subtotal()])
                    : redirect()->route("product",$product->slug)->with(["status" => "success","cart" => Cart::content(),"message" => $text,"total" => Cart::subtotal()]);

            }else{
                return $request->wantsJson() 
                    ? response()->json(["status" => "error","cart" => Cart::content(),"message" => "Something went wrong!","total" => Cart::subtotal()])
                    : redirect()->route("product",$product->slug)->with(["status" => "error","cart" => Cart::content(),"message" => "Something went wrong!","total" => Cart::subtotal()]);
            }
        }
       
    }

    public function remove(Request $request,$rowId)
    {   
        session()->forget("coupon");
        Cart::remove($rowId);
        /* if(session()->has("coupon")){
            if(session()->get("coupon")->minimum_amount >= Cart::total()){
                session()->forget("coupon");
            }
        } */
        if($request->wantsJson()){
            return response()->json(["status" => "success","cart" => Cart::content(),"message" => "Item removed from cart.","total" => Cart::subtotal()]);
        }
        else{
            return redirect()->back();
        }
    }

    public function update(Request $request)
    {
        session()->forget("coupon");
        Cart::update($request->rowId,["qty" => $request->qty]);
        return response()->json(["cart" => Cart::content(),"total" => Cart::subtotal()]);
    }

    public function coupon(Request $request)
    {
        // return $request->all();
        $request->validate([
            "code" => "required"
        ]);
        session()->forget("coupon");
        $coupon=Coupon::where("code",$request->code)->first();
        if(!is_null($coupon)){
            if(strtotime($coupon->expire_date) > strtotime(date("Y-m-d"))){
                // return (str_replace( ',', '', Cart::subtotal() ) >= $coupon->minimum_amount) ? "true" :str_replace( ',', '', Cart::subtotal() );
                if(str_replace( ',', '', Cart::subtotal() ) <= $coupon->minimum_amount){
                    return response()->json(["error"=>true,"message" => "Minimum Amount for this coupon is $".$coupon->minimum_amount.""],200);
                }
                $couponUserLogs=DB::table("coupon_redeems")->where("user_id",auth()->user()->id)->where("coupon_id",$coupon->id)->get();
                $couponLogs=DB::table("coupon_redeems")->where("coupon_id",$coupon->id)->get();  
                $UserlogsCount= $couponUserLogs->count();
                $logsCount= $couponLogs->count();
                if($UserlogsCount >= $coupon->user_limit){
                    return response()->json(["message" => "you have already use this coupon","error" => true]);
                }
                if($logsCount >= $coupon->coupon_limit){
                    return response()->json(["message" => "Coupon code is invalid or expired.","error" => true],200);
                }
                // calculating Discount
                    if($coupon->type=='percentage'){
                        $discount = ($coupon->discount/100) * str_replace( ',', '', Cart::subtotal() );
                        $coupon->message = "Coupon Applied.";
                    }else{
                        $discount = str_replace( ',', '', Cart::subtotal() ) - $coupon->discount;
                        $coupon->message = "Coupon Applied.";
                    }
                    $coupon->discountAmount = $discount;
                    $coupon->subtotal = number_format($discount,2,'.',',');
                    $coupon->discountAmount_str = number_format(str_replace( ',', '', Cart::subtotal() )- $discount,2,'.',',');
                session()->put("coupon",$coupon);
                return response()->json(["success" => true,"message" => "Coupon Applied.","coupon" => $coupon->code,"subtotal" =>  $coupon->subtotal,"discount" => $coupon->discountAmount_str]);
            }
            /* else{
                return response()->json(["message" => ""]);
            } */


        }
        
        return response()->json(["message" => "Coupon code is invalid or expired.","error" => true],200);


    }
 

}
