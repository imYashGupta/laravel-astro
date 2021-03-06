@extends("layouts.web-master")
@section("styles")
<meta property="og:url"                content="{{route("product",$product->slug)}}" />
<meta property="og:title"              content="{{$product->name}}" />
<meta property="og:description"        content="{{$product->short_description}}" />
<meta property="og:image"              content="{{$product->thumbnailOrignal()}}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="src/js/slick/slick.css">
<link rel="stylesheet" type="text/css" href="src/js/slick/slick-theme.css">
<style>
	.ast_btn_reverse{
		background-color: #ffffff !important;
		color:#832625 !important;
		display: inline-block;
		height: 45px;
		line-height: 43px;
		padding: 0px 20px;
		min-width: 130px;
		text-transform: capitalize;
		border: 1px solid #832625;
		border-radius: 3px;
		text-align: center;
		-webkit-transition: all 0.5s;
		-moz-transition: all 0.5s;
		-ms-transition: all 0.5s;
		-o-transition: all 0.5s;
		transition: all 0.5s;
	}

	/* .ast_btn_reverse:hover, .ast_btn_reverse:focus {
    background-color: #832625 !important;
    color: #ffffff !important;
    border: 1px solid #832625;
    outline: none;
    box-shadow: none;
    -webkit-transition: all 0.5s;
    -moz-transition: all 0.5s;
    -ms-transition: all 0.5s;
    -o-transition: all 0.5s;
    transition: all 0.5s;
} */

.d-inline-block{
	display: inline;
}

.select-opt{
	float: left;
    width: 100%;
    height: 45px;
    padding: 0px 15px;
    border: 1px solid #e1e1e1;
    margin-bottom: 15px
}
</style>

@endsection
@section('content')

<!-- Your share button code -->


<!-- Header End -->
<!--Breadcrumb start-->
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>Product</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li>/</li>
					<li><a href="{{route("shop")}}">Shop</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->

<!-- product Description section Start -->
<div class="ast_proSingle_wrapper ast_toppadder70 ast_bottompadder40">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="product_detail_wrap">
					<!-- product details Start -->
					<div class="product_detail_cover">
						<div class="row">
							<div class="col-sm-4 col-xs-12">
								<div class="product_slider">
									<!-- slides -->

									<div class="pro_slides_carousel">
                                        <div class="slick_item">
                                            <img src="{{$product->thumbnailOrignal()}}" class="img-responsive" />
                                        </div>
										@foreach ($product->images as $image)
										<div class="slick_item">
											<img src="{{$image->url}}" class="img-responsive" />
										</div>
										@endforeach
									</div>

									<div class="pro_slider_thumbs">
                                        <div class="pro_thumb">
                                            <img src="{{$product->thumbnailUrl}}" class="img-responsive" />
                                        </div>
										@foreach ($product->thumbnails as $image)

										<div class="pro_thumb">
											<img src="{{$image->url}}" class="img-responsive" />
										</div>
										@endforeach

									</div>
								</div>
							</div>
							<div class="col-sm-8 col-xs-12">
								<div class="product_description">
									<h3>{{$product->name}}</h3>
									<div class="product_rating">
										<span class="ref_number">Ref No. #{{$product->id}}</span>
										@if (!is_null($product->rating))
										<span class="rating_star">
											@for ($i = 0; $i < $product->rating; $i++)
											<i class="fa fa-star" aria-hidden="true"></i>
											@endfor
											@for ($i = 0; $i < 5-$product->rating; $i++)
											<i class="fa fa-star-o" aria-hidden="true"></i>
											@endfor
										</span>

										@endif
									</div>
									<h2 style="margin: 0;margin-bottom: 15px;color:#832625">&#163;{{$product->price}} @if($product->discount!=0)<small class="cross-text">&#163;{{ $product->actualPrice }}</small>@endif </h2>
									<h3><i aria-hidden="true" class="fa fa-phone"></i> You may also call us at  <a class="text-primary" href="tel:{{ $appData["phone"] }}">{{ $appData["phone"] }}</a> to order</h3>
									<p>{{ $product->short_description }}</p>
									<div class="stock_details">{{ $product->units }} In Stock</div>
									<div class="prod_quantity">QTY <input type="number" name="quantity" id="quantity" value="{{!is_null($product->min_qty) ? $product->min_qty : 1}}" min="{{!is_null($product->min_qty) ? $product->min_qty : 1}}" @if(!is_null($product->max_qty)) max="{{$product->max_qty}}" @endif/></div>
									<div class="product_buy">
										<form action="{{ route("cart.add") }}" method="POST" class="d-inline-block">
											@csrf
											<input type="hidden" name="product" value="{{$product->id}}">
											<input type="hidden" name="qty" value="{{$product->min_qty ? $product->min_qty : 1}}">
											{{-- <button type="submit" class="buy_btn ast_btn" value="Buy Now">Buy Now</button> --}}
										</form>
										<add-to-cart-btn readqty="true" product='{{ json_encode($product->only("id","slug","price","name","thumbnailUrl","min_qty","max_qty","units")) }}'></add-to-cart-btn>
										<a href="#" onclick="share_fb('{{ route('product',$product->slug) }}');return false;" rel="nofollow" share_url="http://urlhere.com/test/55d7258b61707022e3050000" target="_blank"    style="background: #4267B2;color: white;border: #4267B2;" class="btn ast_btn" >Share on facebook
									    	<i class="fa fa-facebook" aria-hidden="true"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- product details End -->
					<!-- product description tabs -->
					<div class="product_desc_tabs">
						<ul class="tabs">
							<li class="tab-link current" data-tab="tab-1">descriptions</li>
							<li class="tab-link " data-tab="tab-2">reviews</li>
						</ul>
						<div class="product_tab_content">
							<div id="tab-1" class="tab_content  current">
								<h4>Discription </h4>
								{!! $product->description!!}
							</div>
							<div id="tab-2" class="tab_content ">
								<review-form product-name="{{$product->name}}" reviews='@json($reviews)' route="{{ route("product.addReview",$product->slug) }}" authenticated="{{auth()->check() ? json_encode(["email" => auth()->user()->email,"name" => auth()->user()->name]) : 'false'}}"></review-form>
							</div>
						</div>
					</div>
					<!-- product description tabs -->
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ast_related_pro ast_toppadder70">
					<div class="ast_heading">
						<h1>related  <span>products</span></h1>
					</div>
					<div class="owl-carousel owl-theme">
						@foreach ($relatedProducts as $product)
						<div class="item">
							<div class="ast_product_section">
								<div class="ast_product_image">
									<a href="{{ route("product",$product->slug) }}"><img src="{{$product->thumbnailUrl}}" class="img-responsive"></a>
								</div>
								<div class="ast_product_info">
										@if (!is_null($product->rating))
											@for ($i = 0; $i < $product->rating; $i++)
											<i class="fa fa-star" aria-hidden="true"></i>
											@endfor
											@for ($i = 0; $i < 5-$product->rating; $i++)
											<i class="fa fa-star-o" aria-hidden="true"></i>
											@endfor

										@endif
									<h4 class="ast_shop_title"><a href="{{ route("product",$product->slug) }}">{{$product->name}}</a></h4>
									<p>&#163;{{$product->price}} @if($product->discount!=0)<small class="cross-text">&#163;{{ $product->actualPrice }}</small>@endif</p>

									<div class="ast_info_bottom">
										<add-to-cart-btn   product='{{ json_encode($product->only("id","slug","price","name","thumbnailUrl","min_qty","max_qty","units")) }}'></add-to-cart-btn>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- product Description section End -->

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">

	</div>
</div>

@endsection
@section('scripts')

<script type="text/javascript" src="src/js/price_range_script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="src/js/slick/jquery-migrate-1.2.1.min.js">
</script>
<script type="text/javascript" src="src/js/slick/slick.min.js"></script>
<script>


	$("#quantity").on("keypress",function(){
		return false;
	})

	function share_fb(url) {
  window.open('https://www.facebook.com/sharer/sharer.php?u='+url,'facebook-share-dialog',"width=626, height=436")
}
</script>
<!--Main js file End-->
@endsection
