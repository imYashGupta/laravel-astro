<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    //

    public function product($attribute)
    {
        $product=Product::withTrashed()->find($this->product_id);
        return $product->$attribute;
    }
}
