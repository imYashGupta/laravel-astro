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
					<h2>cart</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="#">cart</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end--> 

<!-- Cart section Start -->
<div class="ast_cart_wrapper ast_toppadder70 ast_bottompadder70">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xs-12">
				<div class="table-responsive cart_table">
					<table class="table">
						<tr>
							<th>Products</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Total</th>
							<th>Action</th>
						</tr>
						<tr>
							<td>
								<span class="prod_thumb">
									<img src="http://via.placeholder.com/59x59" alt="" class="img-responsive" />
								</span>
								<div class="product_details">
									<h4><a href="#">Rudraksha</a></h4>
								</div>
							</td>
							<td>$300</td>
							<td><input type="number" name="pro_quantity" class="pro_quantity" value="1"></td>
							<td>$300</td>
							<td>
								<span class="close_pro"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="prod_thumb">
									<img src="http://via.placeholder.com/59x59" alt="" class="img-responsive" />
								</span>
								<div class="product_details">
									<h4><a href="#">Rudraksha</a></h4>
								</div>
							</td>
							<td>$299</td>
							<td><input type="number" name="pro_quantity" class="pro_quantity" value="2"></td>
							<td>$299</td>
							<td>
								<span class="close_pro"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
						<tr>
							<td>
								<span class="prod_thumb">
									<img src="http://via.placeholder.com/59x59" alt="" class="img-responsive" />
								</span>
								<div class="product_details">
									<h4><a href="#">Rudraksha</a></h4>
								</div>
							</td>
							<td>$300</td>
							<td><input type="number" name="pro_quantity" class="pro_quantity" value="3"></td>
							<td>$300</td>
							<td>
								<span class="close_pro"><i class="fa fa-trash"></i></span>
							</td>
						</tr>
						<tr>
							<td>
								<div class="cupon_code_wrap">
									<input type="text" name="cupon_code" placeholder="####" class="cupon_code">
									<button type="submit" class="cupon_btn ast_btn" value="Apply Cupon Code">Apply Coupon Code</button>
								</div>
							</td>
							<td>&nbsp;</td>
							<td>Total</td>
							<td>$899</td>
							<td>&nbsp;</td>
						</tr>
					</table>
					<a href="checkout.php" class="proceed_btn ast_btn" value="Apply Cupon Code">checkout</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- cart section end --> 

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
>
<!--Main js file End-->
</body>
</html>

 

