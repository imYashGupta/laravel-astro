<?php

namespace App;

use App\User;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $appends= ["product","user","statusStr"];

    public function getNameAttribute()
    {
        if(is_null($this->attributes["name"])){
            return User::withTrashed()->find($this->user_id)->name;
        }else{
            return $this->attributes["name"];
        }
    }

    public function getEmailAttribute()
    {
        if(is_null($this->attributes["email"])){
            return User::withTrashed()->find($this->user_id)->email;
        }else{
            return $this->attributes["email"];
        }
    }

    public function getProductAttribute()
    {
        $product=Product::withTrashed()->where("id",$this->product_id)->first();
        return $product->only("id","name","thumbnailUrl","short_description","slug","deleted_at");
    }

    public function getUserAttribute()
    {
       if(!is_null($this->user_id)){
           return  User::withTrashed()->find($this->user_id)->only("name","email","deleted_at");
       } 
       else{
           return null;
       }
    }

    public function getStatusStrAttribute()
    {
        if(is_null($this->status)){
            return  ["status" => "Pending","class" => "info"];
        }
        if($this->status==1){
            return ["status" => "Approved","class" => "success"];
        }
        if($this->status==0){
            return ["status" => "Declined","class" => "danger"];
        }
    }
}
