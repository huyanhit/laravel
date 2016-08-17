<div id="list" class="container">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<td>
					<span class="title">Tittle</span>
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
					Trang thai	
				</td>
				
				<td>
					<span class="title">View</span>
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
					Post Facebook
				</td>
				<td>
					thao tac
				</td>
			</tr>
		</thead>
		<form id="filter" method="post" action="{{Request::url().$urlsort}}">
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
					    value="choose">Choose</option>
					    <option 
					    @if(session('active') == '1')
					    {{'selected'}}
					    @endif
					    value="active">Active</option>
					    <option
					    @if(session('active') == '0')
					    {{'selected'}}
					    @endif
					    value="unactive">Unactive</option>
					</select> 
				</td>
				
				<td>
					#
				</td>
				<td>
					Post Facebook
				</td>
				<td>
					<input type="submit" name="submit" value=" Filter ">
				</td>
			</tr>
		</form>
		<tbody>
			@foreach($jobs as $key=> $val)
			<tr class="">
				<td>
					{{$val->title}}	
				</td>
				<td >
					@if($val->active == 1)
						Active
					@else
						Pedding
					@endif
				</td>
				<td>
					{{$val->view}}	
				</td>
				<td>
					@if($val->active == 1)
					<a id="postface" href="{{Request::root()}}/postface/{{$val->id}}">
						Dang fanpage
					</a>
					@else
						Cho kich hoat
					@endif
				</td>
				<td>
					<a class="ajaxdelete" href="{{Request::url()}}/delete?id={{$val->id}}"> <i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-3 action">
			<select name="apply">
			   <option value="1">Active</option>
			   <option value="2">Unactive</option>
			   <option value="3">Delete</option>
			</select> 
			<input type="button" name="apply" value="Apply">
		</div>
		<div class=" col-md-6 pagination">
			{!! $jobs->render() !!}
		</div>
		<div class=" col-md-3">
			
		</div>
	</div>
</div>

	
