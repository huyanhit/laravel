<div class="frame-masonry">	
	@foreach($ads as $val)
		<div class="item">
			<div class="it-fream">
			@if($val->image != '')
			<a href="{{Request::root()}}/noi-dung-rao-vat/{{$val->id}}">
				<img src="{{$val->image}} " alt="{{$val->title}}">
			</a>
			@endif
			@if($val->display != '')
			<div class="text" display="{{$val->display}}">
			<a href="{{Request::root()}}/noi-dung-rao-vat/{{$val->id}}">{{$val->title}}</a>
			</div>
			@endif
			</div>
		</div>
	@endforeach
</div>