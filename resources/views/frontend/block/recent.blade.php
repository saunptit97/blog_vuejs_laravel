<div class="row">
	<div class="col-md-12">
		<div class="section-title">
			<h2>Mới nhất</h2>
		</div>
	</div>
	@foreach ($recents as $key => $recent)
	<!-- post -->
	<div class="col-md-4">
		<div class="post">
			<a class="post-img" href="{{route('detail', $recent->slug)}}">
				@if($recent->image != '')
					<img src="{{URL('/upload/' . $recent->image)}}" alt="{{$recent->title}}" style="height: 200px"></a>
				@else
					<img src="{{URL('/images/no_image.png')}}" alt="{{$recent->title}}" style="height: 200px"></a>
				@endif
			<div class="post-body">
				<div class="post-meta">
					<a class="post-category cat-1" href="{{route('category', $recent->category_slug)}}">{{$recent->name}}</a>
					<span class="post-date">{{$recent->created_at}}</span>
				</div>
				<h3 class="post-title"><a href="{{route('detail', $recent->slug)}}">{{$recent->title}}</a></h3>
			</div>
		</div>
	</div>
	@if(($key +1) % 3 == 0) <div class="clearfix visible-md visible-lg"></div>
	@endif
	@endforeach
</div>