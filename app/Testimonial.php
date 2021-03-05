<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $appends = ["imageUrl"];

    public function getImageUrlAttribute()
    {
        return Storage::disk('s3')->url("testimonials/".$this->image);
    }
}
