@extends("layouts.web-master")
@section('content')
<div class="ast_pagetitle">
<div class="ast_img_overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12">
				<div class="page_title">
					<h2>blog</h2>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
				<ul class="breadcrumb">
					<li><a href="index.php">home</a></li>
					<li>//</li>
					<li><a href="blog_rs.php">blog </a></li>
				</ul>
			</div>
		</div>
	</div>
</div>
<!--Breadcrumb end-->
<!--Blog section start-->
<div class="ast_blog_wrapper ast_toppadder70 ast_bottompadder70">
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
				<div class="row">
					@forelse ($blogs as $blog)
						
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
						<div class="ast_blog_box">
							<div class="ast_blog_img">
								<span class="ast_date_tag">{{$blog->created_at->format("d F, Y")}}</span>
								<a href="{{ route("blog",$blog->slug) }}">
									<img src="{{$blog->thumbnailUrl}}" alt="Blog" title="Blog">
								</a>
							</div>
							<div class="ast_blog_info">
								{{-- <ul class="ast_blog_info_text">
									<li><a href="blog_single.php"><i class="fa fa-comments-o" aria-hidden="true"></i> 28 comments</a></li>
									<li><a href="blog_single.php"><i class="fa fa-user" aria-hidden="true"></i> Andrew Coyne</a></li>
								</ul> --}}
								<h3 class="ast_blog_info_heading"><a href="blog_single.php">{{Str::limit($blog->title, 70, '...')}}.</a></h3>
								<p class="ast_blog_info_details">{{ Str::limit($blog->short_description,200,'...') }}</p>
								<a class="ast_btn" href="{{ route("blog",$blog->slug) }}">read more</a>
							</div>
						</div>
					</div>
					@empty
						
					@endforelse
					
					{{-- <div class="col-lg-12">
						<div class="ast_pagination">
							<ul class="pagination">
								<li><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a class="active" href="#">Next</a></li>
							</ul>
						</div>
					</div> --}}
					<div></div>
				</div>
				{{ $blogs->links() }}
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
