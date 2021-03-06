@extends("layouts.web-master")
@section("title","Appointment | ".$appData['name']." - ".$appData['title'])
@section('styles')
	<style>
		.is-error{
			border: 1px solid #832625 !important;
			margin-bottom: 0 !important;
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
					<h2>appointment</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="{{route('homepage')}}">home</a></li>
					<li>/</li>
					<li><a href="{{route('appointment')}}">appointment</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Journal Start-->
<div class="ast_journal_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ast_journal_info">
					<h3>make your appointment to discuss any problem.</h3>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
					<p>It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ast_journal_box_wrapper">
					<form method="POST" action="{{ route("appointments.store") }}">
						<h3>appointment form</h3>
						@csrf
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="name">name</label>
							<input type="text" value="{{ old("name") }}" placeholder="Name" name="name" id="name" @error("name") class="is-error" @enderror >
							@error('name')
								<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="email">email</label>
							<input type="email" value="{{ old("email") }}" placeholder="Email" name="email" id="email" @error("email") class="is-error" @enderror>
							@error('email')
								<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="phone">mobile nmber</label>
							<input type="text" value="{{ old("phone") }}" placeholder="Mobile Number" name="phone" id="phone" @error("phone") class="is-error" @enderror>
							@error('phone')
								<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="gender">gender</label>
							<select name="gender" id="gender" @error("gender") class="is-error" @enderror>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							@error('gender')
								<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<checkout-country-state 
							label="true"
							data-countries="{{ $countries }}"
							@error('country') country-error="{{$message}}" @enderror
							@error('state') state-error="{{$message}}" @enderror
							@error('city') city-error="{{$message}}" @enderror
							@if(old("country")) country="{{ old("country") }}" @endif
							@if(old("state")) state="{{ old("state") }}" @endif
							@if(old("city")) city="{{ old("city") }}" @endif
							>
						</checkout-country-state>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label for="pincode">Pincode</label>
							<input type="text" value="{{ old("pincode") }}" placeholder="Pincode" name="pincode" id="pincode" @error("pincode") class="is-error" @enderror>
							@error('pincode')
								<span class="invalid-feedback d-block" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button type="submit" class="ast_btn pull-right">make an appointment</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--Journal End-->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection
