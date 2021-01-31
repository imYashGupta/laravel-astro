@extends('layouts.master')
@section('title',"Page Management")
@section('breadcrumb')
<h3 class="page-title">Page Management</h1>
@endsection
@section('css')
<!-- DataTables -->
<style>
    .font-size-14{
        font-size: 14px !important;
    }
</style>
<link href="{{ URL::asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ URL::asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">{{$faq ? "Edit" : "Create"}} frequently asked questions</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>
                                            <form id="form-action" action="{{ $faq ? route("faq.update",$faq) : route("faq.store") }}" method="POST">
                                                @csrf
                                                @if($faq) @method("PATCH") @endif
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="question">Question</label>
                                                            <input value="{{ $faq ? $faq->question : old("question") }}" id="question" name="question" type="text" class="form-control @error('question') is-invalid @enderror">
                                                            @error('question')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                         
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="answer">Answer</label>
                                                            <textarea name="answer" class="form-control @error('answer') is-invalid @enderror" id="answer" rows="5">{{ $faq ? $faq->answer : old("answer") }}</textarea>
                                                            @error('answer')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                        <label for="status">Status</label>
                                                        <select  class="form-control  @error('status') is-invalid @enderror" name="status" >
                                                            <option value="1" @if($faq) @if($faq->status==1) selected @endif @endif>Active</option>
                                                            <option value="0" @if($faq) @if($faq->status==0) selected @endif @endif>Deactivate</option>
                                                        </select>
                                                        @error('status')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                                {{-- <button type="submit" class="btn btn-secondary waves-effect">Cancel</button> --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                          
                        </div><!-- container -->

                        <div class="container-fluid mt-3">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title">Frequently Asked Questions</h4>
                                            <div class="mt-4">
                                                <div id="accordion">
                                                @forelse ($faqs as $faq)
                                                    <div class="card mb-2">
                                                        <div class="card-header border-bottom-0 p-3" id="heading{{$faq->id}}">
                                                            <h5 class="m-0 font-size-14 float-left"  >
                                                                <a href="#" data-toggle="collapse" data-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}" class="text-dark collapsed">
                                                                   Q.{{$loop->iteration	}} {{$faq->question}}
                                                                </a>
                                                                
                                                            </h5>
                                                            <div class="float-right">
                                                                @if($faq->status==1)
                                                                <i class="mdi mdi-checkbox-blank-circle text-success mr-3"></i> 
                                                                @else
                                                                <i class="mdi mdi-checkbox-blank-circle text-danger mr-3"></i> 
                                                                @endif
                                                                <a href="{{route("faq.edit",$faq->id)}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="mdi mdi-pencil font-18"></i></a>
                                                                <a  data-toggle="modal" data-target="#ConfirmationModal" data-name="{{$faq->question}}" data-url="{{route("faq.destroy",$faq->id)}}" class="text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><i class="mdi mdi-delete font-18"></i></a>
                                                            </div>
                                                        </div>
    
                                                        <div id="collapse{{$faq->id}}" class="collapse" aria-labelledby="heading{{$faq->id}}" data-parent="#accordion" style="">
                                                            <div class="card-body text-muted">
                                                                {{$faq->answer}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach

                                                </div>
    
                                            </div>
    
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
          <h5 class="modal-title" id="ConfirmationLabel">Delete FAQ?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to delete <strong id="name"></strong>? 
            
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