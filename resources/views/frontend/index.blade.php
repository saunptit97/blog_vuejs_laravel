@include('frontend.header.header')

	<body>
		@include('frontend.header.menu')
		@yield('content')
		@include('frontend.footer.bottom')
		@include('frontend.footer.footer')

	</body>
</html>