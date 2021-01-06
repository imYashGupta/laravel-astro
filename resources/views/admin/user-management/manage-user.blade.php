@extends('layouts.master')
@section('title',"User Management")

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Customers</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ route("users.create")}}" class="btn btn-primary text-white float-right">Add new</a>
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Status</th>
                                                        <th>Verified</th>
                                                        <th>Joining Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($users as $user)
                                                    <tr>
                                                        <td>{{$user->name}}</td>
                                                        <td>{{$user->email}}</td>                                                       
                                                        <td>
                                                            @if($user->status==1)
                                                            <i class="mdi mdi-checkbox-blank-circle text-success"></i> Active
                                                            @else
                                                            <i class="mdi mdi-checkbox-blank-circle text-danger"></i> Deactivate
                                                            @endif
                                                        </td>                                                       
                                                        <td>{{is_null($user->email_verified_at) ? "NO" : "YES" }}</td>
                                                    <td>{{$user->created_at->format("M d,Y") }}</td>
                                                        {{-- <td>
                                                            @if($user->role_id==1)
                                                                @if($user->id==auth()->id())
                                                                    <a href="{{ route("users.edit",$user) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                                @endif
                                                            @else
                                                            @if($user->role_id==3)
                                                                @if(auth()->user()->role_id==1)
                                                                <a href="{{ route("users.edit",$user) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>

                                                                @endif
                                                            @else
                                                                <a href="{{ route("users.edit",$user) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            @endif
                                                            @endif
                                                            @if($user->id!=auth()->id())
                                                                @if(auth()->user()->role_id==1)
                                                                <form   method="POST" action="{{route("users.destroy",$user->id)}}" id="delete-user-{{$user->id}}" class="d-none"> 
                                                                    @method('delete')
                                                                    @csrf
                                                                </form>
                                                                <a onclick="event.preventDefault();
                                                                    document.getElementById('delete-user-{{$user->id}}').submit();" href="{{route("users.destroy",$user->id)}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-close font-18"></i></a>
                                                                @endif
                                                            @endif
                                                        </td> --}}
                                                        <td>
                                                            <a href="{{ route("users.edit",$user) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            @if($user->role=='USER')
                                                            <a data-toggle="modal" data-target="#deleteUser" data-username="{{$user->name}}" data-url="{{route("users.destroy",$user->id)}}"  href="#" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi  mdi-delete font-18"></i></a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @empty
                                                        
                                                    @endforelse
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