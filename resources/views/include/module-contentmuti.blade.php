<div id="muti-story" class="container">
	<div class="single"> 
		@if($muti->catmuti == 1 || $muti->catmuti == 2 || $muti->catmuti == 4 )
		<audio id="player2" src="{{Request::root()}}/public/uploads/file/{{$muti->file}}" type="audio/mp3" controls="controls"></audio>
		@endif
		@if($muti->catmuti == 3)
		<video src="{{Request::root()}}/public/uploads/file/{{$muti->file}}" type="video/mp4" 
		id="player1" poster="{{$muti->image}}" 
		controls="controls" preload="none"></video>
		@endif
	</div>
</div>

