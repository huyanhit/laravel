@extends('Admin::Layouts.admin')
@section('content')
<div class="container">
	<h3 class="title-insert text-center"> Insert - News </h3>
	<form class="form-horizontal" method="post" action="{{Request::url()}}" enctype="multipart/form-data">

	  	<div class="form-group title">
	    	<label class="control-label col-sm-3">Title</label>
	    	<div class="col-sm-9">
	      		<input type="text" class="form-control" name="title" id="title" placeholder="Input Title">
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Description</label>
	    	<div class="col-sm-9">
	      		<textarea class="form-control" name="desc" id="desc" placeholder="Input description"> </textarea>
	      		<script type="text/javascript">CKEDITOR.replace('desc'); </script>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Type news</label>
	    	<div class="col-sm-9">
				<select class="form-control" id="typenews"  name="typenews">
				  	<option value="1">Volvo</option>
				  	<option value="2">Saab</option>
				  	<option value="3">Mercedes</option>
				  	<option value="4">Audi</option>
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
	      		<textarea class="form-control" id="content" placeholder="Content" name="content"> </textarea>
	      		<script type="text/javascript">CKEDITOR.replace('content'); </script>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">From</label>
	    	<div class="col-sm-9">
	      		<input type="text" class="form-control" name="from" >
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3" for="inputSuccess3">Active</label>
	    	<div class="col-sm-9">
	      		<input type="checkbox" id="active" name="active">
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3" for="inputSuccess3"></label>
	    	<div class="col-sm-9">
	      		<input type="submit" id="submit" name="submit">
	    	</div>
	 	</div>
	</form>
</div>
@endsection