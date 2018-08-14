<!DOCTYPE html>
<html lang="en">
	<head>
		<meta HTTP-EQUIV="Content-Language" CONTENT="vi">
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	    <title>Blog - Tin tuc - Viec lam - Rao vat - Gia lai - Tay nguyen</title>
		<meta name="description" content="Blog Tin tuc, Viec lam, Rao vat, Giai tri, Gia lai, Tay nguyen" />
		<meta name="copyright" content="Copyright XuLanh 2017">
		<meta name="keywords" content="thông tin việc làm, tin tức, rao vặt, giải trí, giá thị trường cà phê nông sản, thảo luận các dịa điểm du lịch, ăn uống khu vực tây nguyên - gia lai">

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
