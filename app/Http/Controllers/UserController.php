<?php

namespace App\Http\Controllers;

use App\Mail\NotifyNewUser;
use App\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->get();
        return view("admin.user-management.manage-user",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.user-management.create-user",["user" => false]);
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
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['nullable','regex:/(^[0-9 ]+$)+/'],
            'profile_image' => ['mimes:jpeg,jpg,png','max:1024']
        ]);

        $user = new User();
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        if($request->hasFile("profile_image")){
            $profileImage = $request->file("profile_image");
            $profileImageName = Str::random(40).'.'.$profileImage->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('users',$profileImage,$profileImageName);  
            $user->display_image = $profileImageName;
        }
        if($request->has("is_notify")){
            Mail::to($user)->send(new NotifyNewUser($request));
        }
        $user->save();
        $user->markEmailAsVerified();
        return redirect()->route("users.index")->with("success","User Created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $user= User::find($id);
        return view("admin.user-management.create-user",["user" => $user,"edit" => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ["sometimes","required","min:8"],
            "phone" => ["nullable","regex:/(^[0-9 ]+$)+/"],
            "status" => "required|in:0,1",
        ]);

        $user = User::find($id);
        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->email = $request->email;
        if($request->has("password")){
            $user->password = Hash::make($request->password);
        }
        if($request->has("phone")){
            $user->phone = $request->phone;
        }
        $user->country = $request->country;
        $user->state = $request->state;
        $user->city = $request->city;
        $user->address = $request->address;
        $user->pincode = $request->pincode;
        $user->status = $request->status;
        if($request->hasFile("profile_image")){
            $profileImage = $request->file("profile_image");
            $profileImageName = Str::random(40).'.'.$profileImage->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('users',$profileImage,$profileImageName);  
            $user->display_image = $profileImageName;
        }
        $user->update();
        return redirect()->route("users.index")->with("success","User Updated.");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route("users.index")->with("success","User Deleted.");
    }
}
