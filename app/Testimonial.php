<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Testimonial extends Model
{
    protected $appends = ["imageUrl"];

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url("testimonials/".$this->image);
    }
}
