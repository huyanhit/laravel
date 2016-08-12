@extends('layouts.main')
@section('content')
<div id="content-news">
	<div class="container">
	{!! isset($result)?$result:'' !!}
	</div>
</div>
@endsection
