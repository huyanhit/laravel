<div id="intro" class="container">
	<div class="row">
		<div class="col-md-9">
			<h3><span>Tin Nhanh</span></h3>
			<ul id="scroller" class="simply-scroll-list">
				<li class="introweather">
					<span id="weather" class="weather">
						<span class="weather_date"></span>
						<span class="weather_temp">
							<span class="weather_temp_min"></span>
							<span class="weather_temp_max"></span>
						</span>
						<img class="weather_icon">
					</span>
				</li>
				@foreach($intro as $val)	
				<li><p><a href="{{Request::root()}}/content/{{$val->id}}" title="{{$val->title}}" rel="bookmark"><span class="title">{{$val->title}}</span></a></p></li>
				@endforeach
			</ul>
		</div>
	<div class="col-md-3">
		<div class="offset1">
			<form method="get" id="searchform" action="#">
				<p><input type="text" value="Tìm kiếm..." onfocus="if ( this.value == 'Tìm kiếm...' ) { this.value = ''; }" onblur="if ( this.value == '' ) { this.value = '...'; }" name="s" id="s">
				<input type="submit" id="searchsubmit" value="Search"></p>
			</form>
		</div>
		</div>
	</div>

</div>