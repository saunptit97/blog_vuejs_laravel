
@extends('frontend.index')
@section('title', $post->title)
@section('content')
<style>
	
</style>
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Post content -->
					<div class="col-md-8">
						
						<div class="section-row sticky-container">
							<div class="main-post">
								<h2>{{$post->title}}</h2>
								<img src="{{URL('/upload/'. $post->image )}}" style="width: 95%"/>
								{!! html_entity_decode( $post->content)  !!}
							</div>
							<div class="post-shares sticky-shares">
								<div class="fb-share-button" data-href="<?php echo URL::current(); ?>" data-layout="button_count" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Chia sẻ</a></div>
							</div>
						</div>

						
						<!-- author -->
						<div class="section-row">
							<div class="post-author">
								<div class="media">
									<div class="media-body">
										<div class="media-heading">
											<h3>Sau Nguyen</h3>
										</div>
										<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
										<ul class="author-social">
											<li><a href="#"><i class="fa fa-facebook"></i></a></li>
											<li><a href="#"><i class="fa fa-twitter"></i></a></li>
											<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="#"><i class="fa fa-instagram"></i></a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- /author -->

						<!-- comments -->
						
						<div class="section-row">
							<div class="media" style="margin-bottom: 20px; width: 540px">
								<div class="post-rate">
									<div class="media-heading"><h3> {{$post->like + $post->dislike }} đánh giá </h3></div>
									<div class="rate" style="border: solid 1px #ddd; padding: 20px 20px 10px 20px;"  >
										<a href="#"><i class="fa fa-thumbs-down" style="font-size: 30px; margin: 3px" id="dislike"></i></a><small id="num_dislike">{{$post->dislike}}</small>
										<a href="#"><i class="fa fa-thumbs-up" style="font-size: 30px; margin: 3px 10px;" id="like"></i></a><small id="num_like">{{$post->like}}</small>
										<p><small>Chọn đánh giá của bạn</small></p>
									</div>
								</div>
							</div>
							
							<div class="post-comments">
							<div class="fb-comments" data-href="<?php echo URL::current();?>" data-width="" data-numposts="5"></div>
							</div>
						</div>
					</div>
					
						@include('frontend.block.banner-right')
					
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<div id="fb-root"></div>


		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=344840522875717&autoLogAppEvents=1"></script>
@endsection
