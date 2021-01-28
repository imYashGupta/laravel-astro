@extends("layouts.web-master")
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
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="contact.php">contact us</a></li>
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
					<p>075021000096<br></p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="ast_contact_info">
					<span><i class="fa fa-envelope-open-o" aria-hidden="true"></i></span>
					<h4>email</h4>
					<p><a href="#">hir21st@gmail.com</a><br><a href="#"></a></p>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="ast_contact_info">
					<span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
					<h4>address</h4>
					<p>6, Aspen Drive, Wembley, HA0 2PW</p>
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
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.665591193351!2d-81.23677798444672!3d28.54976958245048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88e7666b70c7639b%3A0x138d66cd5d424720!2sBloomfield+Dr%2C+Orlando%2C+FL+32825%2C+USA!5e0!3m2!1sen!2sin!4v1501822735922" allowfullscreen></iframe>
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
