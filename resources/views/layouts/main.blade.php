<!DOCTYPE html>
<html lang="en">
	<head>

	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Blog Tay Nguyen</title>

	    <link rel="stylesheet" id="bootstrap-responsive-css" href="./resources/assets/css/bootstrap.css" type="text/css">
	    <link rel="stylesheet" id="bootstrap-responsive-css" href="./resources/assets/css/owl.carousel.css" type="text/css">
	    <link rel="stylesheet" id="bootstrap-responsive-css" href="./resources/assets/css/style.css" type="text/css">
	    <link rel="stylesheet" id="style-css" href="./public/css/app.css" type="text/css" media="all">
	    
	    <script src="./resources/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
	    <script src="./resources/assets/js/owl.carousel.min.js" type="text/javascript"></script>
	    <script src="./resources/assets/js/app.js" type="text/javascript"></script>

	</head>
	<body id="layout">
		@include('include.header')
		@include('include.module-headerline')
		@include('include.module-intro')
	    @yield('content')
	    @include('include.footer')
	</body>
</html>