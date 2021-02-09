<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        return view("pages.user.dashboard");
    }

    public function profile()
    {
        return view("pages.user.profile");
    }

    public function profileEdit()
    {
        $countries=DB::table("countries")->get();
        return view("pages.user.profile-edit",["countries" => $countries]);
    }

    public function updateBasicInfo(Request $request)
    {
        $request->validate([
            "firstname" => ["required","min:3","max:64"],
            "lastname" => ["required","min:3","max:64"],
            "phone" => ["required","regex:/(^[0-9 ]+$)+/"],
        ]);

        $user=User::find(auth()->user()->id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->phone = $request->phone;
        $user->update();
        return redirect()->route("user.profile")->with("success","Basic info updated.");
    }

    public function updateAddress(Request $request)
    {
        $request->validate([
            "city" => "required",
            "state" => "required",
            "country"   => "required",
            "address" => "required",
            "pincode"   => "required"
        ]);
        
        $user=User::find(auth()->user()->id);
        $user->city = $request->city;
        $user->state = $request->state;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->update();
        return redirect()->route("user.profile")->with("success","Address info updated.");
    }

    public function password()
    {
        return view("pages.user.password-update");

    }

    public function updatePassword(Request $request)
    {   
        $request->validate([
            "password" => ["required","min:8","confirmed"],
        ]);

        $user=User::find(auth()->user()->id);
        $user->password = Hash::make($request->password);
        $user->update();
        return redirect()->route("user.profile")->with("success","Password updated.");
    }

    public function orders()
    {
        $orders=Order::where("user_id",auth()->user()->id)->latest()->get();
        return view("pages.user.orders",["orders" => $orders]);
    }

    public function order(Request $request,$order)
    {
        $order=Order::where("user_id",auth()->user()->id)->where("id",$order)->first();
        return view("pages.user.order",["order" => $order]);

    }
}
