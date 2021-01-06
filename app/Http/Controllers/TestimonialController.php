<?php

namespace App\Http\Controllers;

use App\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::all();
        return view("admin.testimonial.testimonials",["testimonials" => $testimonials]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.testimonial.create",["testimonial" => false]);
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
            "name" => ["required"],
            "designation"   => ["required"],
            "description"   => ["required"],
            "image" => ["required","mimes:jpeg,jpg,png","max:1024"],
            "status" => ["required","in:0,1"]

        ]);

        $testimonial = new Testimonial();
        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        $testimonial->status = $request->status;

        $imageFile=$request->file("image");
        $image=\Intervention\Image\Facades\Image::make($imageFile->getRealPath());
        $image->resize(150,150);
        $imageName=Str::random(40).'.'.$imageFile->getClientOriginalExtension();
        Storage::disk('public')->put('testimonials/'.$imageName,(string) $image->encode()); //save thumbnail

        $testimonial->image=$imageName;
        $testimonial->save();
        return redirect()->route("testimonial.index")->with("success","Testimonial Created.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function show(Testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimonial $testimonial)
    {
        return view("admin.testimonial.create",["testimonial" => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimonial $testimonial)
    {
        $request->validate([
            "name" => ["required"],
            "designation"   => ["required"],
            "description"   => ["required"],
            "image" => ["mimes:jpeg,jpg,png","max:1024"],
            "status" => ["required","in:0,1"]
        ]);

        $testimonial->name = $request->name;
        $testimonial->designation = $request->designation;
        $testimonial->description = $request->description;
        $testimonial->status = $request->status;
        
        if($request->hasFile("image")){

            $imageFile=$request->file("image");
            $image=\Intervention\Image\Facades\Image::make($imageFile->getRealPath());
            $image->resize(150,150);
            $imageName=Str::random(40).'.'.$imageFile->getClientOriginalExtension();
            Storage::disk('public')->put('testimonials/'.$imageName,(string) $image->encode()); //save thumbnail
            Storage::disk('public')->delete('testimonials/'.$testimonial->image);
            $testimonial->image=$imageName;

        }
        $testimonial->update();
        return redirect()->route("testimonial.index")->with("success","Testimonial Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Testimonial  $testimonial
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimonial $testimonial)
    {
        Storage::disk('public')->delete('testimonials/'.$testimonial->image);
        $testimonial->delete();
        return redirect()->back()->with("success","testimonial Deleted.");

    }
}
