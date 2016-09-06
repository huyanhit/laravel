<div id="muti-audio" class="container">
	<div class="playlist">
		<audio id="mejs" src="{{Request::root()}}/public/uploads/file/{{$mutiplaylist[0]->file}}" type="audio/mp3" controls="controls">
			@foreach( $mutiplaylist as $val )
			<source src="{{Request::root()}}/public/uploads/file/{{$val->file}}" title="{{$val->title}}">
			@endforeach
		</audio>
	</div>
</div>


