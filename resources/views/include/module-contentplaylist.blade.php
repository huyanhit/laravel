<div id="muti-audio">
	<div class="playlist">
	<?php
		//print_r($mutiplaylist);
		//die;
	?>
		<audio width="100%" id="mejs" src="{{Request::root()}}/public/uploads/file/{{!empty($mutiplaylist[0]->file)?$mutiplaylist[0]->file:''}}" type="audio/mp3" controls="controls">
			@foreach( $mutiplaylist as $val )
			<source src="{{Request::root()}}/public/uploads/file/{{$val->file}}" title="{{$val->title}}">
			@endforeach
		</audio>
	</div>
</div>


