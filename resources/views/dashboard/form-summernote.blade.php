@extends('layouts.master')

@section('css')
<!-- Summernote css -->
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Summernote</h1>
@endsection

@section('content')
      <div class="page-content-wrapper">
            <div class="container-fluid">
                    <div class="row">
                         <div class="col-12">
                                <div class="card m-b-20">
                                  <div class="card-body">
                                        <h4 class="mt-0 header-title">Examples</h4>
                                            <p class="text-muted m-b-30 font-14">Super simple wysiwyg editor on bootstrap</p>
                                            <div class="summernote">Hello Summernote</div>
                                        </div>
                                    </div>
                        </div> <!-- end col -->
                </div> <!-- end row -->
            </div><!-- container -->
    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!--Summernote js-->
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>
@endsection

@section('script-bottom')
<script>
         jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 300,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true                 // set focus to editable area after initializing summernote
                });
            });
</script>
@endsection

