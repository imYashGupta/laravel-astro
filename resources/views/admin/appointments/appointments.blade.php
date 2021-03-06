@extends('layouts.master')
@section('title',"Appointments")

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Appointments</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Gender</th>
                                                        <th>Country</th>
                                                        <th>State</th>
                                                        <th>City</th>
                                                        <th>Pincode</th>
                                                        <th>IP Address</th>
                                                        <th>Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach ($appointments as $appointment)
                                                       <tr>
                                                           <td>{{ $appointment->id }}</td>
                                                           <td>{{ $appointment->name }}</td>
                                                           <td>{{ $appointment->email }}</td>
                                                           <td>{{ $appointment->phone }}</td>
                                                           <td>{{ $appointment->gender }}</td>
                                                           <td>{{ $appointment->country($appointment->country) }}</td>
                                                           <td>{{ $appointment->state($appointment->state) }}</td>
                                                           <td>{{ $appointment->city($appointment->city) }}</td>
                                                           <td>{{ $appointment->pincode }}</td>
                                                           <td>{{ $appointment->ip_address }}</td>
                                                           <td>{{ $appointment->created_at->format("M d, Y h:i A") }}</td>
                                                           <td> 
                                                            <a data-toggle="modal" data-target="#ConfirmationModal"   data-url="{{route("appointments.destroy",$appointment->id)}}"  href="{{route("blog-category.destroy",$appointment->id)}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete"><i class="mdi  mdi-delete font-18"></i></a>
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
<div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="ConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ConfirmationModalLabel">Delete Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete this request?
            
        </div>
        <div class="modal-footer">
        <form method="POST" id="delete-user-form"  > 
            @method('DELETE')
            @csrf
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        </div>
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
            var url = button.data('url')  
            var modal = $(this)
            modal.find('#delete-user-form').attr("action",url);
        })
    });


</script>
@endsection