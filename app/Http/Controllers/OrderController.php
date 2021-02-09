<?php

namespace App\Http\Controllers;

use App\Mail\Invoice;
use App\Mail\OrderCancelled;
use App\Mail\OrderComplete;
use App\Mail\OrderConfirmed;
use App\Mail\OrderInProcess;
use App\Mail\OrderRejected;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=Order::latest()->get();

        return view("admin.order-management.orders",["orders" => $orders]);
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
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view("admin.order-management.view",["order" => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order->status = $request->status;
        if(!$request->has("no_email")){
            switch ($request->status) {
                case 0:
                    //rejected
                    Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new OrderRejected($order));
                    break;
                case 1:
                    //awaiting,send invoice
                    Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new Invoice($order));
                    break;
                case 2:
                    //confirmed
                    Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new OrderConfirmed($order));
                    break;
                case 3:
                    //in process
                    Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new OrderInProcess($order));
                    break;
                case 4:
                    //complete
                    Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new OrderComplete($order));
                    break;
                case 5:
                    //return
                    //DO nothing
                    break;
                case 6:
                    //cancelled
                    //Mail::to($order->billing_email,$order->name)->bcc(env("ADMIN_EMAIL"),env("APP_NAME"))->queue(new OrderCancelled($order));
                    break;
                default:
                     
                    break;
            }
        }
        return redirect()->back()->with("success","Order status changed.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
