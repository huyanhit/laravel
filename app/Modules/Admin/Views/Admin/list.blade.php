@extends('Admin::Layouts.admin')
@section('content')
<div class="container-fluid">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<td>
					<input type="checkbox" name="checkall">	
				</td>
				<td>
					Tittle	
				</td>
				<td>
					Description	
				</td>
				<td>
					Get From	
				</td>
				<td>
					Active	
				</td>
				<td>
					View
				</td>
				<td>
					Action
				</td>
			</tr>
		</thead>
		<form id="filter">
			<tr>
				<td>
					#
				</td>
				<td>
					<input type="text" name="title">
				</td>
				<td>
					<input type="text" name="decs">
				</td>
				<td>	
					<input type="text" name="from">
				</td>
				<td>
					<select>
					   <option value="volvo">Active</option>
					   <option value="saab">Unactive</option>
					</select> 
				</td>
				<td>
					#
				</td>
				<td>
					<input type="submit" name="submit">
				</td>
			</tr>
		</form>
		<tbody>
			@foreach($news as $key=> $val)
			<tr>
				<td>
					<input type="checkbox" name="check_{{++$key}}">
				</td>
				<td>
					{{$val->catnews}}	
				</td>
				<td>
					{{$val->desc}}	
				</td>
				<td>
					{{$val->from}}	
				</td>
				<td>
				@if($val->active == 1)
					<input type="checkbox" checked name="active">
				@else
					<input type="checkbox" name="unactive">
				@endif		
				</td>
				<td>
					{{$val->view}}	
				</td>
				<td>
					<a href="#"> <i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
					<a href="#"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
					<a href="#"> <i class="fa fa-minus-square-o" aria-hidden="true"></i></a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-md-3 action">
			<select>
			   <option value="volvo">Active</option>
			   <option value="saab">Unactive</option>
			</select> 
			<input type="button" name="apply" value="apply">
		</div>
		<div class=" col-md-6 pagination">
			<span class="active">1</span>
			<span>1</span>
			<span>1</span>
			<span>1</span>
			<span>1</span>
			<span>1</span>
			<span>1</span>
		</div>
		<div class=" col-md-3">
			
		</div>
	</div>
</div>
@endsection

	
