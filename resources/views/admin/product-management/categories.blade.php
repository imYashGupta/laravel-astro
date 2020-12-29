@extends('layouts.master')

@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Product Categories</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ route("category.create")}}" class="btn btn-primary text-white float-right">Add new</a>
                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Description</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    @forelse ($categories as $category)
                                                    <tr>
                                                        <td>{{$category->name}} @if($category->id==1) <span data-toggle="tooltip" data-placement="top" title="" data-original-title="This is the default category and it cannot be deleted. " class="mdi mdi-help"> </span> @endif</td>
                                                        <td>{{$category->description}}</td>                                                       
                                                        <td>
                                                            @if($category->status==1)
                                                            <i class="mdi mdi-checkbox-blank-circle text-success"></i> Active
                                                            @else
                                                            <i class="mdi mdi-checkbox-blank-circle text-danger"></i> Deactivate
                                                            @endif
                                                        </td>                                                                                                            
                                                        <td>
                                                            <a href="{{ route("category.edit",$category) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                            @if($category->id!=1)
                                                            <a data-toggle="modal" data-target="#ConfirmationModal" data-name="{{$category->name}}" data-url="{{route("category.destroy",$category->id)}}"  href="#" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi  mdi-delete font-18"></i></a>
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
<div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="ConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ConfirmationLabel">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong id="name"></strong> Category? <br> Products that belongs to this category will be Uncategorized.
            
        </div>
        <div class="modal-footer">
        <form method="POST" id="delete-form"  > 
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