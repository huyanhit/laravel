<div id="muti-story">
	<div class="single">
		@if($result->type == 'mp3')
		<audio id="player2" width="100%" src="{{$result->file}}" type="audio/mp3" controls="controls"></audio>
		@endif
		@if($result->type == 'mp4')
		<video width="100%" height="506px" src="{{$result->file}}" type="video/mp4"
		id="player1" poster="{{$result->image}}" 
		controls="controls" preload="none"></video>
		@endif
	</div>
</div>

