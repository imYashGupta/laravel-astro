<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketReply extends Model
{
    protected $appends = ["user"];

    public function getUserAttribute()
    {
        return User::withTrashed()->find($this->user_id);
    }
}
