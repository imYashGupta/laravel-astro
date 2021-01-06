@extends('layouts.master')
@section('title',"Blogs Management")

@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />

@endsection

@section('breadcrumb')
<h3 class="page-title">Blog Management</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <form action="{{ $blog ? route("blog.update",$blog) : route("blog.store") }}" method="POST" enctype="multipart/form-data">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">{{$blog ? "Edit" : "Create"}} blog</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>
                                                @csrf
                                                @if($blog) @method("PATCH") @endif
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input value="{{ $blog ? $blog->title : old("title") }}" id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror">
                                                            @error('title')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="description">Short Description</label>
                                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="2">{{ $blog ? $blog->short_description : old("description") }}</textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="category">Category</label> 
                                                            <select name="category" class="form-control @error('category') is-invalid @enderror"> 
                                                                <option value="">Choose Category</option>
                                                            @foreach ($blogCategory as $category)
                                                                <option {{ $blog ? ($blog->category_id==$category->id ? "selected" : "") : (old("category")==$category->id ? "selected" : '') }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        	</select>
                                                            @error('category')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="form-group">
                                                            <label for="slug">Slug </label>
                                                            <input value="{{ $blog ? $blog->slug : old("slug") }}" id="slug" name="slug" type="text" class="form-control @error('slug') is-invalid @enderror">
                                                            @error('slug')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="description">Content</label> 
                                                            <textarea name="content" id="summernote" class="summernote" cols="30" rows="10">{{ $blog ? $blog->content : old("content") }}</textarea>
                                                            @error("content")<span class="text-danger font-weight-bold">{{$message}}</span>@enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label>Product Image</label> <br/>
                                                            <img src="@if($blog){{$blog->thumbnailUrl}}@else{{ URL::asset('assets/images/placeholder/image_large-300x300.png') }}@endif" alt="blog img" class="img-fluid" id="productThumb" style="width: 230px;height:230px" />
                                                            <br/>
                                                            <div class="form-group mt-4 pt-1">
                                                                <input  @if($blog) @else  @endif id="imgInp" name="thumbnail" type="file" class="filestyle " data-buttonname="btn-secondary">
                                                                @error('thumbnail')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="status">Status</label> 
                                                            <select name="status" class="form-control @error('status') is-invalid @enderror"> 
                                                                <option {{ $blog ? ($blog->status=='1' ? "selected" : "") : (old("status")=="1" ? "selected" : '') }}  value="1">Published</option>
                                                                <option {{ $blog ? ($blog->status=='0' ? "selected" : "") : (old("status")=="0" ? "selected" : '') }} value="0">Draft</option>
                                                        	</select>
                                                            @error('status')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                   
                                                </div>
                                               
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
    
                                            <h4 class="card-title">Meta Data</h4>
                                            <p class="card-title-desc">Fill all information below</p>
    
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="metatitle">Meta title</label>
                                                            <input value="@if($blog){{ $blog->meta_title }}@else{{old("metatitle")}}@endif" id="metatitle" name="metatitle" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="metakeywords">Meta Keywords</label>
                                                            <input value="@if($blog){{ $blog->meta_keyword }}@else{{old("metakeywords")}}@endif" id="metakeywords" name="metakeywords" type="text" class="form-control">
                                                        </div>
                                                    </div>
    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="metadescription">Meta Description</label>
                                                        <textarea class="form-control" id="metadescription" name="metadescription" rows="5">{{ $blog ?  $blog->meta_description : old("metadescription")  }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
    
                                                <button type="submit" class="btn btn-success waves-effect waves-light mr-1">Save Changes</button>
    
    
                                        </div>
                                    </div>
                                </div>
                            </form>

                            </div>
                        </div><!-- container -->
                    </div> <!-- Page content Wrapper -->
@endsection

@section('script')
<!-- select2 js -->
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>
@endsection

@section('script-bottom')
<script type="text/javascript">
    // Select2
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
            $('#productThumb').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }
    $("#imgInp").change(function() {
        console.log("logs")
        readURL(this);
    });

    $(".select2").select2();
    jQuery(document).ready(function(){
                $('.summernote').summernote({
                    height: 400,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                });
            });

    function slugify(text){
	  return text.toString().toLowerCase()
	    .replace(/\s+/g, '-')           // Replace spaces with -
	    .replace(/[^\u0100-\uFFFF\w\-]/g,'-') // Remove all non-word chars ( fix for UTF-8 chars )
	    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
	    .replace(/^-+/, '')             // Trim - from start of text
	    .replace(/-+$/, '');            // Trim - from end of text
    }
    
    jQuery(function($) {
        $('#title').on('keyup', function() {
            var data = $('#title').val();
            Text = slugify(data);
            $("#slug").val(Text);  
        });
    });
</script>

@endsection

