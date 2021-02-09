<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = ["Name","displayPictureUrl","city_str","state_str","country_str"];

    public function getNameAttribute()
    {
        return $this->firstname.' '.$this->lastname;
    }

    public function getdisplayPictureUrlAttribute()
    {
        if(is_null($this->display_image)){
            return asset('assets/images/placeholder/profile-placeholder.png');
        }else{
            return Storage::disk('public')->url('users/'.$this->display_image);
        }
    }

    public function getCityStrAttribute()
    {
        $city= DB::table("cities")->where("id",$this->city)->first();
        if($city){
            return $city->name;
        }
        return null;
    }

    public function getStateStrAttribute()
    {
        $state= DB::table("states")->where("id",$this->state)->first();
        if($state){
            return $state->name;
        }
        return null;
    }

    public function getCountryStrAttribute()
    {
        $country= DB::table("countries")->where("id",$this->country)->first();
        if($country){
            return $country->name;
        }
        return null;
    }

    public function tickets()
    {
       return $this->hasMany(Ticket::class);
    }
}
