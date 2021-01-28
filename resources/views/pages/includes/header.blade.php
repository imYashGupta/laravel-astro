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
					<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
						@csrf
					</form>
					<ul>
						 @if(auth()->check())
						 <li><a class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  href="user/user_dashboard.html"><i class="fa fa-user" aria-hidden="true"></i> My Account</a>
							<ul class="dropdown-menu" aria-labelledby="dropdownMenu2">

								<li><a href="#">Profile</a></li>
								<li><a href="{{ route('logout') }}" onclick="event.preventDefault();
									document.getElementById('logout-form').submit();">Logout</a></li>
							  </ul>
							  
							</li>	
						 
						 @if(auth()->user()->role=='ADMIN')
						 <li><a   href="{{route("dashboard")}}"> Admin Dashboard</a></li>	
						@endif
						 @else
						 <li><a class="popup-with-zoom-anim" href="#signup-dialog"><i class="fa fa-user-plus" aria-hidden="true"></i> Sign Up</a></li>
						 <li><a class="popup-with-zoom-anim" href="#login-dialog" @click="showLoginError=false"><i class="fa fa-sign-in" aria-hidden="true"></i> Log In</a></li>
						@endif

					
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
						<login-form></login-form>
					</div>
				 
					<div id="signup-dialog" class="zoom-anim-dialog mfp-hide">
						<h1>signup form</h1>
						<sign-up></sign-up>
					</div>

					<div id="forgot-password-dialog" class="zoom-anim-dialog mfp-hide">
						<h1>Forgot Password?</h1>
						<forgot-password-form></forgot-password-form>
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
					<a href="index.php"><img src="/src/images/header/pathway_logo.png" alt="Logo" title="Logo" width="230"></a>
					<button class="ast_menu_btn"><i class="fa fa-bars" aria-hidden="true"></i></button>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<div class="ast_main_menu_wrapper">
					<div class="ast_menu">
						<ul>
							<li><a href="/">home</a>
							</li>
							<li><a href="/about-us">about</a></li>
							<li><a href="/services">services</a></li>
							<li><a href="/blogs">blog</a>
							</li>
							<li><a href="/appointment">appointment</a></li>
							<li><a href="{{route("shop")}}">shop</a>
								<!-- <ul class="submenu">
									<li><a href="shop.php">shop</a></li>
									<li><a href="shop_single.php">shop single</a></li>
									<li><a href="cart.php">cart</a></li>
									<li><a href="checkout.php">checkout</a></li>
								</ul> -->
							</li>								
							<li><a href="/faq">FAQ</a>
							</li>
							<li><a href="/contact-us">contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Header End -->  