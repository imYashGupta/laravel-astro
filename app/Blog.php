<?php

namespace App;

use App\BlogCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Blog extends Model
{
    //
    protected $appends = ["thumbnailUrl","category"];
    public function getThumbnailUrlAttribute()
    {
        return Storage::disk('public')->url("blogs/thumbnails/".$this->thumbnail);
    }

    public function getCategoryAttribute()
    {
        $category= BlogCategory::find($this->category_id);
        if($category){
            return $category->name;
        }else{
            return "Uncategorized";
        }
    }
}
