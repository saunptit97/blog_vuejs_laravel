@extends('frontend.index')
@section('title', 'Xem nhiều')
@section('content')
		
<div class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-10">
				<ul class="page-header-breadcrumb">
					<li><a href="{{URL('/')}}">Trang chủ</a></li>
					<li>Xem nhiều</li>
				</ul>
				<h1>Xem nhiều</h1>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<!-- post -->
					<!-- <div class="col-md-12">
						<div class="post post-thumb">
							<a class="post-img" href="blog-post.html"><img src="./img/post-1.jpg" alt=""></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="#">JavaScript</a>
									<span class="post-date">March 27, 2018</span>
								</div>
								<h3 class="post-title"><a href="blog-post.html">Javascript : Prototype vs Class</a></h3>
							</div>
						</div>
					</div> -->
					<!-- /post -->
								
					<!-- post -->
				
					<!-- /post -->
					
					<div class="clearfix visible-md visible-lg"></div>
					
					<!-- ad -->
					<!-- <div class="col-md-12">
						<div class="section-row">
							<a href="#">
								<img class="img-responsive center-block" src="./img/ad-2.jpg" alt="">
							</a>
						</div>
					</div> -->
					@foreach($posts as $post)
					<div class="col-md-12">
						<div class="post post-row">
							<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/'. $post->image )}}" style="height: 200px"></a>
							<div class="post-body">
								<div class="post-meta">
									<a class="post-category cat-2" href="#">{{$post->name}}</a>
									<span class="post-date">{{$post->created_at}}</span>
								</div>
								<h3 class="post-title"><a href="{{route('detail', $post->slug)}}">{{$post->title}}</a></h3>
								<p>{{$post->description}}</p>
							</div>
						</div>
					</div>
					@endforeach
					{{ $posts->links() }}
				</div>
			</div>
			
			@include('frontend.block.banner-right')
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
@endsection