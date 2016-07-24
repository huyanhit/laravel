<!DOCTYPE html>
<html>
<head>
	<title>Administrator</title>
    <link rel="stylesheet" id="bootstrap-css" href="{{Request::root()}}./app/Modules/Admin/Views/Assets/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" id="font-awesome-css" href="{{Request::root()}}./app/Modules/Admin/Views/Assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" id="style-css" href="{{Request::root()}}./public/css/admin.css" type="text/css" media="all">
    <script src="{{Request::root()}}./app/Modules/Admin/Views/Assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
    <script src="{{Request::root()}}./app/Modules/Admin/Views/Assets/js/admin.js" type="text/javascript"></script>
    <script src="{{Request::root()}}./app/Modules/Admin/Views/Assets/js/ajax.js" type="text/javascript"></script>

</head>
<body>
	@include('Admin::include.header')
    @yield('content')
    @include('Admin::include.footer')
</body>
</html>