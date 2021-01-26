<?php

namespace App;

use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{

    use SoftDeletes;

    protected $appends = ["thumbnailUrl","category","images","rating"];
    public function getThumbnailUrlAttribute()
    {
        return Storage::disk('public')->url("products/thumbnails/".$this->thumbnail);
    }


    public function getCategoryAttribute()
    {
        $category= Category::find($this->category_id);
        if($category){
            return $category->name;
        }else{
            return "Uncategorized";
        }
    }

    

    public function getImagesAttribute()
    {
        $collection=DB::table("product_images")->where("product_id",$this->id)->get();
        $collection->map(function($image ){
            $image->url =  Storage::disk('public')->url("products/".$image->name);
        });
        return $collection;
    }

    //for 100x100 size
    public function getThumbnailsAttribute()
    {
        $collection=DB::table("product_images")->where("product_id",$this->id)->get();
        $collection->map(function($image ){
            $image->url =  Storage::disk('public')->url("products/thumbnails/".$image->name);
        });
        return $collection;
    }

    public function getRatingAttribute()
    {
        $reviews=Review::where("product_id",$this->id)->get();
        $total = 0;
        foreach($reviews as $review){
            $total = $total + $review->rating;
        }
        if($reviews->count() > 0){
            return ceil($total/$reviews->count());
        }else{
            return NULL;
        }
    }
}
