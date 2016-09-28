<div id="siderbar-right" class="span4">
    <div class="siderbar latest-post">
        <h3 class="title"><span>Tin tương tự</span></h3>
        @foreach($recent as $val)
            <div class="item clearfix">
                <a href="../noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="../noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
                <div class="desc" >{{$val->desc}}</div>
                <div class="extra">
                <span class="post-time"> {{$val->date_create}} </span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 </span>
                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->view}} </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="siderbar sidebar-ads">
    <img width="225" height="136" src="{{Request::root()}}/public/images/background-new.jpg" class="thumb fl" alt="" title="">
    </div>
    <div class="siderbar sidebar-ads">
    <img width="225" height="136" src="{{Request::root()}}/public/images/background-new.jpg" class="thumb fl" alt="" title="">
    </div>
    @if(!empty($news))
    <div class="siderbar latest-post">
        <h3 class="title"><span>Tin tức</span></h3>
        @foreach($news as $val)
            <div class="item clearfix">
                <a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
                <div class="desc" >{{$val->desc}}</div>
                <div class="extra">
                <span class="post-time"> {{$val->date_create}} </span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 </span>
                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->view}} </span>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    @if(!empty($jobs))
    <div class="siderbar latest-post">
        <h3 class="title"><span>Việc làm</span></h3>
        @foreach($jobs as $val)
            <div class="item clearfix">
                <a href="{{Request::root()}}/viec-lam/noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="{{Request::root()}}/viec-lam/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
                <div class="desc" >{{$val->desc}}</div>
                <div class="extra">
                <span class="post-time"> {{$val->date_create}} </span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 </span>
                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->view}} </span>
                </div>
            </div>
        @endforeach
    </div>
    @endif
    @if(!empty($ads))
    <div class="siderbar latest-post">
        <h3 class="title"><span>Rao Vặt</span></h3>
        @foreach($ads as $val)
            <div class="item clearfix">
                <a href="{{Request::root()}}/rao-vat/noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="{{Request::root()}}/rao-vat/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
                <div class="desc" >{{$val->desc}}</div>
                <div class="extra">
                <span class="post-time"> {{$val->date_create}} </span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 </span>
                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->view}} </span>
                </div>
            </div>
        @endforeach
    </div>
    @endif()
</div>