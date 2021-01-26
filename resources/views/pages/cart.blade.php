@extends("layouts.web-master")
@section('content')
	

<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>cart</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="#">cart</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end--> 

<!-- Cart section Start -->
<div class="ast_cart_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<cart coupon-data="{{ $coupon!=false ? json_encode($coupon->only(["code","description","subtotal","discountAmount_str","message"])) : 'false' }}"  auth="{{ auth()->check() }}" cart='{{json_encode($cart)}}'></cart>
			</div>
		</div>
	</div>
</div>
<!-- cart section end --> 

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
<!-- Download wrapper End-->
@endsection

 @section('scripts')
	 
 
 <script type="text/javascript" src="src/js/price_range_script.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
 @endsection
 

 

