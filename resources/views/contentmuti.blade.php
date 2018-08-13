@extends('layouts.muti')
@section('content')
<div id="content-muti">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					@if($result->type == 'mp3')
					<div class="col-md-6 image-file">
						<img src="{{$result->image}}">
						@include('include.module-contentmuti')
					</div>
					<div class="col-md-6">
						<h3 class="title">

							{{ isset($result->title)?$result->title:'' }}</h3>
						<img src="{{Request::root()}}/public/uploads/muti/{{$result->image}}">
						{!! isset($result->content)?$result->content:'' !!}
					</div>
					@else
						<div class="col-md-12 image-file">
							@include('include.module-contentmuti')
							<h3 class="title">
								{{ isset($result->title)?$result->title:'' }}</h3>
							<img src="{{Request::root()}}/public/uploads/muti/{{$result->image}}">
							{!! isset($result->content)?$result->content:'' !!}
						</div>
					@endif

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
