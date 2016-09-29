<div id="list" class="container">
	<div class="title-line" class="col-xs-12">
         	<h3><span>Rao vặt</span></h3>
         	<a href="{{Request::url()}}/dang-tin-rao-vat">Đăng Tin</a>
    </div>
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<td>
					<span class="title">Tiêu đề</span>
					<span class="sort">
						<a href="{{Request::url()}}?order=title&by=asc">
							<i class="
							@if((session('order')=='title')&&(session('by')=='asc'))
								{{'active'}}
							@endif
							fa fa-sort-asc" aria-hidden="true"></i>
						</a>
						<a href="{{Request::url()}}?order=title&by=desc">
							<i class="
							@if((session('order')=='title')&&(session('by')=='desc'))
								{{'active'}}
							@endif
							fa fa-sort-desc" aria-hidden="true"></i>
						</a>
					</span> 
				</td>
				<td>
					<span class="title">Trạng thái</span>
				</td>
				
				<td>
					<span class="title">Lượt xem</span>
					<span class="sort">
						<a href="{{Request::url()}}?order=view&by=asc">
							<i class="
							@if((session('order')=='view')&&(session('by')=='asc'))
								{{'active'}}
							@endif
							fa fa-sort-asc" aria-hidden="true"></i>
						</a>
						<a href="{{Request::url()}}?order=view&by=desc">
							<i class="
							@if((session('order')=='view')&&(session('by')=='desc'))
								{{'active'}}
							@endif
							fa fa-sort-desc" aria-hidden="true"></i>
						</a>
					</span>  
				</td>
				<td>
					<span class="title"> Đăng facebook </span>
				</td>
				<td>
					<span class="title"> Thao tác </span>
				</td>
			</tr>
		</thead>
		<form id="filter" method="post" action="{{Request::url().$urlsort}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<tr>
				<td>
					<input type="text" name="title" value="{{session('title')}}">
				</td>
				<td>
					<select id="active" name="active">
					 	<option 
					    @if(session('active') == '')
					    {{'selected'}}
					    @endif
					    value="choose">Lựa chọn</option>
					    <option 
					    @if(session('active') == '1')
					    {{'selected'}}
					    @endif
					    value="active">Đã đăng</option>
					    <option
					    @if(session('active') == '0')
					    {{'selected'}}
					    @endif
					    value="unactive">Đang chờ duyệt</option>
					</select> 
				</td>
				
				<td>
				</td>
				<td>
					<a href="">Fanpage <i class="fa fa-facebook"></i></a>
				</td>
				<td>
					<input type="submit" name="submit" value="Lọc thông tin">
				</td>
			</tr>
		</form>
		<tbody>
			@foreach($ads as $key=> $val)
			<tr class="">
				<td>
					{{$val->title}}	
				</td>
				<td >
					@if($val->active == 1)
						Đã đăng
					@else
						Đang chờ duyệt
					@endif
				</td>
				<td>
					{{$val->view}}	
				</td>
				<td>
					@if($val->active == 1)
					<a id="postface" href="{{Request::url()}}/postface/{{$val->id}}">
						Đăng tin
					</a>
					@else
						Đang chờ duyệt
					@endif
					
				</td>
				<td>
					<a href="{{Request::url()}}/xem-tin-rao-vat?id={{$val->id}}"><i class="fa fa-share-square-o" aria-hidden="true"></i></i></a>
					<a href="{{Request::url()}}/sua-tin-rao-vat?id={{$val->id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a class="ajaxdelete" href="{{Request::url()}}/delete?id={{$val->id}}"> <i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class=" col-md-9 pagination">
			{!! $ads->render() !!}
		</div>
		<div class=" col-md-3">
		</div>
	</div>
</div>

	
