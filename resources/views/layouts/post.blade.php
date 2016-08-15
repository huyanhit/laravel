<!DOCTYPE html>
<html lang="en">
	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Blog Tay Nguyen</title>

	    <link rel="stylesheet" id="bootstrap-css" href="{{Request::root()}}/resources/assets/css/bootstrap.css" type="text/css">
	    <link rel="stylesheet" id="font-awesome-css" href="{{Request::root()}}/resources/assets/css/font-awesome.min.css" type="text/css">
	    <link rel="stylesheet" id="style-css" href="{{Request::root()}}/public/css/app.css" type="text/css" media="all">
	    <script src="{{Request::root()}}/resources/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	    <script src="{{Request::root()}}/resources/assets/js/ajax.js" type="text/javascript"></script>
    	<script src="{{Request::root()}}/resources/assets/ckeditor/ckeditor.js" type="text/javascript"></script>
	</head>
	<body id="layout">
		@include('include.header')
	    @yield('content')
	    @include('include.footer')
	</body>
</html>
