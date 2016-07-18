<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <title>Blog Tay Nguyen</title>
	    <link rel="stylesheet" id="bootstrap-responsive-css" href="./resources/assets/css/bootstrap.css" type="text/css" media="all">
	    <link rel="stylesheet" id="style-css" href="./public/css/app.css" type="text/css" media="all">
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
