@extends('layouts.master')

@section('css')
<!-- Select 2 -->
<link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('breadcrumb')
<h3 class="page-title">Shipping Management</h1>
@endsection

@section('content')
            <div class="page-content-wrapper">
                        <div class="container-fluid">
           @include('components.alert')

                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title">{{$shipping ? "Edit" : "Create"}} shipping</h4>
                                            <p class="text-muted m-b-30 font-14">Fill all information below</p>
                                            <form action="{{ $shipping ? route("shipping.update",$shipping) : route("shipping.store") }}" method="POST">
                                                @csrf
                                                @if($shipping) @method("PATCH") @endif
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="state">State</label>
                                                            <input value="{{ $shipping ? $shipping->state : old("state") }}" id="state" name="state" type="text" class="form-control @error('state') is-invalid @enderror">
                                                            @error('state')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="name">City</label>
                                                            <input value="{{ $shipping ? $shipping->city : old("city") }}" id="city" name="city" type="text" class="form-control @error('city') is-invalid @enderror">
                                                            @error('city')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="name">Pincode</label>
                                                            <input value="{{ $shipping ? $shipping->pincode : old("pincode") }}" id="pincode" name="pincode" type="text" class="form-control @error('pincode') is-invalid @enderror">
                                                            @error('pincode')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-3" v-if="!freeDelivery">
                                                        <div class="form-group">
                                                            <label for="name">Amount</label>
                                                            <input value="{{ $shipping ? $shipping->amount : old("amount") }}" id="amount" name="amount" type="text" class="form-control @error('amount') is-invalid @enderror">
                                                            @error('amount')
                                                                <span class="invalid-feedback d-block" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 mb-3" >
                                                        <div class="form-check">
                                                            <input v-model="freeDelivery" name="free_delivery" type="checkbox" class="form-check-input" id="free_delivery">
                                                            <label class="form-check-label" for="free_delivery">Free Delivery?</label>
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

