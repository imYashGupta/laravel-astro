<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.review-management.reviews",["reviews" => Review::all()]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        return view("admin.review-management.edit",["review" => $review]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        $request->validate([
            "review" => ["required"],
            "rating" => ["required","integer","in:1,2,3,4,5"],
            "status" => ["required","boolean"],
            "email" => ["required","email"],
            "name"  => ["required"]
        ]);

        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->status = $request->status;
        $review->email = $request->email;
        $review->name = $request->name;
        $review->update();
        return redirect()->route("review.index")->with("success","Review Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return redirect()->back()->with("success","review Deleted.");
    }

    public function action(Review $review,Request $request)
    {
        $validator=Validator::make($request->all(),[
            "action" => "required|in:approve,decline"
        ]);
        
        if($validator->fails()){
            return view("admin.error",["code" => 400,"message" => "Bad request!"]);
        }

        $review->status = $request->action=='approve' ? 1 : 0 ; 
        $review->save();
        return redirect()->route("review.index")->with("success","Review Status Changed.");

    }
}
