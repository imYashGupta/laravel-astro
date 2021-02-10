@extends('layouts.web-master')
@section("title","About us | ".$appData['name']." - ".$appData['title'])
@section('content')
	
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>About Us</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
				<li><a href="{{route('homepage')}}">home</a></li>

					<li>/</li>
					<li><a href="{{route("about")}}">About us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--About Us Start-->
<div class="ast_about_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>about <span>Paathway</span></h1>
					<!-- <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p> -->
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12 col-lg-push-7 col-md-push-7 col-sm-push-7 col-xs-push-0">
				<div class="ast_about_info_img">
					<img src="src/images/content/about/about.jpg" alt="About">
				</div>
			</div>
			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 col-lg-pull-5 col-md-pull-5 col-sm-pull-5 col-xs-pull-0">
				<div class="ast_about_info">
					<!-- <h4>know about Paathway</h4> -->
					{!!$about["content"]!!}
					<!-- <a href="about.php" class="ast_btn">know more</a> -->
				</div>
			</div>
		</div>
	</div>
</div>
<!--About Us End-->
<!--WhyWe Us Start-->
<div class="ast_whywe_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>why  <span>choose us</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
			<div class="ast_whywe_info">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="ast_whywe_info_box">
						<span><img src="src/images/content/ww_1.png" alt=""></span>
						<div class="ast_whywe_info_box_info">							
							<p>90+ Expert Astrologers</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="ast_whywe_info_box">
						<span><img src="src/images/content/ww_2.png" alt=""></span>
						<div class="ast_whywe_info_box_info">
							<p>24x7, 365 Days Availability</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="ast_whywe_info_box">
						<span><img src="src/images/content/ww_3.png" alt=""></span>
						<div class="ast_whywe_info_box_info">
							<p>Instant Access Worldwide</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="ast_whywe_info_box">
						<span><img src="src/images/content/ww_4.png" alt=""></span>
						<div class="ast_whywe_info_box_info">
							<p>Accurate Remedial Solutions</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="ast_whywe_info_box">
						<span><img src="src/images/content/ww_5.png" alt=""></span>
						<div class="ast_whywe_info_box_info">
							<p>Privacy Guaranteed</p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
					<div class="ast_whywe_info_box">
						<span><img src="src/images/content/ww_6.png" alt=""></span>
						<div class="ast_whywe_info_box_info">
							<p>Trusted by million+ clients</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--WhyWe Us End-->
<!--Timer Section start -->
 
<!--Timer Section end -->
<!-- Testimonials Start-->
<div class="ast_testimonial_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>what client<span> says</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_testimonials_slider">
					<div class="owl-carousel owl-theme">
						@foreach ($testimonials as $item)
					<div class="item">
						<div class="ast_testimonials_slider_box " style="text-align: center;">
							<!-- <img src="{{$item->imageUrl}}" alt="Testimonial"> -->
							<div class="ast_testimonials_slider_box_text">
								<p>{{ $item->description }}.</p>
								<h4>{{$item->name}}, <span>{{$item->designation}}</span></h4>
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
<!-- Testimonials End-->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection
