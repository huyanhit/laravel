<div id="mutimedia" class="container">
    <div class="row">
    	<div id="title-mutimedia" class="col-xs-12">
            <h3><span>Playlist</span></h3>
    	</div>
		<div class="col-xs-12 owl-mutimedia">
			<div class="owl-carousel">
				@foreach($video as $val)
				<div class="item">
					<a href="{{Request::root()}}/video/noi-dung/{{$val->id}}"><img src="{{$val->image}}">
						<h4><i class="fa fa-play" aria-hidden="true"></i> {{$val->title}}</h4>
					</a>
					<div class="meta clearfix">
						<span class="date">{{$val->date_create}}</span>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
