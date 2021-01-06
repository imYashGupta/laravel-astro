@extends('layouts.master')
@section('title',"Review Management")
    
@section('css')
<!-- DataTables -->
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Review Management</h1>
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
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>User</th>
                                                    <th>Rating</th>
                                                    <th>Review</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($reviews as $review)
                                                        <tr>
                                                            <td class="product-list-img sorting_1" tabindex="0">
                                                                <img src="{{$review->product["thumbnailUrl"]}}" class="img-fluid avatar-md rounded" alt="tbl">
                                                            </td>
                                                            <td>
                                                                @if(is_null($review->product["deleted_at"]))
                                                                <a target="_blank" href="{{ route("product.edit",$review->product["id"]) }}">{{$review->product["name"]}}</a>
                                                                @else
                                                                <span>{{$review->product["name"]}}</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!is_null($review->user_id))
                                                                    @if(is_null($review->user["deleted_at"]))
                                                                    <a target="_blank" href="{{ route("users.edit",$review->user_id) }}">{{$review->user["name"]}} <span class="badge badge-success">Verified</span></a>
                                                                    @else
                                                                    <span>{{ $review->user["name"] }} </span>
                                                                    @endif
                                                                @else
                                                                <div>
                                                                    {{ $review->name }} <span class="badge badge-danger">Not Verified</span>
                                                                </div>
                                                                    <a href="mailto:{{$review->email}}">{{ $review->email }}</a>
                                                                @endif
                                                            </td>
                                                            <td>{{$review->rating}} <i class="mdi mdi-star text-warning"></i></td>
                                                            <td>{{$review->review}}</td>
                                                            <td>{{$review->created_at->format("d M,y | h:i A")}}</td>
                                                            <td><i class="mdi mdi-checkbox-blank-circle text-{{ $review->statusStr["class"] }}"></i> {{ $review->statusStr["status"] }}</td>
                                                            <td>
                                                                <a href="{{ route("review.edit",$review->id) }}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                                @if(is_null($review->status))
                                                                    <a href="{{ route("review.action",$review->id) }}?action=approve" class="m-r-15 text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve"><i class="mdi mdi-check font-weight-bold font-20"></i></a>
                                                                    <a href="{{ route("review.action",$review->id) }}?action=decline" class="m-r-15 text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Decline"><i class="mdi mdi-close font-weight-bold font-20"></i></a>
                                                                @endif
                                                                <a data-toggle="modal" data-target="#ConfirmationModal" data-name="{{$review->name}}" data-url="{{route("review.destroy",$review->id)}}" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-delete font-18"></i></a>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <p>No Reviews found!</p>    
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
          <h5 class="modal-title" id="ConfirmationLabel">Delete Testimonial</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong id="name"></strong> Review? 
            
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