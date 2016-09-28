<div id="muti-story">
	<div class="single"> 
		@if($result->catmuti == 1 || $result->catmuti == 2 || $result->catmuti == 4 )
		<audio id="player2" width="100%" src="{{Request::root()}}/public/uploads/file/{{$result->file}}" type="audio/mp3" controls="controls"></audio>
		@endif
		@if($result->catmuti == 3)
		<video width="100%" height="768" src="{{Request::root()}}/public/uploads/file/{{$result->file}}" type="video/mp4" 
		id="player1" poster="{{$result->image}}" 
		controls="controls" preload="none"></video>
		@endif
	</div>
</div>

