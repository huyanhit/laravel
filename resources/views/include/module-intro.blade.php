<div id="intro" class="container">
	<div class="row">
		<div class="col-md-9">
			<h3><span>Breaking News</span></h3>
			<ul id="scroller" class="simply-scroll-list">
				@foreach($intro as $val)	
				<li><p><a href="#" title="{{$val->title}}" rel="bookmark"><span class="title">{{$val->title}}</span> {{$val->desc}}</a></p></li>
				@endforeach
			</ul>
		</div>
	<div class="col-md-3">
		<div class="offset1">
			<form method="get" id="searchform" action="#">
				<p><input type="text" value="Search here..." onfocus="if ( this.value == 'Search here...' ) { this.value = ''; }" onblur="if ( this.value == '' ) { this.value = 'Search here...'; }" name="s" id="s">
				<input type="submit" id="searchsubmit" value="Search"></p>
			</form>
		</div>
		</div>
	</div>

</div>