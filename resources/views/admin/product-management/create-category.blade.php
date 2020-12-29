@extends('layouts.master')

@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Product Management</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">{{$category ? "Edit" : "Create"}} Category</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>
                                            <form action="{{ $category ? route("category.update",$category) : route("category.store") }}" method="POST">
                                                @csrf
                                                @if($category) @method("PATCH") @endif
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="name">Category Name</label>
                                                            <input value="{{ $category ? $category->name : "" }}" id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror">
                                                            @error('name')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="status">Status</label> 
                                                            <select name="status" class="form-control @error('status') is-invalid @enderror"> 
                                                                <option {{ $category ? $category->status==1 ? "selected" : '' : '' }} value="1">Active</option>
                                                                <option {{ $category ? $category->status==0 ? "selected" : '' : '' }} value="0">Disable</option>
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
                                                            <label for="description">Meta Description</label>
                                                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="5">{{ $category ? $category->description : "" }}</textarea>
                                                            @error('description')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
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
<script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}" type="text/javascript"></script>


@endsection

@section('script-bottom')
<script type="text/javascript">
    // Select2
    $(".select2").select2();
</script>

@endsection

