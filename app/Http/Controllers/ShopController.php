<?php

namespace App\Http\Controllers;

use App\Review;
use App\Product;
use App\Category;
use App\Notification;
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
        $product=Product::where("slug",$product_slug)->firstOrFail();

        $relatedProducts=Product::where("id","!=",$product->id)->where("category_id",$product->category_id)->inRandomOrder()->limit(6)->get();
        if($relatedProducts->count() < 4){
            $moreRelatedProducts=Product::where("id","!=",$product->id)->inRandomOrder()->limit(6-$relatedProducts->count())->get();
            $similarProducts=$relatedProducts->merge($moreRelatedProducts);
        }else{
            $similarProducts = $relatedProducts;
        }

        if($product){
            $reviews=Review::where("product_id",$product->id)->where("status",1)->get();
            $collection=$reviews->map(function ($review) {
                $collect["id"] = $review->id;
                $collect["name"] = $review->name;
                $collect["review"] = $review->review;
                $collect["rating"] = $review->rating;
                $collect["created_at"] = $review->created_at->format('M d,Y');
                return $collect;
            });

            return view("pages.product",["product" => $product,"reviews" => $collection,"relatedProducts" => $similarProducts]);
        }else{
            return abort(404);
        }
    }

    public function addReview(Request $request,$product_slug)
    {
        $request->validate([
            "name" => "sometimes|required|min:3",
            "email" => "sometimes|required|email",
            "review" => "required|min:15",
            "rating" => "required|between:1,2,3,4,5",
        ]);
        $product=Product::where("slug",$product_slug)->first();
        $email = auth()->check() ? auth()->user()->email : $request->email;
        $alreadyReviewed=Review::where("product_id",$product->id)->where("email",$email)->first();
        if(!is_null($alreadyReviewed)){

            $message = $alreadyReviewed->status==1 ? "Your review is already been added." : "Your review is awaiting approval.";
            return response()->json(["message" => $message],200);
        }
        $review = new Review();
        $review->user_id  = auth()->check() ? auth()->user()->id : NULL;
        $review->email = $email;
        $review->name = auth()->check() ? auth()->user()->name : $request->name;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->product_id = $product->id;
        $review->save();
        Notification::create([
            "type" => "Review",
            "data"  => $review->id,
            "title" => "New Review For Product",
            "message" => $review->name. " leaves a review for $product->name product",
        ]);
        return response()->json(["message" => "Your review is awaiting approval."],201);

    }

}
