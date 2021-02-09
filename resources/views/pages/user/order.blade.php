@extends('layouts.user')
@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="main-center-data">
        <h3 class="display-username mb-4">Order</h3>
        <div class="card m-b-20">
                                        <div class="card-body">
                                          
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="invoice-title">
                                                        <h4 class="pull-right font-16"><strong>Order #{{$order->id}}</strong></h4>
                                                        <!-- <span class="badge badge-{{$order->status_data["class"]}} hide-print text-uppercase">{{$order->status_data["text"]}}</span> -->
                                                        <h3 class="m-t-0 ">
                                                            {{-- <img src="{{ URL::asset('src/images/header/pathway_logo.png') }}" alt="logo" height="50"/> --}}
                                                            {{$appData["name"]}}
                                                            <a href="" @click.prevent  data-toggle="modal" data-target="#ConfirmationModal" class="d-print-none text-dark"><i class="mdi mdi-pencil"></i></a>

                                                           
                                                        </h3>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <address>
                                                                <strong>Billed To:</strong><br>
                                                                {{ $order->name }}<br>
                                                                {{ $order->getBilling("address") }}<br>
                                                                {{$order->getBilling("city").",".$order->getBilling("state")}}<br>
                                                                {{ $order->getBilling("country").','.$order->getBilling("pincode") }}
                                                            </address>
                                                          
                                                        </div>
                                                        <div class="col-6 m-t-30 text-right">
                                                            <address>
                                                                <strong>Order Date:</strong><br>
                                                               {{ $order->created_at->format("F d,Y") }}<br><br>
                                                            </address>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 m-t-30">
                                                            <address>
                                                                <strong>Contact Details:</strong><br>
                                                                Name: {{ $order->name }}<br>
                                                                Email: {{ $order->getBilling("email") }}<br>
                                                                Phone: {{$order->getBilling("phone")}}<br>
                                                            </address>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="panel panel-default">
                                                        <div class="p-2">
                                                            <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                                        </div>
                                                        <div class="">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead>
                                                                    <tr>
                                                                        <td><strong>Item</strong></td>
                                                                        <td class="text-center"><strong>Price</strong></td>
                                                                        <td class="text-center"><strong>Quantity</strong>
                                                                        </td>
                                                                        <td class="text-right"><strong>Totals</strong></td>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach ($order->items as $item)  
                                                                    <tr>
                                                                        <td><a target="_blank" href="{{ route("product",$item->product("slug")) }}">{{$item->product("name")}}</a></td>
                                                                        <td class="text-center">&#163;{{$item->listed_price}}</td>
                                                                        <td class="text-center">{{$item->qty}}</td>
                                                                        <td class="text-right">&#163;{{$item->listed_price * $item->qty}}</td>
                                                                    </tr>
                                                                    @endforeach
                                                                  
                                                                    <tr>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line"></td>
                                                                        <td class="thick-line text-center">
                                                                            <strong>Subtotal</strong></td>
                                                                        <td class="thick-line text-right">&#163;{{$order->subtotal}}</td>
                                                                    </tr>
                                                                    @if($order->shipping_charge===0)
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Shipping</strong></td>
                                                                        <td class="no-line text-right">&#163;{{$order->shipping_charge}}</td>
                                                                    </tr>
                                                                    @endif
                                                                    <tr>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line"></td>
                                                                        <td class="no-line text-center">
                                                                            <strong>Total </strong></td>
                                                                        <td class="no-line text-right"><h4 class="m-0">&#163;{{$order->amount_paid}}</h4></td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="d-print-none">
                                                                <div class="pull-right">
                                                                    <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i></a>
                                                                    {{-- <a href="#" class="btn btn-primary waves-effect waves-light">Send</a> --}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div>
         
    </div>
</div>
@endsection