<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function redirect(Request $request,Notification $notification)
    {

        $notification->seen = 1;
        $notification->save();
        return redirect($notification->info["url"]);
    }

    public function notifications()
    {
        $notifications=Notification::latest()->simplePaginate(50);
        $unseen=Notification::whereNull("seen")->get();
        return view("admin.notifications",["notifications" => $notifications,"unseen" => $unseen]);
    }
}
