<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
    <link rel="stylesheet" id="bootstrap-css" href="{{Request::root()}}/app/Modules/Admin/Views/Assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" id="font-awesome-css" href="{{Request::root()}}/app/Modules/Admin/Views/Assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/app/Modules/Admin/Views/Assets/css/jquery-ui.min.css" type="text/css" media="all">
    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/app/Modules/Admin/Views/Assets/css/admin.css" type="text/css" media="all">

    <script src="{{Request::root()}}/app/Modules/Admin/Views/Assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="{{Request::root()}}/app/Modules/Admin/Views/Assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{Request::root()}}/app/Modules/Admin/Views/Assets/js/jquery.validate.min.js" type="text/javascript"></script>
    <script src="{{Request::root()}}/app/Modules/Admin/Views/Assets/js/admin.js" type="text/javascript"></script>
    <script src="{{Request::root()}}/app/Modules/Admin/Views/Assets/js/ajax.js" type="text/javascript"></script>
    <script src="{{Request::root()}}/app/Modules/Admin/Views/Assets/ckeditor/ckeditor.js" type="text/javascript"></script>
    
</head>
<body>
    <div id="ajaxsend">
    	<img src="{{Request::root()}}/app/Modules/Admin/Views/Assets/images/ajax-loader.gif">
    </div>
    <div id="header">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-md-2" id="logo">
    				<a href="{{Request::root().'/admin'}}">Administrator</a>
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
    						<img src="{{Request::root()}}/app/Modules/Admin/Views/Assets/images/user.png" alt="Magazine">
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
    				<div class="home-page pull-right">
    					<i class="fa fa-home" aria-hidden="true"></i>
    					<a target="_blank" href="{{Request::root()}}">
    						Home Page
    					</a>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    @if ($errors->any())
    <div class="container">
    	<div class="alert alert-danger">
    		<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{ $error }}</li>
    			@endforeach
    		</ul>
    	</div>
    </div>
    @endif

    @yield('content')
    {{--@include('Admin::include.footer')--}}
</body>
</html>