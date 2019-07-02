<div class="section section-grey">
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-title text-center">
					<h2>Có thể bạn quan tâm</h2>
				</div>
			</div>

			@foreach($feature as $post)
			<div class="col-md-4">
				<div class="post">
					<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/' . $post->image)}}" alt="" style="height: 200px"></a>
					<div class="post-body">
						<div class="post-meta">
							<a class="post-category cat-2" href="{{route('category', $post->category_slug)}}">{{$post->name}}</a>
							<span class="post-date">{{$post->created_at}}</span>
						</div>
						<h3 class="post-title"><a href="{{route('detail', $post->slug)}}">{{$post->title}}</a></h3>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		<!-- /row -->
	</div>
</div>