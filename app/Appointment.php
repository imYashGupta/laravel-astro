<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Appointment extends Model
{
    protected $fillable = ["name","email","phone","gender","country","state","city","pincode","ip_address"];

    public function country($id)
    {
        $country=DB::table("countries")->where("id",$id)->first();
        if($country){
            return $country->name;
        }
        return null;
    }

    
    public function state($id)
    {
        $state=DB::table("states")->where("id",$id)->first();
        if($state){
            return $state->name;
        }
        return null;
    }

    
    public function city($id)
    {
        $city=DB::table("cities")->where("id",$id)->first();
        if($city){
            return $city->name;
        }
        return null;
    }
}
