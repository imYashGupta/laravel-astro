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

    protected $appends = ["thumbnailUrl","category","images","rating","actualprice"];
    public function getThumbnailUrlAttribute()
    {
        return Storage::disk('s3')->url("products/thumbnails/".$this->thumbnail);
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
            $image->url =  Storage::disk('s3')->url("products/".$image->name);
        });

        /* $thumb = collect([
            "id" => "1a",
            "name" => $this->thumbnail,
            "product_id" => $this->id,
            "url" => Storage::disk('s3')->url("products/" . $this->thumbnail)
        ]);

        $collection->prepend($thumb); */
        return $collection;

    }

    //for 100x100 size
    public function getThumbnailsAttribute()
    {
        $collection=DB::table("product_images")->where("product_id",$this->id)->get();
        $collection->map(function($image ){
            $image->url =  Storage::disk('s3')->url("products/thumbnails/".$image->name);
        });
        return $collection;
    }

    public function thumbnailOrignal()
    {
        return Storage::disk('s3')->url("products/".$this->thumbnail);

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

    public function getPriceAttribute($price)
    {
            return $price - $this->discount;
    }

    public function getActualPriceAttribute()
    {
        return $this->price+$this->discount;
    }


}
