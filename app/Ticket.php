<?php

namespace App;

use cebe\markdown\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Ticket extends Model
{
    public function getReplies()
    {
        $replies = TicketReply::where("ticket_id",$this->id)->get();
        return $replies;
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function getAttachments()
    {
        $files = json_decode($this->files,true);
        return $files;
    }

    public function getAttachmentUrl($file)
    {
        return Storage::disk('s3')->url('attachments/'.$file);
    }

    public function markdown()
    {
        $parser = new \cebe\markdown\Markdown();
        return $parser->parse($this->message);

    }
}
