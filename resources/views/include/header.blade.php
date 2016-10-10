<div id="ajaxsend">
	<img src="{{Request::root()}}/resources/assets/images/ajax-loader.gif">
</div>
<header id="header" class="container">
<div class="row">
<div class="col-md-3" id="mast-head">
	<div id="logo">
	<a href="{{Request::root()}}" title="Magazine" rel="home"><img src="{{Request::root()}}/resources/assets/images/logo.png" alt="Magazine"></a>
	</div>
</div>
<nav class="col-md-9" class="navbar">
	<ul>
		<li class="icon-home"><a href="{{Request::root()}}"><img src="{{Request::root()}}/resources/assets/images/home.png" alt="Magazine"></a></li>
		<li class="dropdown"><a href="{{Request::root()}}" class="dropdown-toggle disabled">Trang chủ</a>
		</li>
		<li><a href="about.html">Giới thiệu</a>
		</li>
		<li><a href="{{Request::root()}}/tin-tuc">Tin tức<b class="caret"></b></a>
			<ul class="sub-menu dropdown-menu">
				<li><a href="{{Request::root()}}/tin-tuc-xulanh">Tin Xulanh</a></li>
				<li><a href="{{Request::root()}}/tin-tuc-gia-lai">Tin gia lai</a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="{{Request::root()}}/rao-vat" class="dropdown-toggle disabled">Rao vặt<b class="caret"></b></a>
			<ul class="sub-menu dropdown-menu">
				<li><a href="{{Request::root()}}/quan-li-rao-vat/dang-tin-rao-vat">Đăng tin</a></li>
			</ul>
		</li>
        <li class="dropdown"><a href="{{Request::root()}}/viec-lam" class="dropdown-toggle disabled">Việc làm<b class="caret"></b></a>
			<ul class="sub-menu dropdown-menu">
				<li><a href="{{Request::root()}}/quan-li-viec-lam/dang-tin-tuyen-dung">Đăng tin tuyển dụng</a></li>
				<li><a href="{{Request::root()}}/quan-li-viec-lam/dang-tin-tim-viec">Đăng tin tìm việc</a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="##" class="dropdown-toggle disabled">Giải trí<b class="caret"></b></a>
			<ul class="sub-menu dropdown-menu">
				<li><a href="{{Request::root()}}/giai-tri/nghe-nhac">Nghe nhạc</a></li>
				<li><a href="{{Request::root()}}/giai-tri/nghe-truyen">Nghe truyện</a></li>
				<li><a href="{{Request::root()}}/giai-tri/clip-vui">Clip vui</a></li>
				<li><a href="{{Request::root()}}/giai-tri/xem-phim">Xem phim</a></li>
			</ul>
		</li>
		<li class="dropdown"><a href="#" class="dropdown-toggle disabled">Shop<b class="caret"></b></a>
            <ul class="sub-menu dropdown-menu">
                <li><a href="shop-page.html">Product Page</a></li>
                <li><a href="shop-detail.html">Product Detail</a></li>
                <li><a href="cart.html">Cart Page</a></li>
                <li><a href="checkout.html">Checkout</a></li>
                <li><a href="order.html">Order Detail</a></li>
            </ul>
        </li>
		<li><a href="{{Request::root()}}/lien-he">Liên hệ</a></li>
		<span class="login">
			@if (Auth::guest())
                <li><a href="{{ url('/login') }}"><i class="fa fa-key" aria-hidden="true"></i> Đăng nhập</a> | <a href="{{ url('/register') }}"><i class="fa fa-registered" aria-hidden="true"></i> Đăng ký</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    <i class="fa fa-user" aria-hidden="true"></i> {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Đăng xuất</a></li>
                    </ul>
                </li>
            @endif
		</span>
	</ul>
</nav><!-- /.navbar -->
</div>
</header><!-- #masthead -->