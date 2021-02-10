<?php

namespace App;

use App\OrderItem;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $appends = ["name","user","items","status_data","coupon"];

    public function getNameAttribute()
    {
        $billingDetails= json_decode($this->billing_details,true);
        return $billingDetails["firstname"]." ".$billingDetails["lastname"];
    }

    public function getBilling($attr)
    {
        $billingDetails= json_decode($this->billing_details,true);
        return $billingDetails[$attr];
    }
    //
   
    public function paypalData($attr)
    {
        $data=json_decode($this->paypal_response,true)[$attr];
        if($data){
            return $data;
        }
        return "";
    }

    public function getCouponAttribute()
    {
        if(!is_null($this->coupon_id)){
            $coupon=Coupon::withTrashed()->find($this->coupon_id);
            return $coupon;
        }
        return null;
    }

    public function getUserAttribute()
    {
        return User::withTrashed()->where("id",$this->user_id)->first();
    }

    public function getItemsAttribute()
    {
        return OrderItem::where("order_id",$this->id)->get();
    }

    public function getStatusDataAttribute()
    {
    

        switch($this->status){
            case "0":
                return ["text" => "Rejected","class" => "danger"];
                break;
            case "1":
                return ["text" => "Awaiting Confimation","class" => "warning"];
                break;
            case "2":
                return ["text" => "Confirmed","class" => "primary"];
                break;
            case "3":
                return ["text" => "In Processing","class" => "info"];
                break;
            case "4":
              return ["text" => "Completed","class" => "success"];
                break;
            case "5":
                return ["text" => "Returned","class" => "dark"];
                break;
            case "6":
                return ["text" => "Cancelled","class" => "danger"];
                break;
            default:
                break;

             
        }
    }
}
