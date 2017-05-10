
<div id="news" class="container">
	<div class="row">
		<div class="col-md-5 news-right">
			<div class="flexslider">
			  <ul class="slides">
			    @foreach($newsSL as $val)	
			    <li data-thumb="{{$val->image}}">
			      <img src="{{$val->image}}" />
			      <div class="flex-caption">
			      	<h4><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
			      	<div>
			      		{{$val->desc}}
			      	</div>
			      </div>
			    </li>
			    @endforeach
			  </ul>
			</div>
		</div>
		<div class="col-md-3 news-center">
			<ul class="my_scroll">
				@foreach($news as $val)	
					<li><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}" title="{{$val->title}}" rel="bookmark"><h4 class="post-title">{{$val->title}}</h4></a></li>
				@endforeach
			</ul>
			<div class="clear"></div>
		</div>
		<div class="col-md-4 news-left">
			<div id="tabwidget" class="widget tab-container"> 
				<ul id="tabnav" class="clearfix"> 
					<li><h3><a href="#tab1" class="selected"><i class="fa fa-rss" aria-hidden="true"></i>Rss </a></h3></li>
					<li><h3><a href="#tab2" class=""><i class="fa fa-envira" aria-hidden="true"></i>Xulanh</a></h3></li>
				    <li><h3><a href="#tab3" class=""><i class="fa fa-gg" aria-hidden="true"></i>Gia Lai</a></h3></li>
				</ul> 

				<div id="tab-content" class="my_scroll">
				
			 		<div id="tab1"  style="display: block;">
						<ul id="itemContainer" class="recent-tab">
							@foreach($newsRss as $val)	
							<li class="jp-hidden" style="display: list-item; opacity: 1;">
								<a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}"><img width="225" height="136" src="{{$val->image}}" class="thumb" alt="{{$val->title}}"></a>
								<h4 class="post-title"><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
								<p>{{$val->desc}}</p>
								<div class="clearfix"></div>				
							</li>
							@endforeach
						</ul>
						<div class="clear"></div>

					<!-- End most viewed post -->		  

					</div><!-- /#tab1 -->
		 
					<div id="tab2" style="display: none;">	 
						<ul id="itemContainer" class="recent-tab">
							@foreach($newsXL as $val)	
							<li class="jp-hidden" style="display: list-item; opacity: 1;">
								<a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}"><img width="225" height="136" src="{{$val->image}}" class="thumb" alt="{{$val->title}}"></a>
								<h4 class="post-title"><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
								<p>{{$val->desc}}</p>
								<div class="clearfix"></div>				
							</li>
							@endforeach
						</ul>
					</div><!-- /#tab2 --> 

					<div id="tab3" style="display: none;">
						<ul id="itemContainer" class="recent-tab">
							@foreach($newsGL as $val)	
							<li class="jp-hidden" style="display: list-item; opacity: 1;">
								<a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}"><img width="225" height="136" src="{{$val->image}}" class="thumb" alt="{{$val->title}}"></a>
								<h4 class="post-title"><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
								<p>{{$val->desc}}</p>
								<div class="clearfix"></div>				
							</li>
							@endforeach
						</ul>
					</div><!-- /#tab2 --> 
		
				</div><!-- /#tab-content -->

			</div>
		</div>
	</div>
	
</div>