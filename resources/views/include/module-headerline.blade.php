<div id="headline" class="container">
	<div class="owl-carousel">
		@foreach($headerline as $val)
			<div class="item">
				<article class="post">
					<a href="{{Request::root()}}/noi-dung/{{$val->id}}" title="{{$val->title}}" rel="bookmark">
						<img src="{{$val->image}}" alt="Magazine">
					</a>
					<div class="entry">
						<h3><a href="{{Request::root()}}/noi-dung/{{$val->id}}" title="{{$val->title}}" rel="bookmark">{{$val->title}}</a></h3>
						<p>{{$val->desc}}</p>
					</div>
					<div class="clearfix"></div>
				</article>
			</div>
		@endforeach
	</div>
</div>