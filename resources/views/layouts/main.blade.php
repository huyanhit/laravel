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
	    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/resources/assets/css/jquery.jscrollpane.css" type="text/css" media="all">
	    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/public/css/app.css" type="text/css" media="all">

	    <script src="{{Request::root()}}/resources/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/modernizr.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/jquery.idTabs.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/jquery.flexslider-min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/jquery.simplyscroll.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/jquery.mousewheel.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/jquery.jscrollpane.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/owl.carousel.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/ajax.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/app.js" type="text/javascript"></script>

	</head>
	<body id="layout">
		@include('include.header')
		@include('include.module-headerline')
		@include('include.module-intro')
	    @yield('content') 
	    @include('include.footer')
	</body>
</html>
