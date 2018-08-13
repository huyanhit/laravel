<div id="muti-audio">
	<div class="playlist">
		<audio width="100%" id="mejs" src="{{!empty($mutiplaylist[0]->file)?$mutiplaylist[0]->file:''}}" type="audio/mp3" controls="controls">
			@foreach( $mutiplaylist as $val )
			<source src="{{$val->file}}" title="{{$val->title}}">
			@endforeach
		</audio>
	</div>
</div>


