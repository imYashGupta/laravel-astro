<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function validation($request,$isUpdate)
    {   
        $validation = $isUpdate ? "required|min:3|unique:coupons,code,".$isUpdate : "required|min:3|unique:coupons";
        $request->validate([
            "code" => $validation,
            "description" => "required",
            "type" => "required|in:fixed,percentage",
            "discount" => "required|integer",
            "expire_date" => "required|date",
            "min_amount" => "required|integer",
            "coupon_limit" => "nullable|integer",
            "user_limit" => "nullable|integer",
        ],[
            "code.unique" => "Coupon code already exists."
        ]);

        if($request->type=='percentage' AND $request->discount > 99){
            return redirect()->back()->withErrors(["discount" => "Discount can not be more then 99%"])->withInput();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coupons=Coupon::latest()->get();
        return view("admin.coupon.coupons",["coupons" => $coupons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.coupon.create-coupon",["coupon" => false]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation($request,false);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->description = $request->description;
        $coupon->type = $request->type;
        $coupon->discount = $request->discount;
        $coupon->expire_date = $request->expire_date;
        $coupon->minimum_amount = $request->min_amount;
        $coupon->coupon_limit = $request->coupon_limit;
        $coupon->user_limit = $request->user_limit;
        $coupon->save();
        return redirect()->route('coupon.index')->with("success","Coupon Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function edit(Coupon $coupon)
    {
        return view("admin.coupon.create-coupon",["coupon" => $coupon]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        $this->validation($request,$coupon->id);
        $coupon->code = $request->code;
        $coupon->description = $request->description;
        $coupon->type = $request->type;
        $coupon->discount = $request->discount;
        $coupon->expire_date = $request->expire_date;
        $coupon->minimum_amount = $request->min_amount;
        $coupon->coupon_limit = $request->coupon_limit;
        $coupon->user_limit = $request->user_limit;
        $coupon->update();

        return redirect()->route('coupon.index')->with("success","Coupon Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Coupon  $coupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();
        return redirect()->back()->with("success","Coupon Deleted.");
    }
}
