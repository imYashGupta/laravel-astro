<!-- Footer wrapper start-->
<div class="ast_footer_wrapper ast_toppadder70 ast_bottompadder20">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-10 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
				<div class="ast_footer_info">
					<!-- <img src="src/images/header/pathway_logo.png" alt="Logo"> -->
					<!-- <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p> -->
					<ul>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>					
						<li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>					
						<li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>					
						<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>					
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>					
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="widget text-widget">
					<img src="{{$appData['logo'] }}" style="margin-bottom: 10px;" alt="Logo" width="230">
					<h4 class="widget-title">our newsletter</h4>
					<div class="ast_newsletter">
						<p>Fell Free To Contact.</p>
						<div class="ast_newsletter_box">
							<form action="{{ route("newsletter.store") }}" method="POST">
								@csrf
								<input type="email" name="email" placeholder="Your Email">
								<button type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>						
							</form>
						</div>
					</div>				
				</div>			
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="widget text-widget">
					<h4 class="widget-title">our services</h4>
					<div class="ast_servicelink">
						<ul>
							@foreach ($footer["services"] as $item)
							<li><a href="/services/{{ $item->name }}" >{{$item->name}}</a></li>
							@endforeach
				 
						</ul>
					</div>				
				</div>			
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				<div class="widget text-widget">
					<h4 class="widget-title">quick links</h4>
					<div class="ast_sociallink">
						<ul>
							<li><a href="about-us">about</a></li>
							<li><a href="blogs">blog</a></li>
							<li><a href="appointment">Appointment</a></li>
							<li><a href="faq">FAQ</a></li>
							<li><a href="contact-us">contact</a></li>
							<li><a href="/login">login</a></li>
						</ul>
					</div>				
				</div>			
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="widget text-widget">
					<h4 class="widget-title">get in touch</h4>
					<div class="ast_gettouch">
						<ul>
							<li><i class="fa fa-home" aria-hidden="true"></i> <p>{{$appData["address"] }}</p></li>
							<li><i class="fa fa-at" aria-hidden="true"></i> <a href="#">{{$appData["email"] }}</a><a href="#"></a></li>
							<li><i class="fa fa-phone" aria-hidden="true"></i> <p>{{$appData["phone"] }}</p><p></p></li>
						</ul>
					</div>				
				</div>			
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="ast_copyright_wrapper">
					<p>{!! $appData["footer_text"] !!}</p>				
				</div>			
			</div>	
		</div>	
	</div>
</div>
<div id="snackbar"></div>

<!-- Footer wrapper End-->