@extends('Admin::Layouts.admin')
@section('content')

<div id="insert" class="container">
	<h3 class="title-insert text-center">
	@if(isset($edit))
		{{'Edit - Playlist'}}
	@else
		{{'Insert - Playlist'}}
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
	    	<label class="control-label col-sm-3">List file</label>
	    	<div class="col-sm-9">
	      		<input type="text" class="form-control" name="searchmuti" id="searchmuti">
	      		<div class="row">
	      			<div class="col-sm-6">
		      			<input type="hidden" name="playlist-muti" id="playlist-muti"  value="@foreach($playlistmuti as $val){{$val->id.','}}@endforeach">
		      			<h5>List Search</h5>
		      			<ul id="listchoose">
		      			</ul>
		      		</div>
		      		<div class="col-sm-6">
		      			<h5>Has Add</h5>
		      			<ul id="listadd" class="col-sm-6">
		      				@foreach($playlistmuti as $val)
		      					<li data='{{$val->id}}'>{{ $val->title }}<span class='btn-delete'>delete</span></li>
		      				@endforeach
		      			</ul>
		      		</div>
	      		</div>
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