<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\TicketReply;
use App\Notification;
use App\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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
        return view("pages.user.tickets",["tickets" => $tickets]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $orders = Order::where("user_id",auth()->user()->id)->get();
        return view("pages.user.create-ticket",["orders" => $orders]);
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
            "subject" => ["required"],
            "message"   => ["required"],
            "urgency"   => ["required","in:High,Medium,Low"],
            "attachments.*" => ["mimes:jpg,jpeg,png,gif","max:5000"]
        ],[
            "attachments.*.mimes" => "attachments must be a file of type: jpg, jpeg, png, gif.",
            "attachments.*.max" => "attachments must not be more then 4MB.",
        ]);

        $ticket = new Ticket();
        $ticket->user_id = auth()->user()->id;
        $ticket->name = auth()->user()->name;
        $ticket->email = auth()->user()->email;
        $ticket->subject = $request->subject;
        $ticket->service = $request->service;
        $ticket->priority = $request->urgency;
        $ticket->message = $request->message;
        $ticket->status = 1;

        $attachments = [];
        if($request->has("attachments")){
            foreach ($request->file("attachments") as $attachment) {
                $attachmentName = Str::random(40).'.'.$attachment->getClientOriginalExtension();
                Storage::disk('s3')->putFileAs('attachments',$attachment,$attachmentName);
                array_push($attachments,$attachmentName);
            }
        }
        $ticket->files = json_encode($attachments);
        $ticket->save();

        Notification::create([
            "type" => "Ticket",
            "data"  => $ticket->id,
            "title" => "Support ticket created",
            "message" => "New ticket #$ticket->id genrated by user ".$ticket->name,
        ]);
        return redirect()->route("tickets.index")->with("success","Ticket Created.");
    }


    public function storeReply(Request $request,Ticket $ticket)
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
                Storage::disk('s3')->putFileAs('attachments',$attachment,$attachmentName);
                array_push($attachments,$attachmentName);
            }
        }
        $reply->files = json_encode($attachments);
        $reply->ip_address	 = $request->ip();
        $reply->save();
        $ticket->status = 1;
        $ticket->save();

        Notification::create([
            "type" => "Ticket",
            "data"  => $ticket->id,
            "title" => "Update on Ticket #$reply->ticket_id",
            "message" => $reply->name. "replied to Ticket #".$reply->id,
        ]);

        return redirect()->route("tickets.index")->with("success","Reply added.");
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view("pages.user.ticket-show",["ticket" => $ticket]);
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
