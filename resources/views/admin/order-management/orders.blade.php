@extends('layouts.master')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('title',"Orders")

@section('breadcrumb')
<h3 class="page-title">Orders</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
                          {{--   <div class="row">
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="font-40 text-primary mr-0 float-right"><i class="mdi mdi-cart-outline"></i></span>
                                        <div class="mini-stat-info">
                                            <h3 class="counter font-light mt-0">$36,410</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class=" mb-0 m-t-10 text-muted">Total Orders <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>3.25%</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="font-40 text-success mr-0 float-right"><i class="mdi mdi-currency-usd"></i></span>
                                        <div class="mini-stat-info">
                                            <h3 class="counter font-light mt-0">$29,854</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class=" mb-0 m-t-10 text-muted">Successful Orders <span class="pull-right"><i class="fa fa-caret-up text-success m-r-5"></i>8.51%</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="font-40 text-warning mr-0 float-right"><i class="mdi mdi-fingerprint"></i></span>
                                        <div class="mini-stat-info">
                                            <h3 class="counter font-light mt-0">$4,512</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class=" mb-0 m-t-10 text-muted">Refunds <span class="pull-right"><i class="fa fa-caret-down text-danger m-r-5"></i>5.52%</span></p>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="mini-stat clearfix bg-white">
                                        <span class="font-40 text-danger mr-0 float-right"><i class="mdi mdi-rotate-right"></i></span>
                                        <div class="mini-stat-info">
                                            <h3 class="counter font-light mt-0">$2,854</h3>
                                        </div>
                                        <div class="clearfix"></div>
                                        <p class=" mb-0 m-t-10 text-muted">Chargebacks <span class="pull-right"><i class="fa fa-caret-up text-success m-r-5"></i>7.10%</span></p>
                                    </div>
                                </div>
                            </div> --}}


                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Order ID</th>
                                                    <th>Amount</th>
                                                    <th>Order Date</th>
                                                    <th>Payment</th>
                                                    <th>Billing Details</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                    <tr>
                                                        <td>
                                                            <a href="#" class="font-600 text-muted">#{{$order->id}}</a>
                                                        </td>
                                                        <td>&#163;{{$order->amount_paid}}</td>
                                                        <td>{{$order->created_at->format("M d, Y h:i A")}} </td>
                                                        <td><i class="fa fa-cc-paypal text-muted font-20"></i> </td>
                                                        <td>{{ $order->name }} <br>{{ $order->billing_email }}</td>
                                                        <td><span class="badge badge-{{$order->status_data["class"]}} hide-print text-uppercase">{{$order->status_data["text"]}}</span></td>
                                                        <td>
                                                            <a href="{{ route("order.show",$order->id) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"><i class="mdi mdi-eye font-18"></i></a>
                                                            {{-- <a href="javascript:void(0);" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a> --}}
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!-- Datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

@endsection

@section('script-bottom')
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable({
            "order": [[ 0, "desc" ]]
        });
    });
</script>
@endsection

