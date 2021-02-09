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
        <div class="heading-and-upgrade-button mb-4">
            <h3 class="display-username">My Ticket</h3>
            <a href="{{ route("tickets.create") }}"   class="theme-btn">Create Ticket</a>
        </div>
        <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical " width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Subject</th>
                                        <th>Requestor</th>
                                        <th>Priority</th>
                                        <th>Status</th>
                                        <th>Submitted</th>
                                        <th>Last Updated</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tickets as $ticket)

                                    <tr>
                                        <td>#{{ $ticket->id }}</td>
                                        <td>{{ $ticket->subject }}</td>
                                        <td>{{ $ticket->user->name }}</td>
                                        <td>{{ $ticket->priority }}</td>
                                        <td>@if($ticket->status)
                                             <span class="text-success">Open</span>
                                            @else
                                            <span class=" text-danger">Closed</span> 
                                            @endif
                                        </td>
                                        <td>{{ $ticket->created_at->format("F d ,Y (H:i)") }}</td>
                                            <td>{{$ticket->updated_at->diffForHumans()}}
                                        </td>
                                        <td><a href="{{ route("support-tickets.show",$ticket->id) }}">View</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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