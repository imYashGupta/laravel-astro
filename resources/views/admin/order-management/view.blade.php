@extends('layouts.master')

@section('css')
<style>
    @media print {
        a{
            text-decoration: none !important;
            color: black !important;
        }
        .hide-print{
            display: none !important;
        }

}
</style>
@endsection

@section('breadcrumb')
<h3 class="page-title">Invoice</h1>
@endsection

@section('content')
                    <div class="page-content-wrapper">
                        <div class="container-fluid">
                            @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card m-b-20">
                                        <div class="card-body">
                                          
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="invoice-title">
                                                        <h4 class="pull-right font-16"><strong>Order #{{$order->id}}</strong></h4>
                                                        <span class="badge badge-{{$order->status_data["class"]}} hide-print text-uppercase">{{$order->status_data["text"]}}</span>
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
                                                        <div class="col-6 text-right">
                                                            <address>
                                                                <strong>Customer Details: #{{$order->user->id}}</strong><br>
                                                                {{$order->user->name}}<br>
                                                                {{$order->user->email}}<br>
                                                               {{--  Apt. 4B<br>
                                                                Springfield, ST 54321 --}}
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
                                                        <div class="col-6 m-t-30 text-right">
                                                            <address>
                                                                <strong>Order Date:</strong><br>
                                                               {{ $order->created_at->format("F d,Y") }}<br><br>
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
                                                                        <td><a href="{{ route("product.edit",$item->product("id")) }}">{{$item->product("name")}}</a></td>
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
                                </div> <!-- end col -->
                              
                            </div> <!-- end row -->
                            <div class="row d-print-none">
                                <div class="col-12">
                                <div class="card">
                                    <div class="card-body">

                                        <h4 class="card-title">PayPal Payment Details</h4>
                                        <p class="card-title-desc"> 
                                            information provided by paypal after payment.
                                        </p>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                <tr>
                                                    <th scope="row">Invoice ID</th>
                                                    <td>{{$order->paypalData("INVNUM")}}</td>
                                                    
                                                    <th scope="row">Payer ID</th>
                                                    <td>{{$order->paypalData("PAYERID")}}</td>
                                              
                                                </tr>
                                                <tr>
                                                    <th scope="row">Token</th>
                                                    <td>{{$order->paypalData("TOKEN")}}</td>
                                                    
                                                    <th>Name</th>
                                                    <td>{{$order->paypalData("FIRSTNAME").' '.$order->paypalData("LASTNAME")}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Currency Code</th>
                                                    <td>{{$order->paypalData("COUNTRYCODE")}}</td>
                                                    <th>Payer Email</th>
                                                    <td>{{$order->paypalData("EMAIL")}}</td>
                                                </tr>
                                                <tr>
                                                    <th>AMT</th>
                                                    <td>{{$order->paypalData("AMT")}} {{$order->paypalData("COUNTRYCODE")}}</td>
                                                    <th>Payer Status</th>
                                                    <td>{{$order->paypalData("PAYERSTATUS")}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Acknowledgement</th>
                                                    <td>{{$order->paypalData("ACK")}}</td>
                                                    <th>Time</th>
                                                    <td>{{$order->paypalData("TIMESTAMP")}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                </div>
                                </div>                
                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection
@section('script-bottom')
<div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="ConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route("order.update",$order->id) }}" method="POST" >
                <div class="modal-header">
                    <h5 class="modal-title" id="ConfirmationLabel">Change Order Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @csrf
                    @method("PATCH")
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Change Status To:</label>
                        <div class="col-sm-8">
                            <select name="status" class="form-control">
                                <option @if($order->status==2) selected @endif value="2">Confirmed</option>
                                <option @if($order->status==0) selected @endif value="0">Rejected</option>
                                <option @if($order->status==3) selected @endif value="3">In Processing</option>
                                <option @if($order->status==4) selected @endif value="4">Completed</option>
                                <option @if($order->status==5) selected @endif value="5">Returned</option>
                                <option @if($order->status==6) selected @endif value="6">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-check">
                        <input name="no_email" type="checkbox" class="form-check-input"  id="no_email">
                        <label class="form-check-label" for="no_email">Do not send email about the status change.
                        </label>
                    </div>   
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
     $(document).ready(function () {
        $('#datatable').DataTable({
            order : []
        });

        $('#ConfirmationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)  
            var name = button.data('name')  
            var url = button.data('url')  
            var modal = $(this)
            modal.find('#name').text(name);
            modal.find('#delete-form').attr("action",url);
            // modal.find('.modal-body input').val(recipient)
        })
    });


</script>
@endsection

