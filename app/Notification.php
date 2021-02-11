<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ["type","data","title","message","seen","url"];
    protected $appends = ["info"];

    public function getInfoAttribute()
    {
        switch ($this->type) {
            case 'Enquiry':
                return [
                    "icon" => "mdi-email",
                    "bg" => "bg-warning",
                    "url" => route("enquiries.index")
                ];
                break;
            case 'Order':
                return [
                    "icon" => "mdi-cart-outline",
                    "bg" => "bg-success",
                    "url" => route("order.show",$this->data)
                ];
                break;
            case 'Review':
                return [
                    "icon" => "mdi-star-half",
                    "bg" => "bg-info",
                    "url" => route("review.index")
                ];
                break;
            case 'Appointment':
                return [
                    "icon" => "mdi-account-box-outline",
                    "bg" => "bg-pink",
                    "url" => route("appointments.index")
                ];
                break;
            default:
                return [
                    "icon" => "mdi-message",
                    "bg" => "bg-dark",
                    "url" => "#"
                ];
                break;
        }
    }
}
