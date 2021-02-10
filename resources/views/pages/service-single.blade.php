@extends('layouts.web-master')
@section("title",str_replace("-"," ",ucwords($name)) ." | ".$appData['name']." - ".$appData['title'])
@section('content')
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>{{str_replace("-"," ",ucwords($name))}}</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="{{route("homepage")}}">home</a></li>
					<li>/</li>
					<li><a href="{{ route("services") }}">Services</a></li>
					<li>/</li>
					<li><a href="#">{{str_replace("-"," ",ucwords($name))}}</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Tarot section start-->
<div class="ast_blog_wrapper ast_toppadder80 ast_bottompadder80">
	<div class="container">
		<div class="row">
			<div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
				<div class="ast_blog_box">
					
					<div class="ast_blog_info">
						{!!$service["content"]!!}
					</div>
				</div>
				
				<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 col-md-offset-4 col-xs-offset-3 col-sm-offset-3">
				<a href="{{route("appointment")}}" id="ed_submit" class="ast_btn" style="margin-bottom: 10px;">book now</a>
				</div>
			</div>
			<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
				<div class="ast_blog_img">
					<img src="{{$service["image"]}}" alt="horoscopes" title="Horoscopes">
				</div>
			</div>
		</div>
	</div>
</div>
<!--Tarot section end-->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection