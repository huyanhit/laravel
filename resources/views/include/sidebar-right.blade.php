<div id="siderbar-right" class="span4">
    <div class="siderbar latest-post">
        <h3 class="title"><span>Recent Posts</span></h3>
        @foreach($recent as $val)
            <div class="item clearfix">
                <a href="{{Request::root()}}/noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="{{Request::root()}}/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
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

    <div class="siderbar latest-post">
        <h3 class="title"><span>Viec lam</span></h3>
        @foreach($jobs as $val)
            <div class="item clearfix">
                <a href="{{Request::root()}}/noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="{{Request::root()}}/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
                <div class="desc" >{{$val->desc}}</div>
                <div class="extra">
                <span class="post-time"> {{$val->date_create}} </span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 </span>
                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->view}} </span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="siderbar latest-post">
        <h3 class="title"><span>Rao Vat</span></h3>
        @foreach($ads as $val)
            <div class="item clearfix">
                <a href="{{Request::root()}}/noi-dung/{{$val->id}}"><img  src="{{$val->image}}" title="{{$val->title}}"></a>
                <h4><a href="{{Request::root()}}/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
                <div class="desc" >{{$val->desc}}</div>
                <div class="extra">
                <span class="post-time"> {{$val->date_create}} </span>
                <span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 1 </span>
                <span class="view"><i class="fa fa-eye" aria-hidden="true"></i> {{$val->view}} </span>
                </div>
            </div>
        @endforeach
    </div>

</div>