@extends('layouts.master')
@section('title',"Review Edit")
@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Review Edit</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">User Review</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>

                                            <form id="form-action" action="{{ route("review.update",$review->id) }}" method="POST" >
                                                @method("PATCH")
                                                @csrf
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="review">Review</label>
                                                            <textarea class="form-control @error('review') is-invalid @enderror" id="review" name="review" rows="5">{{ $review->review }}</textarea>
                                                            @error('review')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="metatitle">Rating</label>
                                                            <select name="rating" class="form-control @error('rating') is-invalid @enderror" id="ratings">
                                                                <option @if($review->rating==5) selected @endif value="5">5</option>
                                                                <option @if($review->rating==4) selected @endif value="4">4</option>
                                                                <option @if($review->rating==3) selected @endif value="3">3</option>
                                                                <option @if($review->rating==2) selected @endif value="2">2</option>
                                                                <option @if($review->rating==1) selected @endif value="1">1</option>
                                                            </select>
                                                            @error('rating')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="metakeywords">Status</label>
                                                            <select name="status" class="form-control @error('status') is-invalid @enderror" id="rating">
                                                                <option @if($review->status==1) selected @endif value="1">Approved</option>
                                                                <option @if($review->status==0) selected @endif value="0">Decline</option>
                                                            </select>
                                                            @error('status')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" id="name" value="{{ $review->name }}" class="form-control @error('name') is-invalid @enderror">
                                                            @error('name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="review">Email</label>
                                                            <input type="text" name="email" id="email" value="{{ $review->email }}" class="form-control @error('email') is-invalid @enderror">
                                                            @error('email')
                                                            <span class="invalid-feedback" role="alert">
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