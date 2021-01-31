<?php

namespace App\Http\Controllers;

use App\Faq;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FaqController extends Controller
{

    public $faqs;

    public function __construct() {
        $this->faqs = Faq::all();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.page-management.faq.create",["faq" => false,"faqs" => $this->faqs]);
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
            "question" => "required",
            "answer" => "required",
            "status" => "required|in:0,1"
        ]);

        $faq=new Faq();
        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->save();
        return redirect()->route("faq.create")->with("success","Faq Created.");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function show(Faq $faq)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function edit(Faq $faq)
    {   
        return view("admin.page-management.faq.create",["faq" => $faq,"faqs" => $this->faqs]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            "question" => "required",
            "answer" => "required",
            "status" => "required|in:0,1"

        ]);

        $faq->question = $request->question;
        $faq->answer = $request->answer;
        $faq->status = $request->status;
        $faq->update();
        return redirect()->route("faq.create")->with("success","Faq Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faq  $faq
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route("faq.create")->with("success","FAQ Deleted.");
    }
}
