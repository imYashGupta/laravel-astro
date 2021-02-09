<?php

namespace App\Http\Controllers\Admin;

use App\Ticket;
use App\TicketReply;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets=Ticket::where("user_id",auth()->user()->id)->latest()->get();
        return view("admin.support.tickets",["tickets" => $tickets]);
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
    
    public function store(Request $request,Ticket $ticket)
    {
        $request->validate([
            "message"   => ["required"],
            "attachments.*" => ["mimes:jpg,jpeg,png,gif","max:5000"]
        ],[
            "attachments.*.mimes" => "attachments must be a file of type: jpg, jpeg, png, gif.",
            "attachments.*.max" => "attachments must not be more then 4MB.",
        ]);
        
        $reply =new TicketReply();
        $reply->ticket_id = $ticket->id;
        $reply->user_id = auth()->user()->id;
        $reply->reply_by = auth()->user()->name;
        $reply->message = $request->message;
        $attachments = [];
        if($request->has("attachments")){
            foreach ($request->file("attachments") as $attachment) {
                $attachmentName = Str::random(40).'.'.$attachment->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('attachments',$attachment,$attachmentName);  
                array_push($attachments,$attachmentName);
            }
        }
        $reply->files = json_encode($attachments);
        $reply->ip_address	 = $request->ip();
        $reply->save();
        if($request->has("close")){
            $ticket->status = 0;
            $ticket->update();
        }else{
            $ticket->status = 1;
            $ticket->update();
        }

        return redirect()->route("support-tickets.index")->with("success","Ticket Updated.");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {   
        return view("admin.support.view",["ticket" => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
