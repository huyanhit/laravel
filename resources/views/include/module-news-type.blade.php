<div id="news-types" class="container">
@foreach($newsTypes as $newsType)   
    <div class="row">
        @foreach($newsType as $val)   
        <div class="item">
            div class="images"><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}"><img width="225" height="136" src="{{$val->image}}" class="thumb" alt="{{$val->title}}"></a></div>
            <h4 class="post-title"><a href="{{Request::root()}}/tin-tuc/noi-dung/{{$val->id}}">{{$val->title}}</a></h4>
            <div class="desc">{{$val->desc}}</div>
            <div class="date"> </div>
            <div class="orther"><span class="view">view</span><span class="like"></span></div>
        </div>
        @endforeach
    </div>
@endforeach
</div>