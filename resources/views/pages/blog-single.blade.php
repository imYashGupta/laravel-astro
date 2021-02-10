@extends('layouts.web-master')
@section("title",$blog->title)
@section('content')	
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>blog single</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="{{ route("homepage") }}">home</a></li>
					<li>/</li>
					<li><a href="{{ route("blogs") }}">blog</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Blog section start-->
<div class="ast_blog_wrapper ast_toppadder80 ast_bottompadder80">
	<div class="container">
		<div class="row">
		    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="sidebar_wrapper">
										
					<aside class="widget widget_categories">
						<h4 class="widget-title">Categories</h4>
						<ul>
							<li><a href="{{ route("blogs") }}">All Blogs</a></li>
							@foreach ($categories as $category)
							<li><a href="{{ route("blogs") }}?category={{ $category->name }}">{{ $category->name }}</a></li>
							@endforeach
						</ul>
					</aside>
					
					
					<aside class="widget widget_recent_entries">
						<h4 class="widget-title">Popular Posts</h4>
						<ul>
							@foreach ($popularBlogs as $blog)
							<li><a href="{{ route("blog",$blog->slug) }}">{{Str::limit($blog->title,85,'...')}}</a></li>								
							@endforeach
						</ul>
					</aside>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
				<div class="ast_blog_box">
					<div class="ast_blog_img">
						<span class="ast_date_tag">28 august, 2018</span>
						<img src="{{ $blog->thumbnailUrl }}" width="100%" alt="Blog" title="Blog">
					</div>
					<div class="ast_blog_info">
						<ul class="ast_blog_info_text">
							<li><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> {{$blog->created_at->format("d F,Y")}}</a></li>
							{{-- <li><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a></li> --}}
						</ul>
						<h3 class="ast_blog_info_heading">{{$blog->title}}.</h3>
						<p class="ast_blog_info_details">{!! $blog->content !!}</p>
					</div>
				</div>
				<!--<div class="ast_blog_comment_wrapper">-->
				<!--	<h4 class="ast_blog_heading">all comments</h4>-->
				<!--	<ul>-->
				<!--		<li>-->
				<!--			<div class="ast_blog_comment">-->
				<!--				<div class="ast_comment_image">-->
				<!--					<img src="http://via.placeholder.com/80x80" alt="">-->
				<!--				</div>-->
				<!--				<div class="ast_comment_text">-->
				<!--					<h5 class="ast_bloger_name">Andrew Coyne</h5>-->
				<!--					<span class="ast_blog_date">May 12, 2018</span>-->
				<!--					<p class="ast_blog_post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula mauris ac facilisis congue. Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo, eu placerat urna. Vestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. </p>-->
				<!--					<a href="" class="ast_comment_reply">Reply</a>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--			<ul>-->
				<!--				<li>-->
				<!--					<div class="ast_blog_comment">-->
				<!--						<div class="ast_comment_image">-->
				<!--							<img src="http://via.placeholder.com/80x80" alt="">-->
				<!--						</div>-->
				<!--						<div class="ast_comment_text">-->
				<!--							<h5 class="ast_bloger_name">Elexa Styan</h5>-->
				<!--							<span class="ast_blog_date">May 13, 2018</span>-->
				<!--							<p class="ast_blog_post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula mauris ac facilisis congue. Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo, eu placerat urna. Vestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. </p>-->
				<!--							<a href="" class="ast_comment_reply">Reply</a>-->
				<!--						</div>-->
				<!--					</div>-->
				<!--				</li>-->
				<!--			</ul>-->
				<!--		</li>-->
				<!--		<li>-->
				<!--			<div class="ast_blog_comment">-->
				<!--				<div class="ast_comment_image">-->
				<!--					<img src="http://via.placeholder.com/80x80" alt="">-->
				<!--				</div>-->
				<!--				<div class="ast_comment_text">-->
				<!--					<h5 class="ast_bloger_name">Sarah Silvester</h5>-->
				<!--					<span class="ast_blog_date">May 14, 2018</span>-->
				<!--					<p class="ast_blog_post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula mauris ac facilisis congue. Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo, eu placerat urna. Vestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. </p>-->
				<!--					<a href="" class="ast_comment_reply">Reply</a>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</li>-->
				<!--		<li>-->
				<!--			<div class="ast_blog_comment">-->
				<!--				<div class="ast_comment_image">-->
				<!--					<img src="http://via.placeholder.com/80x80" alt="">-->
				<!--				</div>-->
				<!--				<div class="ast_comment_text">-->
				<!--					<h5 class="ast_bloger_name">Cody Duff</h5>-->
				<!--					<span class="ast_blog_date">May 15, 2018</span>-->
				<!--					<p class="ast_blog_post">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vehicula mauris ac facilisis congue. Fusce sem enim, rhoncus volutpat condimentum ac, placerat semper ligula. Suspendisse in viverra justo, eu placerat urna. Vestibulum blandit diam suscipit nibh mattis ullamcorper. Nullam a condimentum nulla, ut facilisis enim. </p>-->
				<!--					<a href="" class="ast_comment_reply">Reply</a>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</li>-->
				<!--	</ul>-->
				<!--</div>-->
				<!--<div class="ast_blog_message_wrapper">-->
				<!--	<h4 class="ast_blog_heading">Leave a reply</h4>-->
				<!--	<div class="ast_blog_messages">-->
				<!--		<form>-->
				<!--			<div class="row">-->
				<!--				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
				<!--					<textarea rows="5" placeholder="Your Message"></textarea>-->
				<!--				</div>-->
				<!--				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
				<!--					<input type="text" placeholder="Name*">-->
				<!--				</div>-->
				<!--				<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">-->
				<!--					<input type="email" placeholder="Email*">-->
				<!--				</div>-->
				<!--				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">-->
				<!--					<a href="#" id="ed_submit" class="ast_btn">reply</a>-->
				<!--				</div>-->
				<!--			</div>-->
				<!--		</form>-->
				<!--	</div>-->
				<!--</div>-->
			</div>
		
		</div>
	</div>
</div>
<!--Blog section end-->
<!-- Download wrapper start-->
<div class="ast_download_wrapper ast_toppadder20 ast_bottompadder20">
	<div class="container">
		
	</div>
</div>
@endsection
