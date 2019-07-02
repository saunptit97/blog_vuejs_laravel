@extends('frontend.index')
@section('title', 'Lập trình | Tech Talk')
@section('content')


<div class="section">
	
	<div class="container">
		
		@include('frontend.block.banner')
		
		@include('frontend.block.recent')
		<div class="row">
			@include('frontend.block.most')

			@include('frontend.block.banner-right')
		</div>
		
	</div>
	
</div>
		
@include('frontend.block.feature')
		
@endsection