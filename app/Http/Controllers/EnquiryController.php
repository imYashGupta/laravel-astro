<?php

namespace App\Http\Controllers;

use App\Enquiry;
use App\Mail\EnquiryNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquiries= Enquiry::latest()->get();
        return view("admin.enquiries.enquiries",compact("enquiries"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator=Validator::make($request->all(),[
            "firstname" => ["required","string","max:64"],
            "lastname" => ["required","string","max:64"],
            "email" => ["required","email"],
            "subject" => ["required","max:64"],
            "message" => ["required","min:16"],
        ]);
        
        if ($validator->fails()) {
            return redirect("contact-us#form-show")
                        ->withErrors($validator)
                        ->withInput();
        }

        $enquiry =new Enquiry();
        $enquiry->firstname = $request->firstname;
        $enquiry->lastname = $request->lastname;
        $enquiry->email = $request->email;
        $enquiry->subject = $request->subject;
        $enquiry->message = $request->message;
        $enquiry->ip_address = $request->ip();
        $enquiry->save();
        Mail::to("admin963@mailinator.com")->send(new EnquiryNotification($enquiry));
        return redirect("contact-us#form-show")->with("success",true);
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $enquiry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $enquiry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $enquiry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $enquiry)
    {
        //
    }
}
