<header id="header">
	<div id="nav">
		<!-- Main Nav -->
		<div id="nav-fixed">
			<div class="container">
				<!-- logo -->
				@include('frontend.header.logo')
				<!-- /logo -->

				<!-- nav -->
				<ul class="nav-menu nav navbar-nav">
					@foreach($categories as $category)
						<li><a href="{{ URL('/category/' . $category->slug )}}">{{$category->name}}</a></li>
					@endforeach
				</ul>
				<!-- /nav -->

				<!-- search & aside toggle -->
				<div class="nav-btns">
					<button class="aside-btn"><i class="fa fa-bars"></i></button>
					<button class="search-btn"><i class="fa fa-search"></i></button>
					<div class="search-form">
						<input class="search-input" type="text" name="search" placeholder="Enter Your Search ...">
						<button class="search-close"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<!-- /search & aside toggle -->
			</div>
		</div>
		<!-- /Main Nav -->

		<!-- Aside Nav -->
		<div id="nav-aside">
			<!-- nav -->
			<div class="section-row">
				<ul class="nav-aside-menu">
					<li><a href="{{URL('/')}}">Trang chủ</a></li>
					<li><a href="{{URL('/about')}}">Thông tin về chúng tôi</a></li>
					<li><a href="{{URL('/contact')}}">Liên hệ</a></li>
				</ul>
			</div>
			<!-- /nav -->

			<!-- widget posts -->
			<div class="section-row">
				<h3>Mới nhất</h3>
				
				@foreach($recents as $post)
				<div class="post post-widget">
					<a class="post-img" href="{{route('detail', $post->slug)}}"><img src="{{URL('/upload/' . $post->image)}}" alt=""></a>
					<div class="post-body">
						<h3 class="post-title"><a href="{{route('detail', $post->slug)}}">{{$post->title}}</a></h3>
					</div>
				</div>
				@endforeach
				
			</div>
			<!-- /widget posts -->

			<!-- social links -->
			<div class="section-row">
				<h3>Theo dõi chúng tôi</h3>
				<ul class="nav-aside-social">
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
					<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				</ul>
			</div>
			<!-- /social links -->

			<!-- aside nav close -->
			<button class="nav-aside-close"><i class="fa fa-times"></i></button>
			<!-- /aside nav close -->
		</div>
		<!-- Aside Nav -->
	</div>
</header>