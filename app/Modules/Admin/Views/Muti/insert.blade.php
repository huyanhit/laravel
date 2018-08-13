@extends('Admin::Layouts.admin')
@section('content')

<div id="insert" class="container">
	<h3 class="title-insert text-center">
	@if(isset($edit))
		{{'Edit - Muti'}}
	@else
		{{'Insert - Muti'}}
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
				{{Form::input('text','title',isset($frm['title'])?$frm['title']:'',array('class' => 'form-control','placeholder' => 'Input title'))}}
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Description</label>
	    	<div class="col-sm-9">
				{{Form::textarea ('desc',isset($frm['desc'])?$frm['desc']:'',array('id'=>'desc', 'class'=>'form-control', 'placeholder'=>'Input description'))}}
	      		<script type="text/javascript">CKEDITOR.replace('desc'); </script>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Category Muti</label>
	    	<div class="col-sm-9">
				{{Form::select('catmuti', $catmuti, isset($frm['catmuti'])?$frm['catmuti']:null, array('id'=>'catmuti', 'class'=>'form-control'))}}
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Type Muti</label>
	    	<div class="col-sm-9">
				{{Form::select('typemuti', $typemuti, isset($frm['typemuti'])?$frm['typemuti']:null, array('id'=>'typemuti', 'class'=>'form-control'))}}
	    	</div>
	 	</div>
		<div class="form-group">
			<label class="control-label col-sm-3">Positions</label>
			<div class="col-sm-9">
				{{Form::select('positions', $positions, isset($frm['positions'])?$frm['positions']:null, array('id'=>'positions', 'class'=>'form-control'))}}
			</div>
		</div>

		<div class="form-group">
			<label class="control-label col-sm-3">Playlist</label>
			<div class="col-sm-9">
				<input type="hidden" value="{{$edit}}" id="hidden_playlist">
				{{Form::input('text','playlist',isset($frm['playlist'])?$frm['playlist']:null,array('id'=>'playlist','class' => 'form-control','placeholder' => 'Input Playlist'))}}
				<div id="listchoose">

				</div>
				{{--{{Form::select('playlist', $playlist, isset($frm['playlist'])?$frm['playlist']:null, array('id'=>'playlist', 'class'=>'form-control'))}}--}}
			</div>
		</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Feature Image</label>
	    	<div class="col-sm-9">
	      		<span class="inline"><img src="{{isset($frm['image'])?URL_THUMB_PATH.$frm['image']:''}}"></span>
	      		<span class="inline">
				{{Form::file('feature',array('id'=>'feature', 'class'=>'form-control'))}}
				</span>
	    	</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">File</label>
			<div class="col-sm-9">
			<span class="inline"></span>
			<span class="inline">
				{{Form::file('file',array('id'=>'file', 'class'=>'form-control'))}}
	    	</span>
			</div>
	 	</div>
	 	<div class="form-group">
	    	<label class="control-label col-sm-3">Content</label>
	    	<div class="col-sm-9">
				{{Form::textarea ('content',isset($frm['content'])?$frm['content']:'',array('id'=>'content', 'class'=>'form-control', 'placeholder'=>'Input content'))}}
	      		<script type="text/javascript">CKEDITOR.replace('content'); </script>
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
	      		<input type="submit" id="submit" name="submit" value="Save New">
	      		<input type="submit" id="submit" name="submit_edit" value="Save & Edit">
	    	</div>
	 	</div>
	</form>
</div>
@endsection