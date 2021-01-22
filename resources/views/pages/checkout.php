<?php include 'includes/style.php';?>

<body>
<!-- Header Start -->
<?php include 'includes/header.php';?>
<!-- Header End -->  
<!--Breadcrumb start-->
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>checkout</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="#">checkout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->

<!-- Mens section Start -->
<div class="ast_checkout_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-sm-12 col-xs-12 col-lg-offset-1">
				<div class="checkout_wrapper_box">
				  <ul id="progressbar">
						<li class="active">Billing Details</li>
						<li>Payment</li>
						<li>Receipt</li>    
					</ul>
					<div class="woocommerce_billing step">
						<div class="row">
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="First Name*" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Last Name*" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Phone*" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Email*" class="form-control">
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<select class="form-control">
										<option>Country</option>
										<option>U.K.</option>
										<option>India</option>
										<option>Australia</option>
										<option>Japan</option>
										<option>Africa</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<select class="form-control">
										<option>State</option>
										<option>England</option>
										<option>Madhya Pradesh</option>
										<option>Victoria</option>
										<option>Hiroshima</option>
										<option>Liberia</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<select class="form-control">
										<option>City</option>
										<option>London</option>
										<option>Delhi</option>
										<option>Sydney</option>
										<option>Tokyo</option>
										<option>Arthington</option>
									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6">
								<div class="form-group">
									<input type="text" placeholder="Pincode*" class="form-control">
								</div>
							</div>
							<div class="col-lg-12 col-md-12">
								<div class="form-group">
									<textarea placeholder="Address*" class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="form-group checkbox">
							<label>Ship To This Address
								<input type="checkbox">
								<span class="checkmark"></span>
							</label>
						</div>
						<button class="ast_btn next">Next</button>
					</div>
					<div class="woocommerce_billing step">
						<div class="row">
							<div class="col-md-6 col-xs-12">
								<div class="ast_check_payment_method">
									<div class="form-group">
										<label>Debit Card</label>
										<input type="text" class="form-control" placeholder="Card Holder Name">
										<input type="text" class="form-control" placeholder="card number">
										<input type="text" class="form-control" placeholder="Security Code">
										<div class="expiry_date">
											<label>Expiry Date</label>
											<select class="form-control">
												<option>Mon</option>
												<option>01</option>
												<option>02</option>
												<option>03</option>
												<option>04</option>
												<option>05</option>
												<option>06</option>
												<option>07</option>
												<option>08</option>
												<option>09</option>
												<option>10</option>
												<option>11</option>
												<option>12</option>
											</select>
											<select class="form-control">
												<option>Year</option>
												<option>2018</option>
												<option>2018</option>
												<option>2019</option>
												<option>2020</option>
												<option>2021</option>
												<option>2022</option>
												<option>2023</option>
												<option>2024</option>
												<option>2025</option>
												<option>2026</option>
												<option>2027</option>
												<option>2028</option>
												<option>2029</option>
												<option>2030</option>
												<option>2031</option>
												<option>2032</option>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-xs-12">
								<div class="ast_check_payment_method">
									<div class="form-group">
										<label>Credit Card</label>
										<input type="text" class="form-control" placeholder="Card Holder Name">
										<input type="text" class="form-control" placeholder="card number">
										<input type="text" class="form-control" placeholder="Security Code">
										<div class="expiry_date">
											<label>Expiry Date</label>
											<select class="form-control">
												<option>Mon</option>
												<option>01</option>
												<option>02</option>
												<option>03</option>
												<option>04</option>
												<option>05</option>
												<option>06</option>
												<option>07</option>
												<option>08</option>
												<option>09</option>
												<option>10</option>
												<option>11</option>
												<option>12</option>
											</select>
											<select class="form-control">
												<option>Year</option>
												<option>2018</option>
												<option>2018</option>
												<option>2019</option>
												<option>2020</option>
												<option>2021</option>
												<option>2022</option>
												<option>2023</option>
												<option>2024</option>
												<option>2025</option>
												<option>2026</option>
												<option>2027</option>
												<option>2028</option>
												<option>2029</option>
												<option>2030</option>
												<option>2031</option>
												<option>2032</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
						<button class="ast_btn next">Pay</button>
					</div>
					<div class="woocommerce_checkout_receipt step">
						<h1>THANK YOU FOR YOUR ORDER!</h1>
						<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
						<a href="#" class="ast_btn receipt_btn">Print Receipt</a>
						<a href="#" class="ast_btn receipt_btn">Email Receipt</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Mens section End --> 

<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
<!-- Download wrapper End-->

<!-- Footer wrapper start-->
<?php include 'includes/footer.php';?>

<!-- Footer wrapper End-->
<!--Main js file Style--> 
<?php include 'includes/script.php';?>

<script type="text/javascript" src="js/price_range_script.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script type="text/javascript" src="js/step.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!--Main js file End-->
</body>
</html>