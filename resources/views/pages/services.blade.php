@extends("layouts.web-master")
@section("title","Services | ".$appData['name']." - ".$appData['title'])

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
					<li><a href="{{route("homepage")}}">home</a></li>
					<li>/</li>
					<li><a href="{{route("services")}}">services</a></li>
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

<!--Timer Section end -->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection
