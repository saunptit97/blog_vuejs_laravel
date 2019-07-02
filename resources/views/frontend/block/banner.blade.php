<div class="row">	
	@foreach($banner as $post)
	<div class="col-md-6">
		<div class="post post-thumb">
			
			<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/'. $post->image)}}" alt="{{$post->title}}" title="{{$post->title}}" style="height: 350px"></a>
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