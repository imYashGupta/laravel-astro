@extends("layouts.web-master")
@section("title","Contact Us | ".$appData['name']." - ".$appData['title'])
@section('styles')
	<style>
		.response{
			color: #832625;
    padding-left: 15px;
		}
	</style>
@endsection
@section('content')
	
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>contact Us</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="{{route("homepage")}}">home</a></li>
					<li>/</li>
					<li><a href="{{route('contact-us')}}">contact us</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Content Us Start-->
<div class="ast_contact_wrapper ast_toppadder70 ast_bottompadder50">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>get in <span>touch</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="ast_contact_info">
					<span><i class="fa fa-phone" aria-hidden="true"></i></span>
					<h4>phone</h4>
					<p>{{$appData["phone"] }}<br></p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="ast_contact_info">
					<span><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
					<h4>email</h4>
					<p><a href="#">{{$appData["email"] }}</a><br><a href="#"></a></p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="ast_contact_info">
					<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					<h4>address</h4>
					<p>{{$appData["address"] }}</p>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Content Us End-->
<!--Content Us Start-->
<div class="ast_mapnform_wrapper ast_toppadder70" id="form-show">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_heading">
					<h1>find & message <span>here</span></h1>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected hummer.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="ast_contact_map">
		<div class="col-lg-6 col-md-8 col-sm-8 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-2 col-xs-offset-0">
			<div class="ast_contact_form">
				<form method="POST" id="contact-form" action="{{ route("enquiry.store") }}">
					@csrf
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label>first name</label>
						<input value="{{ old("firstname") }}" type="text" name="firstname" class="require">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label>last name</label>
						<input value="{{ old("lastname") }}" type="text" name="lastname" class="require">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label>email</label>
						<input value="{{ old("email") }}" type="text" name="email" class="require" data-valid="email" data-error="Email should be valid.">
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<label>subject</label>
						<input value="{{ old("subject") }}" type="text" name="subject" class="require">
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<label>message</label>
						<textarea rows="5" name="message" class="require">{{ old("message") }}</textarea>
					</div>
					<div class="response">
						@if ($errors->any())
							{{$errors->first()}}
						@endif
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<button class="ast_btn pull-right submitForm" type="button" form-type="contact">send</button>
					</div>
				</form>
			</div>
		</div>
		<iframe src="{{$appData['map_data'] }}" allowfullscreen></iframe>
	</div>
</div>
<!--Content Us End-->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection
@section('scripts')
	@if(session()->has("success"))
	<script>
		swal("Thank You!", "for contacting us – we will get back to you soon!", "success");
	</script>
	@endif
@endsection
