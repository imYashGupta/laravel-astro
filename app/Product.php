<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $appends = ["thumbnailUrl","category","images"];
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
}
