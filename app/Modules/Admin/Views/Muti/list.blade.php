@extends('Admin::Layouts.admin')
@section('content')
<div id="list" class="container-fluid">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<td>
					<input type="checkbox" name="checkall" id="checkAll">	
				</td>
				<td>
					<span class="title">Category</span>
					<span class="sort">
						<a href="{{Request::url()}}?order=catmuti&by=asc">
							<i class="
							@if((session('order')=='catmuti')&&(session('by')=='asc'))
								{{'active'}}
							@endif
							fa fa-sort-asc" aria-hidden="true"></i>
						</a>
						<a href="{{Request::url()}}?order=catmuti&by=desc">
							<i class="
							@if((session('order')=='catmuti')&&(session('by')=='desc'))
								{{'active'}}
							@endif
							fa fa-sort-desc" aria-hidden="true"></i>
						</a>
					</span>
				</td>
				<td>
					<span class="title">Positions</span>
					<span class="sort">
						<a href="{{Request::url()}}?order=positions&by=asc">
							<i class="
							@if((session('order')=='positions')&&(session('by')=='asc'))
							{{'active'}}
							@endif
									fa fa-sort-asc" aria-hidden="true"></i>
						</a>
						<a href="{{Request::url()}}?order=positions&by=desc">
							<i class="
							@if((session('order')=='positions')&&(session('by')=='desc'))
							{{'active'}}
							@endif
									fa fa-sort-desc" aria-hidden="true"></i>
						</a>
					</span>
				</td>
				<td>
					<span class="title">Type</span>
					<span class="sort">
						<a href="{{Request::url()}}?order=typemuti&by=asc">
							<i class="
							@if((session('order')=='typemuti')&&(session('by')=='asc'))
								{{'active'}}
							@endif
							fa fa-sort-asc" aria-hidden="true"></i>
						</a>
						<a href="{{Request::url()}}?order=typemuti&by=desc">
							<i class="
							@if((session('order')=='typemuti')&&(session('by')=='desc'))
								{{'active'}}
							@endif
							fa fa-sort-desc" aria-hidden="true"></i>
						</a>
					</span>
				</td>
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
					<span class="title">Description</span>
					<span class="sort">
						<a href="{{Request::url()}}?order=desc&by=asc">
							<i class="
							@if((session('order')=='desc')&&(session('by')=='asc'))
								{{'active'}}
							@endif
							fa fa-sort-asc" aria-hidden="true"></i>
						</a>
						<a href="{{Request::url()}}?order=desc&by=desc">
							<i class="
							@if((session('order')=='desc')&&(session('by')=='desc'))
								{{'active'}}
							@endif
							fa fa-sort-desc" aria-hidden="true"></i>
						</a>
					</span> 
				</td>
				<td>
					Active	
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
					Action
				</td>
			</tr>
		</thead>
		<form id="filter" method="post" action="{{Request::url().$urlsort}}">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<tr>
				<td>
					#
				</td>
				<td>
					<select  id="catmuti" name="catmuti">
						<option 
					    @if(session('catmuti') == '')
					    {{'selected'}}
					    @endif
					    value="choose">Choose</option>
						@foreach($catmuti as $val)
					  	<option
					  	@if(session('catmuti') == $val->id)
					  		{{'selected'}}
					  	@endif
					  	value="{{$val->id}}">{{$val->title}}</option>
					  	@endforeach
					</select>
				</td>
				<td>
					<select  id="positions" name="positions">
						<option
								@if(session('positions') == '')
								{{'selected'}}
								@endif
								value="choose">Choose</option>
						@foreach($positions as $val)
							<option
									@if(session('positions') == $val->code)
									{{'selected'}}
									@endif
									value="{{$val->code}}">{{$val->name}}</option>
						@endforeach
					</select>
				</td>
				<td>
					<select  id="typemuti" name="typemuti">
						<option 
					    @if(session('typemuti') == '')
					    {{'selected'}}
					    @endif
					    value="choose">Choose</option>
						@foreach($typemuti as $val)
					  	<option
					  	@if(session('typemuti') == $val->id)
					  		{{'selected'}}
					  	@endif
					  	value="{{$val->id}}">{{$val->title}}</option>
					  	@endforeach
					</select>
				</td>
				<td>
					<input type="text" name="title" value="{{session('title')}}">
				</td>
				<td>
					<input type="text" name="desc" value="{{session('desc')}}">
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
				<td colspan="2">
					<input type="submit" name="submit" value=" Filter ">
					<a class="btn btn-insert pull-right" href="{{Request::url()}}/insert"> Add New </a>
				</td>
			</tr>
		</form>
		<tbody>
			@foreach($muti as $key=> $val)
			<tr class="">
				<td>
					<input type="checkbox" name="check" data="{{$val->id}}">
				</td>
				<td>
					@foreach($catmuti as $vals)
						@if($val->catmuti == $vals->id)
							{{$vals->title}}
						@endif
					@endforeach		
				</td>
				<td>
					@foreach($positions as $vals)
						@if($val->positions == $vals->code)
							{{$vals->name}}
						@endif
					@endforeach
				</td>
				<td>
					@foreach($typemuti as $vals)
						@if($val->typemuti == $vals->id)
							{{$vals->title}}
						@endif
					@endforeach	
				</td>
				<td>
					{{$val->title}}	
				</td>
				<td>
					{{strip_tags($val->desc)}}	
				</td>
				
				<td >
					@if($val->active == 1)
						<input type="checkbox" checked name="active" url="{{Request::url()}}/active?id={{$val->id}}">
					@else
						<input type="checkbox" name="active" url="{{Request::url()}}/active?id={{$val->id}}">
					@endif
				</td>
				<td>
					{{$val->view}}	
				</td>
				<td>
					<a href="{{Request::url()}}/insert?id={{$val->id}}"> <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
					<a href="{{Request::url()}}/edit?id={{$val->id}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
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
			{!! $muti->render() !!}
		</div>
		<div class=" col-md-3">
			<a class="btn btn-insert pull-right" href="{{Request::url()}}/insert"> Add New </a>
		</div>
	</div>
</div>
@endsection

	
