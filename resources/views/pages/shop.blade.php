@extends("layouts.web-master")
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
 
@endsection
@section("content")
<!--Breadcrumb start-->
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>shop</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="/">home</a></li>
					<li>//</li>
					<li><a href="/shop">shop</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->  

<!-- shop section start -->
<div class="ast_shop_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
		    	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
				<div class="ast_shop_sidebar sidebar_wrapper">
					{{-- <aside class="widget widget_search">
						<input type="text" placeholder="Search...">
						<button type="button"><i class="fa fa-search"></i></button>
					</aside>   --}}
					<form action="{{ Request::getRequestUri()}}">

						<aside class="widget widget_filter">
							<h4 class="widget-title">filter by price</h4>
							<div id="slider-range" class="price-filter-range" name="rangeInput"></div>
							
							<div class="filter_input">
								@if(Request::has("category"))
									<input type="hidden" name="category" value="{{Request::get("category")}}">
								@endif
								<input name="min" @if(Request::has("min")) values="{{ Request::get("min") }}" @endif type="text" min="0" max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
								<input name="max" @if(Request::has("max")) values="{{ Request::get("max") }}" @endif type="text" min="0" max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
							</div>
							<button class="price-range-search ast_btn" id="price-range-submit">Search </button>
						</aside>
					</form>
						<aside class="widget widget_categories">
						<h4 class="widget-title">Categories</h4>
						<ul>
							<li><a href="{{route("shop")}}">All Products</a></li>
							@foreach ($categories as $category)
							<li><a class="{{ Request::has("category") ? Request::get('category')==$category->slug ? 'text-primary' : '' : ''}}" href="{{route("shop")}}?category={{$category->slug}}">{{$category->name}}</a></li>
							@endforeach
				 
						</ul>
					</aside>
					<!--<aside class="widget widget_latest_product">-->
					<!--	<h4 class="widget-title">new products</h4>-->
					<!--	<ul>-->
					<!--		<li><a href="#">gemstone</a></li>-->
					<!--		<li><a href="#">navgraha yantra</a></li>-->
					<!--		<li><a href="#">rings</a></li>-->
					<!--		<li><a href="#">yantra</a></li>-->
					<!--		<li><a href="#">books</a></li>-->
					<!--	</ul>-->
					<!--</aside>-->
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<div class="row">
					<div class="ast_shop_main">
					 
						@forelse($products as $product)
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
							<div class="ast_product_section">
								<div class="ast_product_image">
									<a href="{{route("product",$product->slug)}}">
										<img src="{{$product->thumbnailUrl}}" class="img-responsive"></a>
								</div>
								<div class="ast_product_info">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<h4 class="ast_shop_title"><a href="{{route("product",$product->slug)}}">{{$product->name}}</a></h4>
									<p>&#128;{{$product->price}}</p>
									<div class="ast_info_bottom">
										

										<add-to-cart-btn   product='{{ json_encode($product->only("id","slug","price","name","thumbnailUrl","min_qty","max_qty","units")) }}'></add-to-cart-btn>
									</div>
								</div>
							</div>
						</div>
						@empty
						<h3>No Products Fount!</h3>
						@endforelse

						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="ast_pagination">
								{{ $products->appends($_GET)->links()}}
								{{-- <ul class="pagination">
									<li><a href="#">1</a></li>
									<li><a href="#">2</a></li>
									<li><a href="#">3</a></li>
									<li><a class="active" href="#">Next</a></li>
								</ul> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</div>
	</div>
</div>
<!-- shop section end -->

 <!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20  ">
	<div class="container">
		
	</div>
</div>
@endsection

@section('scripts')
 <script type="text/javascript" src="{{URL::asset("src/js/price_range_script.js")}}"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
 <script>
	 var min = {{ Request::has('min') ? Request::get('min') : 0  }};
	 var max = {{ Request::has('max') ? Request::get('max') : 10000  }};
	$(function () {
		$("#slider-range").slider({
			range: true,
			orientation: "horizontal",
			min: 0,
			max: 10000,
			values: [min, max],
			step: 100,

			slide: function (event, ui) {
			if (ui.values[0] == ui.values[1]) {
				return false;
			}
			
			$("#min_price").val(ui.values[0]);
			$("#max_price").val(ui.values[1]);
			}
		});

		$("#min_price").val($("#slider-range").slider("values", 0));
		$("#max_price").val($("#slider-range").slider("values", 1));

	});
 </script>
@endsection

 