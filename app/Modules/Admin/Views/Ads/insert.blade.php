@extends('Admin::Layouts.admin')
@section('content')

<div id="insert" class="container">
	<h3 class="title-insert text-center">
	@if(isset($edit))
		{{'Edit - Ads'}}
	@else
		{{'Insert - Ads'}}
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
	      		<input type="text" class="form-control" name="title" id="title" placeholder="Input Title" value="{{isset($frm['title'])?$frm['title']:''}}" required>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Description</label>
	    	<div class="col-sm-9">
	      		<textarea class="form-control" name="desc" id="desc" placeholder="Input description" required>{{isset($frm['desc'])?$frm['desc']:''}}</textarea>
	      		<script type="text/javascript">CKEDITOR.replace('desc'); </script>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Category Ads</label>
	    	<div class="col-sm-9">
				<select class="form-control" id="catads" name="catads">
					@foreach($catads as $val)
				  	<option
				  	@if(isset($frm['catads']) && ($frm['catads'] == $val->id))
				  		{{'selected'}}
				  	@endif
				  	value="{{$val->id}}">{{$val->title}}</option>
				  	@endforeach
				</select>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Type Ads</label>
	    	<div class="col-sm-9">
				<select class="form-control" id="typeads" name="typeads">
					@foreach($typeads as $val)
				  	<option
				  	@if(isset($frm['typeads']) && ($frm['typeads'] == $val->id))
				  		{{'selected'}}
				  	@endif
				  	value="{{$val->id}}">{{$val->title}}</option>
				  	@endforeach
				</select>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Location</label>
	    	<div class="col-sm-9">
				<select class="form-control" id="location" name="location">
					@foreach($location as $val)
				  	<option
				  	@if(isset($frm['location']) && ($frm['location'] == $val->id))
				  		{{'selected'}}
				  	@endif
				  	value="{{$val->id}}">{{$val->title}}</option>
				  	@endforeach
				</select>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Feature Image</label>
	    	<div class="col-sm-9">
	      		<input type="file" class="form-control" name="feature" id="feature">
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Content</label>
	    	<div class="col-sm-9">
	      		<textarea class="form-control" id="content" placeholder="Content" name="content" required> {{isset($frm['content'])?$frm['content']:''}} </textarea>
	      		<script type="text/javascript">CKEDITOR.replace('content'); </script>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3" >Active</label>
	    	<div class="col-sm-9">
	      		<input type="checkbox" id="active" name="active" {{(isset($frm['active']) && $frm['active']==1)?'checked':''}} >
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3" ></label>
	    	<div class="col-sm-9">
	      		<input type="submit" id="submit" name="submit">
	    	</div>
	 	</div>
	</form>
</div>
@endsection