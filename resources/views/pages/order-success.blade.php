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
						<li class="active">Order Complete</li>
					</ul>
				 
					 
					<div class="woocommerce_checkout_receipt step">
						<h1>THANK YOU FOR YOUR ORDER!</h1>
						<p>We have received your request And it will be processed shortly. Thank you for purchasing our product. Your support and trust in us are much appreciated.</p>
						<a href="{{ route("user.order.token",request()->token) }}" class="ast_btn receipt_btn">View Order</a>
					</div>
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
 