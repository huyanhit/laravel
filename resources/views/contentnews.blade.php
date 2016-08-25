@extends('layouts.main')
@section('content')
<div id="content-news">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				{!! isset($result)?$result:'' !!}
			</div>
			<div class="col-md-4">
				@include('include.sidebar-right')
			</div>
		</div>
	</div>
</div>
@endsection
