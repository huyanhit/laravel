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
							<li><a href="{{Request::root().'/admi/news'}}">List</a> </li>
							<li><a href="{{Request::root().'/admin/insert'}}">Insert</a></li>
						</ul>
					</li>
					<li><a href="{{Request::url()}}">Jobs</a> </li>
					<li><a href="#">Ad</a></li>
					<li><a href="#">Mutilmedia</a></li>
					<li><a href="#">Shop</a></li>
					<li><a href="#">Account</a></li>
					<li><a href="#">comment</a></li>
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
