<div id="module-comment">
	<div class="title-line clearfix">
    	<h3><span>Bình luận</span></h3> 
	</div>
	<ul id="comment-script">
		@php
			function loopchild($comment){
				echo '<ul>';
				foreach ($comment as $val){
				echo '
					<li>
						<div class="content clearfix">
							<div class="avata"><img src="'.Request::root().'/public/images/background-new.jpg"></div>';
							if($val->active == 0){
								echo '<div class="pendding">Chờ duyệt</div>';
							}
							echo '<div class="extra">
								<span class="name"><strong>'.$val->name.'</strong></span>
								<span class="date">Hồi đáp: '.$val->date_create.'</span>
								<span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> '.$val->like.' </span>
								<span class="dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>'.$val->dislike.'</span>
							</div>
							<div class="desc">'.$val->comment.'</div>
							<div class="reply" data="'.$val->id.'">Hồi đáp</div>
						</div>';
						if($val->child){
							loopchild($val->child);
						}
					echo'</li>';
				}
				echo '</ul>';
			}
		@endphp
		@foreach ($comment as $val)
		<li>
			<div class="content clearfix">
				<div class="avata"><img src="{{Request::root()}}/public/images/background-new.jpg"></div>
				@if($val->active == 0)
				<div class="pendding">Chờ duyệt</div>
				@endif
				<div class="extra">
					<span class="name"><strong>{{$val->name}}</strong></span>
					<span class="date">Bình luận: {{$val->date_create}}</span>
					<span class="like"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> {{$val->like}} </span>
					<span class="dislike"><i class="fa fa-thumbs-o-down" aria-hidden="true"></i>  {{$val->dislike}} </span>
				</div>
				<div class="desc">{{$val->comment}}</div>
				<div class="reply" data="{{$val->id}}">Hồi đáp</div>
			</div>
			@if($val->child)
				@php loopchild($val->child); @endphp
			@endif
		</li>
		@endforeach
	</ul>
	<form id="comment-form" method="POST" action="{{Request::root()}}/insertComment">
		<input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">
		<input type="hidden" id= "frm-id" name="frm-id" value="{{isset($result->id)?$result->id:0}}">
		<input type="hidden" id= "type-id" name="type-id" value="{{isset($typeid)?$typeid:''}}">
		<div class="form-group clearfix">
	        <div class="col-sm-12">
	            <input type="text" id="frm-name" placeholder="Nhập vào tên của bạn" required value="{{$user->name or ''}}">
	        </div>
	    </div>
	    <div class="form-group clearfix">
	        <div class="col-sm-12">
	            <textarea id="frm-comment" placeholder="Nhập vào bình luận" required></textarea>
	        </div>
	    </div>

	    <div class="form-group clearfix">
	        <div class="col-sm-12">
	            <input class="submit" type="button" value="Gửi bình luận">
	        </div>
	    </div>
	</form>
</div>