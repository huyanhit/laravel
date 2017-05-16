<div id="ajaxsend">
	<img src="{{Request::root()}}/resources/assets/images/ajax-loader.gif">
</div>
<div id="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2" id="logo">
				Administrator
			</div>
			<div class="col-md-7">
				<ul id="menu">
					<li><a href="{{Request::root().'/admin/news'}}">News</a>
						<ul class="submenu">
							<li><a href="{{Request::root().'/admin/news'}}">List</a> </li>
							<li><a href="{{Request::root().'/admin/news/insert'}}">Insert</a></li>
							<li><a href="{{Request::root().'/admin/catnews'}}">Categories</a></li>
							<li><a href="{{Request::root().'/admin/typenews'}}">Types</a></li>
						</ul>
					</li>
					<li><a href="{{Request::root().'/admin/jobs'}}">Jobs</a> 
						<ul class="submenu">
							<li><a href="{{Request::root().'/admin/jobs'}}">List</a> </li>
							<li><a href="{{Request::root().'/admin/jobs/insert'}}">Insert</a></li>
						</ul>
					</li>
					<li><a href="{{Request::root().'/admin/ads'}}">Ad</a>
						<ul class="submenu">
							<li><a href="{{Request::root().'/admin/ads'}}">List</a> </li>
							<li><a href="{{Request::root().'/admin/ads/insert'}}">Insert</a></li>
						</ul>
					</li>
					<li><a href="#">Mutilmedia</a>
						<ul class="submenu">
							<li><a href="{{Request::root().'/admin/muti'}}">Muti List</a> </li>
							<li><a href="{{Request::root().'/admin/muti/insert'}}">Muti Insert</a></li>
							<li><a href="{{Request::root().'/admin/playlist'}}">Playlist</a> </li>
							<li><a href="{{Request::root().'/admin/playlist/insert'}}">Playlist Insert</a></li>
						</ul>
					</li>
					<li><a href="#">Shop</a></li>
					<li><a href="#">Account</a></li>
					<li><a href="#">Comment</a></li>
					<li><a href="#">System</a></li>
				</ul>
			</div>
			<div class="col-md-3">
				<div class="avata">
					<a href="#">
						<img src="{{Request::root()}}/resources/assets/images/user.png" alt="Magazine">
					</a>
				</div>
				<div class="welcome">
					<span>Hi:</span> Huy
				</div>
				<div class="logout">
					<a href="#">
						Logout
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
