<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public function add(Request $request)
    {   
        $product=Product::find($request->product);
        // return $product;
        if($product){
            if($product->availability AND $product->units > $request->qty){
                $text="Product added to cart";
                
                $alreadyInCart=Cart::content()->where("id",$product->id)->first();
                if($alreadyInCart){
                    if(!is_null($product->max_qty) && $product->max_qty < $alreadyInCart->qty+$request->qty){                        
                        return $request->wantsJson() 
                            ? response()->json(["status" => "error","cart" => Cart::content(),"message" => "Can't add anymore item.","total" => Cart::subtotal()])
                            : redirect()->route("product",$product->slug)->with(["status" => "error","cart" => Cart::content(),"message" => "Can't add anymore item.","total" => Cart::subtotal()]);
                    }
                }
                Cart::add(["id" => $product->id,"name" => $product->name,"qty" => $request->qty,"price" => $product->price,"options" => ["thumbnailUrl" => $product->thumbnailUrl]]);
               
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

}
