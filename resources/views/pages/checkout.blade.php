@extends("layouts.web-master")
@section('styles')
	<style>
		.is-error{
			border: 1px solid #832625 !important;
		}
	</style>	
@endsection
@section("content")
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>checkout</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="#">checkout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->

<!-- Mens section Start -->
<div class="ast_checkout_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-sm-12 col-xs-12 col-lg-offset-1">
				<div class="checkout_wrapper_box">
				  <ul id="progressbar">
						<li class="active">Billing Details</li>
						{{-- <li>Receipt</li>     --}}
					</ul>
					<div class="woocommerce_billing step">
						<form action="{{ route("checkout.store") }}" method="POST">
							@csrf
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" value="{{ old("firstname") }}" name="firstname" placeholder="First Name*" class="form-control @error('firstname') is-error @enderror" >
									@error('firstname')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" value="{{ old("lastname")  }}" name="lastname" placeholder="Last Name*" class="form-control @error('lastname') is-error @enderror">
									@error('lastname')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" value="{{ old("phone") }}" name="phone" placeholder="Phone*" class="form-control @error('phone') is-error @enderror">
									@error('phone')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" value="{{ old("email") }}" name="email" placeholder="Email*" class="form-control @error('email') is-error @enderror">
									@error('email')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<checkout-country-state data-countries="{{ $countries }}"
							@error('country') country-error="{{$message}}" @enderror
							@error('state') state-error="{{$message}}" @enderror
							@error('city') city-error="{{$message}}" @enderror
							@if(old("country")) country="{{ old("country") }}" @endif
							@if(old("state")) state="{{ old("state") }}" @endif
							@if(old("city")) city="{{ old("city") }}" @endif
							></checkout-country-state>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" value="{{ old("pincode") }}" name="pincode" placeholder="Pincode*" class="form-control  @error('pincode') is-error @enderror">
									@error('pincode')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<textarea placeholder="Address*" name="address" class="form-control  @error('address') is-error @enderror">{{old("address")}}</textarea>
									@error('address')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
								</div>
							</div>
						</div>
						<div class="form-group checkbox">
							<label> I have read and agree to the website terms and conditions
								<input type="checkbox" name="terms"   >
								<span class="checkmark"></span>
							</label>
							@error('terms')
									<span class="invalid-feedback d-block" role="alert">
										<strong>{{ $message }}</strong>
									</span>
									@enderror
						</div>
						<button class="ast_btn next" type="submit">Next</button>
					</form>
					</div>
					 
				{{-- 	<div class="woocommerce_checkout_receipt step">
						<h1>THANK YOU FOR YOUR ORDER!</h1>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
						<a href="#" class="ast_btn receipt_btn">Print Receipt</a>
						<a href="#" class="ast_btn receipt_btn">Email Receipt</a>
					</div> --}}
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Mens section End --> 

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
 @endsection
 @section('scripts')
	 
 <script type="text/javascript" src="src/js/price_range_script.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
 {{-- <script type="text/javascript" src="src/js/step.js"></script> --}}
 <script type="text/javascript" src="src/js/custom.js"></script>
 @endsection
 