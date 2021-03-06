<div id="list-jobs" class="my_scroll">
    @foreach($jobs as $val)
    <div class="item "> 
        <div class="title col-xs-8">
        <i class="fa 
        @foreach($typejobs as $vals)
            @if($val->typejobs == $vals->id)
                {{$vals->icon}}
            @else
                fa-star-o
            @endif
        @endforeach 
        " aria-hidden="true"></i> 
            <a href="{{Request::root()}}/viec-lam/noi-dung/{{$val->id}}" class="title" target="_blank" title="{{$val->title}}">
               {{$val->title}}
            </a>
        </div>
        <div class="col-xs-4 text-right">
            <span class="salary"> {{$val->salary}} </span>
        </div>
        <div class="clearfix"></div>
        <div class="bottom">
            <div class="col-xs-8">
                    {{$val->desc}}
            </div>
            <div class="col-xs-2">
                <i class="fa fa-clock-o" aria-hidden="true"></i> {{$val->date_create}}
            </div>
            <div class="col-xs-2 text-right">
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
<div class="pagination ajaxpagin">
    {!! $jobs->render() !!}
</div>