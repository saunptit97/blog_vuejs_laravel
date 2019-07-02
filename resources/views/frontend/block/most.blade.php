
<div class="col-md-8">
	<div class="row">
		<div class="col-md-12">
			<div class="section-title">
				<h2>Đọc nhiều</h2>
			</div>
		</div>
		@foreach($most as $post)
		<div class="col-md-12">
			<div class="post post-row">
				<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/' . $post->image)}}" alt=""></a>
				<div class="post-body">
					<div class="post-meta">
						<a class="post-category cat-2" href="{{route('category', $post->category_slug)}}">{{$post->name}}</a>
						<span class="post-date">{{$post->created_at}}</span>
					</div>
					<h3 class="post-title"><a href="{{route('detail', $post->slug)}}">{{$post->title}}</a></h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...</p>
				</div>
			</div>
		</div>
		@endforeach
		
		<div class="col-md-12">
			<div class="section-row">
				<a href="{{route('mostview')}}"><button class="primary-button center-block">Xem thêm</button></a>
			</div>
		</div>
	</div>
</div>

			