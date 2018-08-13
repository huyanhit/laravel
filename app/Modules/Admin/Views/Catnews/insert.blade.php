@extends('Admin::Layouts.admin')
@section('content')

<div id="insert" class="container">
	<h3 class="title-insert text-center">
	@if(isset($edit))
		{{'Edit - Category News'}}
	@else
		{{'Insert - Category News'}}
	@endif
	</h3>
	<form class="form-horizontal" method="post" action="
	@if(isset($edit))
		{{Request::url().'?id='.$edit}}
	@else
		{{Request::url()}}
	@endif
	" enctype="multipart/form-data">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	  	<div class="form-group title">
	    	<label class="control-label col-sm-3">Title</label>
	    	<div class="col-sm-9">
				{{ Form::input('text','title',isset($frm['title'])?$frm['title']:'',array('class' => 'form-control','placeholder' => 'Input title'))}}
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Icon</label>
	    	<div class="col-sm-9">
				{{ Form::input('text','icon',isset($frm['icon'])?$frm['icon']:'',array('class' => 'form-control','placeholder' => 'Input icon'))}}
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3" >Active</label>
	    	<div class="col-sm-9">
				{{Form::checkbox('active', 1,(isset($frm['active']) && $frm['active']==1)? 'yes': 'no')}}
			</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3" ></label>
	    	<div class="col-sm-9">
				<input type="submit" id="submit" name="submit" value="Save & Back List">
	      		<input type="submit" id="submit" name="submit_edit" value="Save & Edit">
	    	</div>
	 	</div>
	</form>
</div>
@endsection