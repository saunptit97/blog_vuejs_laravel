<div class="col-md-4">
				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Đọc nhiều</h2>
					</div>
					@foreach($most as $post)
					<div class="post post-widget">
						<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/' . $post->image)}}" alt=""></a>
						<div class="post-body">
							<h3 class="post-title"><a href="{{route('detail', $post->slug)}}">{{$post->title}}</a></h3>
						</div>
					</div>
					@endforeach
					
				</div>
				<!-- /post widget -->

				<!-- post widget -->
				<div class="aside-widget">
					<div class="section-title">
						<h2>Có thể bạn quan tâm</h2>
					</div>
					@foreach($feature as $post)
					<div class="post post-thumb">
						<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/'. $post->image)}}" alt=""></a>
						<div class="post-body">
							<div class="post-meta">
								<a class="post-category cat-3" href="{{route('category', $post->category_slug)}}">{{$post->name}}</a>
								<span class="post-date">{{$post->created_at}}</span>
							</div>
							<h3 class="post-title"><a href="{{route('detail', $post->slug)}}">{{$post->title}}</a></h3>
						</div>
					</div>
					@endforeach
					
				</div>
				<!-- /post widget -->
				
				<!-- ad -->
				<!-- <div class="aside-widget text-center">
					<a href="#" style="display: inline-block;margin: auto;">
						<img class="img-responsive" src="./img/ad-1.jpg" alt="">
					</a>
				</div> -->
				<!-- /ad -->
			</div>