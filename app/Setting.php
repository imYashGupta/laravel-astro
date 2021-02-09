<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ["value","options"];

    public static function get($attr)
    {
        return Setting::where("name",$attr)->first()->value;
    }

    public static function admin($attr)
    {
        return User::find(1)->$attr;
    }
}
