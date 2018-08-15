<!DOCTYPE html>
<html>
<head>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Đăng Nhập</title>
        <link rel="stylesheet" id="bootstrap-css" href="{{Request::root()}}/resources/assets/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" id="font-awesome-css" href="{{Request::root()}}/resources/assets/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" id="style-css" href="{{Request::root()}}/resources/assets/css/app.css" type="text/css" media="all">
        <script src="{{Request::root()}}/resources/assets/js/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="{{Request::root()}}/resources/assets/js/ajax.js" type="text/javascript"></script>
        <script src="{{Request::root()}}/resources/assets/js/app.js" type="text/javascript"></script>
    </head>
</head>
<body id="layout">
    @include('include.header')
    <div id="login-layout" class="container">
        @yield('content')
    </div>
</body>
</html>
