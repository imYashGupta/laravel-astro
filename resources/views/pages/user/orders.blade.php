@extends('layouts.user')
@section('styles')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="col-xl-9 col-lg-9 col-md-12">
    <div class="main-center-data">
        <h3 class="display-username">Orders</h3>
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Order Date</th>
                        <th>Billing Email</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        <tr>
                            <td>
                                <a href="{{ route("user.order",$order->id) }}" class="font-600 text-muted">#{{$order->id}}</a>
                            </td>
                            <td>${{$order->amount_paid}}</td>
                            <td>{{$order->created_at->format("M d, Y h:i A")}} </td>
                            <td>{{ $order->billing_email }}</td>
                            <td><span class="badge badge-{{$order->status_data["class"]}} hide-print text-uppercase">{{$order->status_data["text"]}}</span></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
         
    </div>
</div>
@endsection
@section('scripts')
 
<!-- Datatable js -->
<script src="{{ URL::asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive examples -->
<script src="{{ URL::asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
@endsection