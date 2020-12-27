@extends('layouts.master')

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
                                                            @if($user->status===1)
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
<script type="text/javascript">
     $(document).ready(function () {
        $('#datatable').DataTable({
            order : []
        });
    });
</script>
@endsection