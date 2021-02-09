@extends('layouts.master')
@section('title',"User Management")

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Enquiries</h1>
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Subject</th>
                                                        <th>Message</th>
                                                        <th>Date</th>
                                                        <th>IP Address</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($enquiries as $enquiry)
                                                        <tr>
                                                            <td>{{$enquiry->firstname.' '.$enquiry->lastname }}</td>
                                                            <td><a href="mailto:{{$enquiry->email}}">{{$enquiry->email}}</a></td>
                                                            <td>{{$enquiry->subject}}</td>
                                                            <td>{{$enquiry->message}}</td>
                                                            <td>{{$enquiry->created_at->format("M d, Y h:i A")}}</td>
                                                            <td>{{$enquiry->ip_address}}</td>
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
<div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserLabel">Delete Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong id="username"></strong> your account?
            
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

        $('#deleteUser').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)  
            var name = button.data('username')  
            var url = button.data('url')  
            var modal = $(this)
            modal.find('#username').text(name);
            modal.find('#delete-user-form').attr("action",url);
            // modal.find('.modal-body input').val(recipient)
        })
    });


</script>
@endsection