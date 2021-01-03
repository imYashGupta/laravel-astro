<?php

namespace App\Http\Controllers;

use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.shipping-management.shippings",["shippings" => Shipping::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.shipping-management.create-shipping",["shipping" => false]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "pincode"   => ["required","unique:shippings"],
            "amount"    => ["sometimes","required","numeric"],
        ],["pincode.unique" => "The pincode has already been added."]);

       /*  $isPincodeExists=Shipping::where("pincode",$request->pincode)->exists();
        if($isPincodeExists){
            return redirect()->back()->withErrors([
                "pincode" => ""
            ])
        } */
        
        $shipping = new Shipping();
        $shipping->city = $request->city;
        $shipping->state = $request->state;
        $shipping->pincode = $request->pincode;
        $shipping->amount = $request->amount;
        $shipping->save();
        
        
        return redirect()->back()->with("success","Shipping Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view("admin.shipping-management.create-shipping",["shipping" => $shipping]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        $request->validate([
            "pincode"   => ["required"],
            "amount"    => ["sometimes","required","numeric"],
        ]);
        $shipping->city = $request->city;
        $shipping->state = $request->state;
        $shipping->pincode = $request->pincode;
        $shipping->amount = $request->amount;
        $shipping->update();
        return redirect()->back()->with("success","Shipping Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        $shipping->delete();
        return redirect()->back()->with("success","Shipping Deleted.");
    }
}
