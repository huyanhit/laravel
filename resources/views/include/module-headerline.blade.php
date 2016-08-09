<div id="headline" class="container">
	<div class="owl-carousel">
		@foreach($news as $val)
			<div class="item">
				<article class="post">
					<a href="{{Request::root()}}/content.html" title="{{$val->title}}" rel="bookmark">
						<img src="{{Request::root()}}/public/uploads/headerline/{{$val->image}}" alt="Magazine">
					</a>
					<div class="entry">
						<h3><a href="{{Request::root()}}/content.html" title="{{$val->title}}" rel="bookmark">{{$val->title}}</a></h3>
						<p>{{$val->desc}}</p>
					</div>
					<div class="clearfix"></div>
				</article>
			</div>
		@endforeach
		<div class="item">
			<article class="post">
				<a href="#" title="Permalink to Nam nibh arcu tristique eget pretium vitae libero ac risus" rel="bookmark">
				<img src="./public/images/img-headerline.jpg" alt="Magazine">
				</a>
				<div class="entry">
					<h3><a href="#" title="Permalink to Nam nibh arcu tristique eget pretium vitae libero ac risus" rel="bookmark">Nam nibh arcu tristique eget pretiu...</a></h3>
					<p>5 months ago </p>
				</div>
				<div class="clearfix"></div>
			</article>
		</div>

		<div class="item">
			<article class="post">
				<a href="#" title="Permalink to Aliquam quam lectus pulvinar urna leo dignissim lorem" rel="bookmark">
				<img src="./public/images/img-headerline.jpg" alt="Magazine">
				</a>
				<div class="entry">
					<h3><a href="#" title="Permalink to Aliquam quam lectus pulvinar urna leo dignissim lorem" rel="bookmark">Aliquam quam lectus pulvinar urna l...</a></h3>
					<p>6 months ago </p>
				</div>
				<div class="clearfix"></div>
			</article>
		</div>

		<div class="item">
			<article class="post">
				<a href="#" title="Permalink to Phasellus scelerisque massa molestie iaculis lectus pulvinar" rel="bookmark">
				<img src="./public/images/img-headerline.jpg" alt="Magazine">
				</a>
				<div class="entry">
					<h3><a href="#" title="Permalink to Phasellus scelerisque massa molestie iaculis lectus pulvinar" rel="bookmark">Phasellus scelerisque massa molesti...</a></h3>
					<p>6 months ago </p>
				</div>
				<div class="clearfix"></div>
			</article>
		</div>	

		<div class="item">
			<article class="post">
				<a href="#" title="Permalink to Phasellus scelerisque massa molestie iaculis lectus pulvinar" rel="bookmark">
				<img src="./public/images/img-headerline.jpg" alt="Magazine">
				</a>
				<div class="entry">
					<h3><a href="#" title="Permalink to Phasellus scelerisque massa molestie iaculis lectus pulvinar" rel="bookmark">Phasellus scelerisque massa molesti...</a></h3>
					<p>6 months ago </p>
				</div>
				<div class="clearfix"></div>
			</article>
		</div>	

		<div class="item">
			<article class="post">
				<a href="#" title="Permalink to Phasellus scelerisque massa molestie iaculis lectus pulvinar" rel="bookmark">
				<img src="./public/images/img-headerline.jpg" alt="Magazine">
				</a>
				<div class="entry">
					<h3><a href="#" title="Permalink to Phasellus scelerisque massa molestie iaculis lectus pulvinar" rel="bookmark">Phasellus scelerisque massa molesti...</a></h3>
					<p>6 months ago </p>
				</div>
				<div class="clearfix"></div>
			</article>
		</div>	
	</div>
</div>