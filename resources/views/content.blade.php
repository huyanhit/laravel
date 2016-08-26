@extends('layouts.main')
@section('content')
<div id="content-news">
	<div class="container">
	{!! isset($result)?$result:'' !!}
	@include('include.module-comment')
	dsa
	</div>
</div>
@endsection
