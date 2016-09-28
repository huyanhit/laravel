<div id="masonry" class="container">
    <div class="row">
    	<div class="col-xs-12" id="search-adv">
            <h3><span>Tìm tin rao vặt</span></h3>
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
			<div class="frame-masonry clearfix">	
				<div class="col">
				@php $total = 0 @endphp
				@foreach($ads as $val)
				@php
				$total += $val->totaldisplay;
				@endphp
				@if($total > $totaldisplay)
				@php
					$total -= $totaldisplay;
				@endphp
				</div>
				<div class="col">
				@endif
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
				
				@if($total == $totaldisplay)
				@php
					$total -= $totaldisplay;
				@endphp
				</div>
				<div class="col">
				@endif
				@endforeach
				</div>
			</div>
		</div>
	</div>
</div>