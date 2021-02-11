<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Notification;
use Illuminate\Http\Request;
use App\Mail\AppointmentUser;
use App\Mail\AppointmentAdmin;
use Illuminate\Support\Facades\Mail;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments=Appointment::latest()->get();
        return view("admin.appointments.appointments",["appointments" => $appointments]);
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
            "name" => ["required","min:3"],
            "email" => ["required","email"],
            "phone" => ["required","regex:/(^[0-9 ]+$)+/"],
            "gender" => ["required","in:male,female"],
            "country" => ["required"],
            "state" => ["required"],
            "city" => ["required"],
            "pincode" => ["required"],
        ]);

        $appointment=Appointment::create([
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "gender" => $request->gender,
            "country" => $request->country,
            "state" => $request->state,
            "city" => $request->city,
            "pincode" => $request->pincode,
            "ip_address" => $request->ip(),
        ]);
        Mail::to($appointment->email,$appointment->name)->queue(new AppointmentUser($appointment));
        Mail::to(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new AppointmentAdmin($appointment));
        Notification::create([
            "type" => "Appointment",
            "data"  => $appointment->id,
            "title" => "New appointment request",
            "message" => $appointment->name." submited a appointment request",
        ]);
        return redirect()->route("appointment.submit",encrypt($appointment->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->back()->with("success","Appointment request deleted.");

    }
}
