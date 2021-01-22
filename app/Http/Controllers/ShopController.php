<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    //

    public function shop(Request $request)
    {  
        $products=Product::where("availability",1);
        if($request->has("category")){
            $category=Category::where("slug",$request->category)->where("status",1)->first();
            if(is_null($category)){
                return abort(404);
            }
            $products=$products->where("category_id",$category->id);
        }
        if($request->has("min") AND $request->has("max")){
            $products->whereBetween('price',[sprintf("%.3f",$request->min),sprintf("%.3f",$request->max)]);
        }

        $categories = Category::where("status",1)->get();
        
        return view("pages.shop",["products" => $products->simplePaginate(9),"categories" => $categories]);
    }

    public function product(Request $request,$product_slug)
    {
          $product=Product::where("slug",$product_slug)->first();
        //   dd($product);
        if($product){
            return view("pages.product",["product" => $product]);
        }else{
            return abort(404);
        }
    }
 
}
