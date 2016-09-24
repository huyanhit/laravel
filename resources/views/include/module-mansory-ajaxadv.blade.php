<div class="title-line page-ads clearfix">
    <h3><span>Trang {{isset($_GET['page'])?$_GET['page']:''}}</span>
    </h3>
</div>
<div class="frame-masonry margintop-10 clearfix">	
	<div class="col">
	@php $total = 0 @endphp
	@foreach($ads as $val)
		<div class="item" display="{{$val->totaldisplay}}">
			<div class="it-fream">
			@if($val->image != '')
			<a href="{{Request::root()}}/rao-vat/noi-dung/{{$val->id}}">
				<img src="{{$val->image}} " alt="{{$val->title}}">
			</a>
			@endif
			@if($val->display != '')
			<div class="text">
			<a href="{{Request::root()}}/rao-vat/noi-dung/{{$val->id}}">{{$val->title}}</a>
			<p>
				{{$val->desc}}
			</p>
			</div>
			@endif
			</div>
		</div>
	@php
		$total += $val->totaldisplay;
	@endphp
	@if($total%$totaldisplay == 0)
	</div>
	<div class="col">
	@endif
	@endforeach
	</div>
</div>