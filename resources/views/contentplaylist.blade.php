@extends('layouts.muti')
@section('content')
<div id="content-playlist">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6 image-file">
						<img src="{{$result->image}}">
						@include('include.module-contentplaylist')
					</div>
					<div class="col-md-6 entry-content">
						<h3 class="title"> 
						{{ isset($result->title)?$result->title:'' }}</h3>
						{!! isset($result->desc)?$result->desc:'' !!}
						{!! isset($result->content)?$result->content:'' !!}
					</div>
				</div>
				@include('include.module-comment')
			</div>
			<div class="col-md-4">
				@include('include.sidebar-right')
			</div>
		</div>
	</div>
</div>
@endsection
