<?php

namespace App\Http\Controllers;

use App\Newsletter;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class NewsletterController extends Controller
{
    public function unsubcribe($email)
    {
        $email=Newsletter::where("email",$email)->firstOrFail();
        $email->delete();
        return view("pages.message",["title" => "Newsletter Unsubscribe","message" => "You will now no longer receive any promotional and news related message/email."]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers=Newsletter::latest()->get();
        $allEmails=$subscribers->map(function($sub){
            $emails = "";
             $emails .= $sub->email; 
             return $emails;
        });

        $emailsStr= implode(",",$allEmails->toArray());
        return view("admin.newsletter-subscriber",compact("subscribers","emailsStr"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "email" => ["required","email"]
        ]);

        $newsletter=Newsletter::create([
            "email" => $request->email,
            "ip_address" => $request->ip()
        ]);
        /* Notification::create([
            "type" => "Newsletter",
            "data"  => $newsletter->id,
            "message" => "New Subscriber",
        ]); */
        return redirect()->back()->with("newsletter",true);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return redirect()->back()->with("success","Subscriber Email Deleted.");
    }
}
