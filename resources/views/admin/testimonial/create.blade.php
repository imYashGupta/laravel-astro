@extends('layouts.master')
@section('title',"Testimonials Management")
@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Testimonials</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">{{$testimonial ? "Edit" : "Create"}} testimonial</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>
                                            <form id="form-action" action="{{ $testimonial ? route("testimonial.update",$testimonial) : route("testimonial.store") }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @if($testimonial) @method("PATCH") @endif
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="row">
                                                            <div class="col-sm-6 form-group">
                                                                <label for="name">Name</label>
                                                                <input value="{{ $testimonial ? $testimonial->name : old("name") }}" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                                                                @error('name')
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6 form-group">
                                                                <label for="designation">Designation</label>
                                                                <input value="{{ $testimonial ? $testimonial->designation : old("designation") }}" id="designation" name="designation" type="text" class="form-control @error('designation') is-invalid @enderror">
                                                                @error('designation')
                                                                    <span class="invalid-feedback d-block" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group  ">
                                                            <label for="status">Status</label> 
                                                            <select name="status" class="form-control @error('status') is-invalid @enderror"> 
                                                                <option {{ $testimonial ? ($testimonial->status=='1' ? "selected" : "") : (old("status")=="1" ? "selected" : '') }}  value="1">Active</option>
                                                                <option {{ $testimonial ? ($testimonial->status=='0' ? "selected" : "") : (old("status")=="0" ? "selected" : '') }} value="0">Disable</option>
                                                            </select>
                                                            @error('status')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="description">Description</label>
                                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5">{{ $testimonial ? $testimonial->description : old("description") }}</textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Image</label> <br/>
                                                            <img src="@if($testimonial){{$testimonial->imageUrl}}@else{{ URL::asset('assets/images/placeholder/image_large-300x300.png') }}@endif" alt="Testmonial img" class="img-fluid" id="image" style="width: 230px;height:230px" />
                                                            <br/>
                                                            <div class="form-group mt-4 pt-1">
                                                                <input id="imgInp" name="image" type="file" class="filestyle  @error('image') is-invalid @enderror" data-buttonname="btn-secondary">
                                                                @error('image')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                                <button type="submit" class="btn btn-secondary waves-effect">Cancel</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!-- select2 js -->
<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>


@endsection

@section('script-bottom')
<script type="text/javascript">
    // Select2
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#image').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#imgInp").change(function() {
        readURL(this);
    });

</script>

@endsection

