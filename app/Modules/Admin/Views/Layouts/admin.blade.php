<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>

    <link rel="stylesheet" id="bootstrap-css" href="./resources/assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" id="font-awesome-css" href="./resources/assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" id="style-css" href="./public/css/admin.css" type="text/css" media="all">

    <script src="./resources/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="./resources/assets/js/admin.js" type="text/javascript"></script>

</head>
<body>
	@include('Admin::include.header')
    @yield('content')
    @include('Admin::include.footer')
</body>
</html>