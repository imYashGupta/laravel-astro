<!-- Header Start -->
<div class="ast_top_header">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ast_contact_details">
					<ul>
						<li><i class="fa fa-phone" aria-hidden="true"></i> 075021000096</li>
						<li><a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i> hir21st@gmail.com</a></li>
					</ul>
				</div>
				<div class="ast_autho_wrapper">
					<ul>
						 
						<li><a class="popup-with-zoom-anim" href="#login-dialog" @click="showLoginError=false"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>
						<li><a class="popup-with-zoom-anim" href="#signup-dialog"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
					 
						{{-- <li><a   href="user/user_dashboard.html"><i class="fa fa-user" aria-hidden="true"></i> My Account</a></li>	 --}}

					
						<!-- <li class="ast_search">
							<a href="javascript:;"><i class="fa fa-search"></i></a>
							<div class="ast_search_field">
								<form>
									<input type="text" placeholder="Search Here">
									<button type="button"><i class="fa fa-search"></i></button>
								</form>
							</div>
						</li> -->
						<li class="ast_cart">
							<a href="/cart"><i class="fa fa-shopping-cart"></i> Cart (<span id="cartCount">{{$appData["cartItem"]->count()}}</span>)</a>
							<header-cart cart="{{$appData["cartItem"]}}" total="{{$appData["cartTotal"]}}"></header-cart>
						</li>
					</ul><!---->
					<div id="login-dialog" class="zoom-anim-dialog mfp-hide">
						<h1>Login Form</h1>
						<div class="clearfix"></div>
						<div class="alert alert-danger" role="alert" v-if="showLoginError">
							Please Login to apply Coupon Code
						  </div>
						<form action="">
							<input type="text" placeholder="Email">
							<input type="password" placeholder="Password">
							<div class="ast_login_data">
								<label class="tp_custom_check" for="remember_me">Remember me <input type="checkbox" name="ast_remember_me" value="yes" id="ast_remember_me"><span class="checkmark"></span>
								</label>
								<a href="#">Forgot password ?</a>
							</div>
							<button type="submit" class="ast_btn">Login</button>
							<p>Create An Account ? <a class="popup-with-zoom-anim" href="#signup-dialog" >SignUp</a></p>
						</form>
					</div>
					{{-- <div id="login-dialog-a" class="zoom-anim-dialog mfp-hide">
						<h1>Login Form A</h1>
						<form action="">
							<input type="text" placeholder="Email">
							<input type="password" placeholder="Password">
							<div class="ast_login_data">
								<label class="tp_custom_check" for="remember_me">Remember me <input type="checkbox" name="ast_remember_me" value="yes" id="ast_remember_me"><span class="checkmark"></span>
								</label>
								<a href="#">Forgot password ?</a>
							</div>
							<button type="submit" class="ast_btn">Login</button>
							<p>Create An Account ? <a class="popup-with-zoom-anim" href="#login-dialog" >SignUp</a></p>
						</form>
					</div> --}}
					<div id="signup-dialog" class="zoom-anim-dialog mfp-hide">
						<h1>signup form</h1>
						<form>

							<input type="text" placeholder="Name">
							<input type="text" placeholder="Email">
							<input type="password" placeholder="Password">
							<input type="text" placeholder="Mobile Number">
							<select>
								<option value="male">Male</option>
								<option value="female">Female</option>
							</select>
							<button type="submit" class="ast_btn">submit</button>
							<p>Create An Account ? <a class="popup-with-zoom-anim" href="#login-dialog" >SignUp</a></p>
						</form>
					</div>
					 
				</div>
			</div>
		</div>
	</div>
</div>
<div class="ast_header_bottom">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="ast_logo">
					<a href="index.php"><img src="src/images/header/pathway_logo.png" alt="Logo" title="Logo" width="230"></a>
					<button class="ast_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="ast_main_menu_wrapper">
					<div class="ast_menu">
						<ul>
							<li><a href="index.php">home</a>
							</li>
							<li><a href="about.php">about</a></li>
							<li><a href="services.php">services</a></li>
							<li><a href="blog.php">blog</a>
							</li>
							<li><a href="appointment.php">appointment</a></li>
							<li><a href="{{route("shop")}}">shop</a>
								<!-- <ul class="submenu">
									<li><a href="shop.php">shop</a></li>
									<li><a href="shop_single.php">shop single</a></li>
									<li><a href="cart.php">cart</a></li>
									<li><a href="checkout.php">checkout</a></li>
								</ul> -->
							</li>								
							<li><a href="faq.php">FAQ</a>
							</li>
							<li><a href="contact.php">contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Header End -->  