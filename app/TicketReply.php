<?php

namespace App;

use cebe\markdown\Markdown;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class TicketReply extends Model
{
    protected $appends = ["user"];

    public function getUserAttribute()
    {
        return User::withTrashed()->find($this->user_id);
    }

    public function getAttachments()
    {
        $files = json_decode($this->files,true);
        return $files;
    }

    public function getAttachmentUrl($file)
    {
        return Storage::disk('public')->url('attachments/'.$file);
    }
    public function markdown()
    {
        $parser = new \cebe\markdown\Markdown();
        return $parser->parse($this->message);

    }
}
