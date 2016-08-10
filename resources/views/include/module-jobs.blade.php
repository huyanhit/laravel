<div id="jobs" class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="search-jobs">
                <h3><span>Search jobs</span></h3>
                <form>
                    <div class="name">
                        <select>
                            <option value="choose">Choose</option>
                            @foreach($location as $val)
                            <option value="{{$val->id}}">{{$val->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div id="list-jobs">
                @foreach($jobs as $val)
                <div class="item "> 
                    <div class="title col-xs-9">
                    <i class="fa 
                    @foreach($typejobs as $vals)
                        @if($val->typejobs == $vals->id)
                            {{$vals->icon}}
                        @endif
                    @endforeach 
                    " aria-hidden="true"></i> 
                        <a href="#" class="title" target="_blank" title="{{$val->title}}">
                           {{$val->title}}
                        </a>
                    </div>
                    <div class="col-xs-3 text-right">
                        <span class="salary"> {{$val->salary}} </span>
                    </div>
                    <div class="clearfix"></div>
                    <div class="bottom">
                        <div class="col-xs-6">
                                {{$val->from}}
                        </div>
                        <div class="col-xs-3">
                            <i class="fa fa-clock-o" aria-hidden="true"></i> {{$val->date_create}}
                        </div>
                        <div class="col-xs-3">
                            <i class="fa fa-location-arrow" aria-hidden="true"></i>
                            @foreach($location as $vals)
                                @if($val->location == $vals->id)
                                    {{$vals->title}}
                                @endif
                            @endforeach 
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="pagination">
                <span><a href="#">1</a></span>
                <span><a href="#">2</a></span>
                <span><a href="#">3</a></span>
                <span><a href="#">4</a></span>
                <span><a href="#">1</a></span>
                <span><a href="#">2</a></span>
                <span><a href="#">3</a></span>
                <span><a href="#">4</a></span>
                <span><a href="#">1</a></span>
                <span><a href="#">2</a></span>
                <span><a href="#">3</a></span>
                <span><a href="#">4</a></span>
            </div>
        </div>
        <div class="col-md-4">
             <div class="job-vip">
                <h3 class="title"><span>Job Vip</span></h3>
                <div class="content">
                    @foreach($jobsvip as $val)
                    <div class="item">
                        <a href="#"><img width="225" height="136" src="{{$val->image}}" class="thumb fl" alt="shutterstock_134257640" title=""></a>
                        <h4><a href="#" rel="bookmark" title="{{$val->title}}">{{$val->title}}</a></h4>
                        <div class="desc">{{$val->desc}}</div>
                        <div class="salo">
                            <span>
                                <i class="fa fa-clock-o" aria-hidden="true"></i>{{$val->date_create}}
                            </span>
                            <span>
                                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                                @foreach($location as $vals)
                                    @if($val->location == $vals->id)
                                        {{$vals->title}}
                                    @endif
                                @endforeach 
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>