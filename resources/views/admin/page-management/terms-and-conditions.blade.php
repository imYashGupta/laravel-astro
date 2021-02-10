@extends('layouts.master')
@section('title',"Terms And Conditions")
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
                            <h4 class="mt-0 header-title mb-3">Terms And Conditions</h4>
                            <form id="form-action" action="{{ route("page.terms-update") }}" enctype="multipart/form-data"   method="POST">
                                @csrf
                             
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <textarea name="content" id="content" rows="3"  class="summernote">{{ $content }}</textarea>
                                            @error('content')
                                                <span class="invalid-feedback d-block" role="alert">
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
            height: 600,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
        });
    });
</script>
<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>

@endsection

