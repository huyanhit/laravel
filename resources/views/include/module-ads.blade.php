
<div id="news" class="container">
	<div class="row">
		<div class="col-md-12 total_ads">
			@foreach($total as $val)
				<h3> {{$val->title}} </h3>
				<ul>
					@foreach($val->ads as $ads)
						<li class="jp-hidden" style="display: list-item; opacity: 1;">
							<a href="{{Request::root()}}/rao-vat/noi-dung/{{$ads->id}}"><img width="225" height="136" src="{{$ads->image}}" class="thumb" alt="{{$ads->title}}"></a>
							<h4 class="post-title"><a href="{{Request::root()}}/rao-vat/noi-dung/{{$ads->id}}">{{$ads->title}}</a></h4>
							<p>{{$ads->desc}}</p>
							<div class="clearfix"></div>
							<div class="extra">
								<span class="post-time"> {{$ads->date_create}} </span>
								<span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$ads->view}} </span>
							</div>
						</li>
					@endforeach
				</ul>
			@endforeach
		</div>
	</div>
</div>