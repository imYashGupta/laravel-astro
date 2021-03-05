<?php

namespace App\Http\Controllers;

use App\User;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $sales = Order::sum("subtotal");
        $income = Order::sum("amount_paid");
        $latestOrders = Order::latest()->limit(5)->get();
        $newUsers = User::latest()->limit(5)->get();
        return view("admin.index", compact("sales", "income", "latestOrders", "newUsers"));
    }


    public function error(Request $request)
    {
        // return view("admin.error",["code" => ])
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        return view($id);
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lockedScreen()
    {
        if (session()->has("locked")) {
            return view("admin.lock-screen", ["user" => session()->get("locked")]);
        } else {
            $user = auth()->user();
            session(['locked' => $user]);
            Auth::logout();
            return view("admin.lock-screen", ["user" => $user]);
        }
    }
}
