<!DOCTYPE html>
<html lang="en">
	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Blog Tay Nguyen</title>

	    <link rel="stylesheet" id="bootstrap-css" href="{{Request::root()}}/resources/assets/css/bootstrap.min.css" type="text/css">
	    <link rel="stylesheet" id="font-awesome-css" href="{{Request::root()}}/resources/assets/css/font-awesome.min.css" type="text/css">
	    <link rel="stylesheet" id="carousel-css" href="{{Request::root()}}/resources/assets/css/owl.carousel.css" type="text/css">
	    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/resources/assets/css/flexslider.css" type="text/css" media="all">
	    <link rel="stylesheet" id="carousel-css" href="{{Request::root()}}/resources/assets/css/mediaelementplayer.min.css" type="text/css">
	    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/resources/assets/css/mep-feature-playlist.css" type="text/css" media="all">
	    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/public/css/app.css" type="text/css" media="all">

	    <script src="{{Request::root()}}/resources/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/mediaelement-and-player.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/mep-feature-playlist.js" type="text/javascript"></script>

	    <script src="{{Request::root()}}/resources/assets/js/ajax.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/app.js" type="text/javascript"></script>

	</head>
	<body id="layout">
		@include('include.header')
	    @yield('content')
	    @include('include.footer')
	</body>
</html>
