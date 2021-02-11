@extends('layouts.master')
@section('title',"Newsletter subscribers")

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Newsletter subscribers</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <button type="button" data-emails="{{ $emailsStr }}" id="copyEmails" class="btn btn-sm btn-primary text-white float-right">Copy All Emails</button>

                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Email</th>                                                 
                                                        <th>Date</th>
                                                        <th>IP Address</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($subscribers as $subscriber)
                                                        <tr>
                                                            <td><a href="mailto:{{$subscriber->email}}">{{$subscriber->email}}</a></td>
                                                            <td>{{$subscriber->created_at->format("M d, Y h:i A")}}</td>
                                                            <td>{{$subscriber->ip_address}}</td>
                                                            <td>
                                                                <a  data-toggle="modal" data-target="#ConfirmationModal" data-email="{{$subscriber->email}}" data-url="{{route("newsletter.destroy",$subscriber->id)}}" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-delete font-18"></i></a>
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
<div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteUserLabel">Delete Account</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong id="username"></strong> this email?
            
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
    function Clipboard_CopyTo(value) {
        var tempInput = document.createElement("input");
        tempInput.value = value;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
        
    }

    document.querySelector('#copyEmails').onclick = function(e) {
        var emails=$(e.target).data("emails");
        console.log(emails);
        Clipboard_CopyTo(emails);
        swal("All email copied to clipboard.");
    }

     $(document).ready(function () {
        

        $('#datatable').DataTable({
            order : []
        });

        $('#ConfirmationModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)  
            var name = button.data('email')  
            console.log(name)
            var url = button.data('url')  
            var modal = $(this)
            modal.find('#username').text(name);
            modal.find('#delete-user-form').attr("action",url);
            // modal.find('.modal-body input').val(recipient)
        })
    });


</script>
@endsection