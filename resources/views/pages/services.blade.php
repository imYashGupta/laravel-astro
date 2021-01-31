@extends("layouts.web-master")
@section('content')
	
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>services</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="services.php">services</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Services Start-->
<div class="ast_service_wrapper ast_toppadder70 ast_bottompadder50">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>our <span>services</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
			@foreach ($services as $service)
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="ast_service_box">
					<img src="{{ $service->main }}" alt="Service">
					<h4>{{ str_replace("-"," ",ucwords($service->name)) }}</h4>
					<p>{{ $service->description }}</p>
					<div class="clearfix"></div>
					<a href="/services/{{ $service->name }}" class="ast_btn">read more</a>
				</div>
			</div>
			@endforeach
			 
		</div>
	</div>
</div>
<!--Services End-->
<!--WeDo Start-->

<!--WeDo End-->
<!--Timer Section start -->
<div class="ast_timer_wrapper ast_toppadder70 ast_bottompadder40">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>now <span>we have</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
			<div class="ast_counter_wrapper">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="ast_counter">
						<span><img src="src/images/content/timer_1.png" alt="timer"></span>
						<h2 class="timer" data-from="0" data-to="200" data-speed="5000"></h2>
						<h4>Offices Worldwide</h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="ast_counter">
						<span><img src="src/images/content/timer_2.png" alt="timer"></span>
						<h2 class="timer" data-from="0" data-to="800" data-speed="5000"></h2>
						<h4>skilled Astrologers</h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="ast_counter">
						<span><img src="src/images/content/timer_3.png" alt="timer"></span>
						<h2 class="timer" data-from="0" data-to="60" data-speed="5000"></h2>
						<h4>Countries Covered</h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
					<div class="ast_counter">
						<span><img src="src/images/content/timer_4.png" alt="timer"></span>
						<h2 class="timer" data-from="0" data-to="30" data-speed="5000"></h2>
						<h4>Years of Experiences</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Timer Section end -->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection
