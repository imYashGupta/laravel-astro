@extends("layouts.web-master")
@section("title",$title)
@section('styles')
	<style>
		.is-error{
			border: 1px solid #832625 !important;
		}
	</style>	
@endsection
@section("content")
 
<!--Breadcrumb end-->

<!-- Mens section Start -->
<div class="ast_checkout_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-sm-12 col-xs-12 col-lg-offset-1">
				<div class="checkout_wrapper_box">
				  <ul id="progressbar">
					</ul>
				 
					 
					<div class="woocommerce_checkout_receipt step">
						<h1>{{$title}}</h1>
                        <p>{{ $message }}</p>
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
 