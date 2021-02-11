@extends('layouts.master')
@section('title',"Blogs Management")
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Blogs</h1>
@endsection

@section('content')
                <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <a href="{{ route("blog.create")}}" class="btn btn-sm btn-primary text-white float-right">New Blog</a>

                                            <table id="datatable" class="table table-striped dt-responsive nowrap table-vertical" width="100%" cellspacing="0">
                                                <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Status</th>
                                                    <th>Published On</th>
                                                    <th>Views</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse ($blogs as $blog)
                                                <tr>
                                                    <td class="product-list-img sorting_1" tabindex="0">
                                                        <img  src="{{ $blog->thumbnailUrl }}" class="img-fluid avatar-md rounded" alt="Product Image">
                                                    </td>
                                                    <td>
                                                        <a class="mt-0 h6 m-b-5" href="{{ route("blog",$blog->slug) }}" target="_blank">{{\Illuminate\Support\Str::limit($blog->title,50,'...')}}</a>
                                                        <p class="m-0 font-14">{{\Illuminate\Support\Str::limit($blog->short_description,50,'...')}}</p>
                                                    </td>
                                                    <td>
                                                        {{$blog->category}}
                                                    </td>
                                                    <td>{{$blog->status ? "Published" : "Draft"}}</td>
                                                   
                                                    <td>{{$blog->created_at->format("d M,Y | h:i A")}} 
                                                    </td>
                                                    <td>{{ $blog->views }}</td>
                                                    <td>
                                                    <a href="{{route("blog.edit",$blog->id)}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                    <a  data-toggle="modal" data-target="#ConfirmationModal" data-name="{{$blog->title}}" data-url="{{route("blog.destroy",$blog->id)}}" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-delete font-18"></i></a>
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

<div class="modal fade" id="ConfirmationModal" tabindex="-1" aria-labelledby="ConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ConfirmationLabel">Delete Blog</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong id="name"></strong> Blog? 
            
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
          $('#datatable').DataTable();
          
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