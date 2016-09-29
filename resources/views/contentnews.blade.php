@extends('layouts.main')
@section('content')
<div id="content-news">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h3 class="title"> 
				{{ isset($result->title)?$result->title:'' }}</h3>
				{!! isset($result->content)?$result->content:'' !!}
				<img src="{{Request::root()}}/public/images/{{$result->image}}">
				@include('include.module-comment')
			</div>
			<div class="col-md-4">
				@include('include.sidebar-right')
			</div>
		</div>
	</div>
</div>
@endsection
