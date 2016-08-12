<div id="jobs" class="container">
    <div class="row">
        <div class="col-md-8">
            <div id="search-jobs">
                <h3><span>Việc làm</span></h3>
                <form>
                    <div class="name">
                        <select>
                            <option value="choose">Địa Điểm</option>
                            @foreach($location as $val)
                            <option value="{{$val->id}}">{{$val->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </form>
            </div>
            <div id="ajaxjobs">
            </div>
        </div>
        <div class="col-md-4">
             <div class="job-vip">
                <h3 class="title"><i class="fa fa-star-o"></i> <span>Việc làm tốt</span></h3>
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