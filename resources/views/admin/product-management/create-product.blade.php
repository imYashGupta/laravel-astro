@extends('layouts.master')
@section('title',"Product Management")
@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ URL::asset('assets/css/imageuploadify.min.css') }}">
<link href="{{ URL::asset('assets/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" />
@endsection

@section('breadcrumb')
<h3 class="page-title">@if($product) Edit @else Create @endif Product</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <form class="col-12" method="POST" action="{{$product ? route("product.update",$product->id):route("product.store")}}" enctype="multipart/form-data">

                                <div >
                                    <div class="card m-b-20">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">Basic Information</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>

                                            {{-- <form method="POST" action="{{route("product.store")}}" enctype="multipart/form-data"> --}}
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">Product Name</label>
                                                            <input  value="@if($product){{ $product->name }}@else{{ old('name')}}@endif" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="short_description">Short Description</label>
                                                            <textarea id="short_description" name="short_description" cols="30" rows="3" class="form-control @error('short_description') is-invalid @enderror">@if($product){{ $product->short_description }}@else{{ old('short_description')}}@endif</textarea>
                                                            @error('short_description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <div>

                                                                <label for="description" class="float-left">Description </label>
                                                                @error('description')
                                                            <span class="invalid-feedback d-block " role="alert">
                                                                <strong class="pl-2"> {{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                            <div class="clearfix"></div>
                                                        </div>
                                                            <textarea name="description" id="summernote" class="summernote" cols="30" rows="10">{{ $product ? $product->description : old("description") }}</textarea>
                                                            {{-- <textarea  class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">@if($product){{ $product->description }}@else{{ old('description')}}@endif</textarea> --}}
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="category">Category</label> 
                                                            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror"> 
                                                                <option value="">Choose Category</option>
                                                                @foreach($categories as $category)
                                                                <option {{ $product ? ($product->category_id==$category->id ? "selected" : "") : (old("category")==$category->id ? "selected" : '') }} value="{{$category->id}}">{{$category->name}}</option>
                                                                @endforeach
                                                        	</select>
                                                            @error('category')
                                                            <span class="invalid-feedback d-block" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="row">
                                                            <div class="form-group col-md-4">
                                                                <label for="price">Price</label>
                                                                <input  value="@if($product){{ $product->price }}@else{{ old('price')}}@endif" min="1" id="price" name="price" type="text" class="form-control  @error('price') is-invalid @enderror">
                                                                @error('price')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="discount">Discount</label>
                                                                <input  value="@if($product){{ $product->discount }}@else{{ session()->has("discound") ? old('discount') : '0'}}@endif" id="discount" name="discount" type="number" class="form-control  @error('discount') is-invalid @enderror">
                                                                @error('discount')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="units">Units</label>
                                                                <input  value="@if($product){{ $product->units }}@else{{ old('units')}}@endif" class="form-control  @error('units') is-invalid @enderror" id="units" name="units" type="number" step="1"  pattern="[0-9]" title="Numbers only" min="1"                                                               class="form-control">
                                                                @error('units')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            
                                                            <div class="form-group col-md-4">
                                                                <label for="availability">Availability</label>
                                                                <select  class="form-control  @error('availability') is-invalid @enderror" name="availability" id="availability">
                                                                    <option value="1" @if($product) @if($product->availability==1) selected @endif @endif>In stock</option>
                                                                    <option value="0" @if($product) @if($product->availability==0) selected @endif @endif>Out of stock</option>
                                                                </select>
                                                                @error('availability')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="min_qty">Min Quantity (Optional)</label>
                                                                <input value="@if($product){{ $product->min_qty }}@else{{ old('min_qty')}}@endif" class="form-control  @error('min_qty') is-invalid @enderror" id="min" name="min_qty" type="number" step="1"  pattern="[0-9]" title="Numbers only" min="1"  >
                                                                @error('min_qty')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-md-4">
                                                                <label for="max_qty">Max Quantity (Optional)</label>
                                                                <input  value="@if($product){{ $product->max_qty }}@else{{ old('max_qty')}}@endif" class="form-control  @error('max_qty') is-invalid @enderror" id="max" name="max_qty" type="number" step="1"  pattern="[0-9]" title="Numbers only" min="1" >
                                                                @error('max_qty')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Product Image</label> <br/>
                                                                    <img src="@if($product){{$product->thumbnailUrl}}@else{{ URL::asset('assets/images/placeholder/image_large-300x300.png') }}@endif" alt="product img" class="img-fluid" id="productThumb" style="width: 230px;height:230px" />
                                                                    <br/>
                                                                    <div class="form-group mt-4 pt-1">
                                                                        <input  @if($product) @else  @endif id="imgInp" name="thumbnail" type="file" class="filestyle " data-buttonname="btn-secondary">
                                                                        @error('thumbnail')
                                                                        <span class="invalid-feedback d-block" role="alert">
                                                                            <strong>{{ $message }}</strong>
                                                                        </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                    
                                                        </div>
                                                    </div>
                                               

                                                    
                                                   
                                                </div>

                                                <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                        </div>
                                    </div>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                           
                                            <h4 class="mt-0 header-title">Product Images</h4>
                                            @error("images")
                                            <p class="text-danger m-b-30 font-14">{{ $message }}</p>
                                            @enderror
                                                <input name="images[]" type="file" accept="image/*" multiple>
                                                @if($product)
                                                <product-images images-arr="{{$product->images}}"></product-images>
                                                @endif
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Save Changes</button>
                                                

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
                                                            <input value="@if($product){{ $product->meta_title }}@endif" id="metatitle" name="metatitle" type="text" class="form-control">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="metakeywords">Meta Keywords</label>
                                                            <input value="@if($product){{ $product->meta_keyword }}@endif" id="metakeywords" name="metakeywords" type="text" class="form-control">
                                                        </div>
                                                    </div>
    
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="metadescription">Meta Description</label>
                                                        <textarea class="form-control" id="metadescription" name="metadescription" rows="5">{{ $product ?  $product->meta_description : ""  }}</textarea>
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

<script src="{{ URL::asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js') }}"></script>
<script src="{{ URL::asset('assets/js/imageuploadify.min.js') }}"></script>
<script src="{{ URL::asset('assets/plugins/summernote/summernote-bs4.js') }}"></script>

@endsection

@section('script-bottom')
<script type="text/javascript">
    // Select2
    //$(".select2").select2();
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
    $(document).ready(function() {
        $('input[type="file"]').imageuploadify();
    })
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 400,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
        });
    });
</script>

@endsection