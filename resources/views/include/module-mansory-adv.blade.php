<div id="masonry" class="container">
    <div class="row">
    	<div class="col-xs-12" id="search-adv">
            <h3><span>Search adv</span></h3>
            <form>
                <div class="name">
                	<select>
                        <option value="choose">choose</option>
                        @foreach($catads as $val)
                        <option value="{{$val->id}}" >{{$val->title}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </div>
		<div id="ajax-masonry-ads" class="col-xs-12 list-masonry" page='{{$ads->lastPage()}}'>
			<div class="frame-masonry">	
				@foreach($ads as $val)
					<div class="item" display="{{$val->totaldisplay}}">
						<div class="it-fream">
						@if($val->image != '')
						<a href="{{Request::root()}}/noi-dung-rao-vat/{{$val->id}}">
							<img src="{{$val->image}} " alt="{{$val->title}}">
						</a>
						@endif
						@if($val->display != '')
						<div class="text">
						<a href="{{Request::root()}}/noi-dung-rao-vat/{{$val->id}}">{{$val->title}}</a>
						<p>
							{{$val->desc}}
						</p>
						</div>
						@endif
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>