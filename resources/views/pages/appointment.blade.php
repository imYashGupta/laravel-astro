@extends("layouts.web-master")
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
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="appointment.php">appointment</a></li>
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
					<form>
						<h3>appointment form</h3>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>name</label>
							<input type="text" placeholder="Name">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>email</label>
							<input type="text" placeholder="Email">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>mobile nmber</label>
							<input type="text" placeholder="Mobile Number">
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>gender</label>
							<select>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>time of day</label>
							<select>
								<option value="1"> Morning </option>
								<option value="2">Afternoon</option>
								<option value="3">Evening </option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>way to reach</label>
							<select>
								<option value="1">Phone </option>
								<option value="2">Email</option>
							</select>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>Preferred  Date</label>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<input type="text" placeholder="Date">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<input type="text" placeholder="Month">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<input type="text" placeholder="Year">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>Preferred Time</label>
							<div class="row">
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<input type="text" placeholder="Hrs">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<input type="text" placeholder="Mins">
								</div>
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<input type="text" placeholder="Sec">
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>address</label>
							<textarea placeholder="Address" rows="4"></textarea>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<label>Reason for appointment</label>
							<textarea placeholder="Message" rows="4"></textarea>
						</div>
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<button type="button" class="ast_btn pull-right">make an appointment</button>
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
