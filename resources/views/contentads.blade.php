@extends('layouts.main')
@section('content')
<div id="content-ads">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h3 class="title"> 
				{{ isset($result->title)?$result->title:'' }}</h3>
				<img src="{{Request::root()}}/public/uploads/ads/{{$result->image}}">
				{!! isset($result->content)?$result->content:'' !!}
				@include('include.module-comment')
			</div>
			<div class="col-md-4">
				@include('include.sidebar-right')
			</div>
		</div>
	</div>
</div>
@endsection
