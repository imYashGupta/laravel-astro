@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
@endsection
@section('breadcrumb')
<h3 class="page-title">Page Management</h1>
@endsection

@section('content')
    <div class="page-content-wrapper">
        <div class="container-fluid">
            @include('components.alert')

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title text-capitalize">{{request("service")}}</h4>
                            <form id="form-action" action="{{ route("page.service-update",["service" => request("service")]) }}" enctype="multipart/form-data"   method="POST">
                                @csrf
                            
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="des">Short Description:</label>
                                            <textarea name="description" id="description" rows="3"  class="form-control">{{ $description }}</textarea>
                                            @error('description')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="content">content:</label>
                                            <textarea name="content" id="content" rows="3"  class="summernote">{{ $content }}</textarea>
                                            @error('content')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Main Image</label>
                                            <input type="file" id="main-img" class="filestyle @error("image") is-invalid @endif" data-buttonname="btn-secondary" name="main_image" id="image">
                                            <img height="64" width="64" id="main-img-src"  src="{{ $main }}" height="75" class="mt-3 mb-3" alt="image" />
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="image">Description Image</label>
                                            <input type="file" id="imgInp" class="filestyle @error("image") is-invalid @endif" data-buttonname="btn-secondary" name="image" id="image">
                                            <img height="200" id="img"  src="{{ $image }}" height="75" class="mt-3 mb-3" alt="image" />
                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- container -->
    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>
<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 400,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
        });
    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
             $('#img').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#imgInp").change(function() {
        console.log("logs")
        readURL(this);
    });

    function _readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
             $('#main-img-src').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#main-img").change(function() {
        _readURL(this);
    });
</script>
<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>

@endsection

