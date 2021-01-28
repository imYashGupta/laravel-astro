@extends('layouts.master')
@section('title',"Coupons Management")

@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Coupons</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12">
                                    
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="mt-0 header-title">{{$coupon ? 'Update' : 'Add new'}} coupon</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>
                                            <form id="form-action" action="{{ $coupon ? route('coupon.update',$coupon->id) : route("coupon.store") }}" method="POST" >
                                                @csrf
                                                @if($coupon) @method("PATCH") @endif
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="couponCode">Coupon Code</label>
                                                            <input type="text" value="{{ !$coupon ? old('code') : $coupon->code }}" name="code" id="couponCode" class="form-control mr-1 @error('code') is-invalid @enderror">
                                                                @error('code')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                                <button type="button" onclick="randomCoupon(8)" class="btn mt-2 btn-primary flex-1">Genrate </button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group x">
                                                            <label for="couponCode">Description</label>
                                                            <textarea name="description" id="description" cols="30" rows="3" class="form-control @error('description') is-invalid @enderror">{{ !$coupon ? old('description') : $coupon->description }}</textarea>
                                                            @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" >
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="couponCode">Coupon Type</label>
                                                            <select class="form-control @error('type') is-invalid @enderror" name="type" id="type">
                                                                <option value="fixed"  @if($coupon) @if($coupon->type=='fixed') selected @endif @else @if(old('type')=='fixed') selected @endif @endif >Fixed Discount</option>
                                                                <option value="percentage" @if($coupon) @if($coupon->type=='percentage') selected @endif @else @if(old('type')=='percentage') selected @endif @endif>Percentage Discount</option>
                                                            </select>
                                                            @error('type')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="couponCode">Coupon Discount</label>
                                                            <input type="number" value="{{ !$coupon ? old('discount') : $coupon->discount }}" name="discount" class="form-control @error('discount') is-invalid @enderror">
                                                            @error('discount')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="couponCode">Expiry Date</label>
                                                            <input min="{{date("Y-m-d")}}" type="date" value="{{ !$coupon ? old('expire_date') : $coupon->expire_date }}" name="expire_date" class="form-control @error('expire_date') is-invalid @enderror">
                                                            @error('expire_date')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    
                                                   
                                                </div>
                                                <h3 class="mb-3 header-title">Usage information</h3>
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="couponCode">Minimum Amount</label>
                                                            <input type="number" value="{{ !$coupon ? old('min_amount') : $coupon->minimum_amount }}" name="min_amount" class="form-control @error('min_amount') is-invalid @enderror">
                                                            @error('min_amount')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="couponCode">Coupon Usage limit</label>
                                                            <input type="number" value="{{ !$coupon ? old('coupon_limit') : $coupon->coupon_limit }}" name="coupon_limit" class="form-control @error('coupon_limit') is-invalid @enderror" placeholder="leave empty for unlimited usage">
                                                            @error('coupon_limit')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="couponCode">Limit for user</label>
                                                            <input type="number" value="{{ !$coupon ? old('user_limit') : $coupon->user_limit }}" name="user_limit" class="form-control @error('user_limit') is-invalid @enderror" placeholder="leave empty for unlimited usage">
                                                            @error('user_limit')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                               
                                                
                                                <button type="submit" class="btn btn-success waves-effect waves-light ">{{$coupon ? 'Update' : 'Create'}} Coupon</button>
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
    function randomCoupon(length) {
        var result           = '';
        var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for ( var i = 0; i < length; i++ ) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        $("#couponCode").val(result.toUpperCase());
        return;
    }
</script>

@endsection