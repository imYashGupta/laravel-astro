<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    public function getReplies()
    {
        $replies = TicketReply::where("ticket_id",$this->id)->latest()->get();
        return $replies;
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
