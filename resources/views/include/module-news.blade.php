
<div id="news" class="container">
	<div class="row">
		<div class="col-md-5 news-right">
			<div class="flexslider">
			  <ul class="slides">
			    @foreach($news as $val)	
			    <li data-thumb="{{$val->image}}">
			      <img src="{{$val->image}}" />
			    </li>
			    @endforeach
			  </ul>
			</div>
		</div>
		<div class="col-md-3 news-center">
			<h3>Most Popular News</h3>
			<ul>
				@foreach($newshot as $val)	
					<li><a href="#" title="{{$val->title}}" rel="bookmark"><h4 class="post-title">{{$val->title}}</h4></a></li>
				@endforeach
			</ul>
			<div class="clear"></div>
		</div>
		<div class="col-md-4 news-left">
			<div id="tabwidget" class="widget tab-container"> 
				<ul id="tabnav" class="clearfix"> 
					<li><h3><a href="#tab1" class="selected"><i class="fa fa-envira" aria-hidden="true"></i>New</a></h3></li>
					<li><h3><a href="#tab2" class=""><i class="fa fa-envira" aria-hidden="true"></i>Recent</a></h3></li>
				    <li><h3><a href="#tab3" class=""><i class="fa fa-envira" aria-hidden="true"></i>Comments</a></h3></li>
				</ul> 

			<div id="tab-content">
			
	 		<div id="tab1" style="display: block;">
				<ul id="itemContainer" class="recent-tab">
					@foreach($newsnew as $val)	
					<li class="jp-hidden" style="display: list-item; opacity: 1;">
						<a href="#"><img width="225" height="136" src="{{$val->image}}" class="thumb" alt="{{$val->title}}"></a>
						<h4 class="post-title"><a href="#">{{$val->title}}</a></h4>
						<p>{{$val->desc}}</p>
						<div class="clearfix"></div>				
					</li>
					@endforeach
				</ul>
				<div class="clear"></div>

			<!-- End most viewed post -->		  

			</div><!-- /#tab1 -->
 
			<div id="tab2" style="display: none;">	
				<ul id="itemContainer2" class="recent-tab">
					<li>
						<a href="#"><img width="225" height="136" src="./public/images/background-new.jpg" class="thumb" alt="shutterstock_134257640"></a>
						<h4 class="post-title"><a href="http://magazine.themedesigner.in/lectus-non-rutrum-pulvinar-urna-leo-dignissim-lorem-8/">Lectus non rutrum pulvinar urna...</a></h4>
						<p>Nam nibh arcu, tristique eget pretium sed, porta id quam. Praesent dig...</p>
						<div class="clearfix"></div>	
					</li>
					<li>
						<a href="#"><img width="225" height="136" src="./public/images/background-new.jpg" class="thumb" alt="shutterstock_70184773"></a>
						<h4 class="post-title"><a href="#">Suspen disse auctor dapibus neq...</a></h4>
						<p>Fusce aliquet non ipsum vitae scelerisque. Nullam ultricies adipiscing...</p>
						<div class="clearfix"></div>	
					</li>
					<li>
						<a href="#"><img width="225" height="136" src="./public/images/background-new.jpg" class="thumb" alt="shutterstock_70787161"></a>
						<h4 class="post-title"><a href="#">Porta lorem ipsum dolor sit ame...</a></h4>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer place...</p>
						<div class="clearfix"></div>	
					</li>
				</ul> 	 
			</div><!-- /#tab2 --> 

			<div id="tab3" style="display: none;">
				<ul>
					<li><span class="author">Magazine Author</span> on <a href="#" title=" View comment ">Lorem Ipsum is simply dummy te</a></li>
					<li><span class="author">Magazine Author</span> on <a href="#" title=" View comment ">Lorem Ipsum is simply dummy te</a></li>
					<li><span class="author">magazine</span> on <a href="#" title=" View comment ">This is threaded comment level</a></li>
					<li><span class="author">magazine</span> on <a href="#" title=" View comment ">This is threaded comment syste</a></li>
				</ul>
			</div><!-- /#tab2 --> 
	
			</div><!-- /#tab-content -->

			</div>
		</div>
	</div>
	
</div>