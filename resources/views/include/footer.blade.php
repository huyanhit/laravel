<footer id="footer">
	<div id="footer-top" class="container">
		<div class="row row-flex">
			<div class="col-md-4 footer-logo" >
				<h3 class="title">Thông tin Website</h3>
				<img src="{{Request::root()}}/resources/assets/images/logo.png" alt="xulanh.com">
				<p> Thông tin tin tức, việc làm, mua bán, rao vặt khu vực gia lai - pleiku <p>
			</div>
			<div class="col-md-4 contact-info">
				<h3 class="title">Liên hệ</h3>
				<p><i class="fa fa-map-marker" aria-hidden="true"></i>Address: <span>T3. An Phú. Pleiku. Gialai</span></p>
				<p><i class="fa fa-phone" aria-hidden="true"></i>Phone: <span>098 688 0601</span></p>
				<p><i class="fa fa-envelope" aria-hidden="true"></i>Email: <span>huyanhit@gmail.com</span></p>
			</div>
			<div class="col-md-4 map">
				<h3 class="title">Bản Đồ</h3>
				<ul class="social">
					<li class="face"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li class="goplus"><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
					<li class="youtube"><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
					<li class="instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></li>
				</ul>
				<script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCritRR76nxzbgLncd6FMo6ndbOwILPIkM'></script><div style='overflow:hidden;height:200px;width:100%;'><div id='gmap_canvas' style='height:200px;width:100%;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://add-map.org/'>Add-Map.org</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=6034f9ecd9e6c6ffb3bf7aace6bd5fd03c841722'></script>
				<script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng(13.9828865,108.0789082),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(13.9828865,108.0789082)});infowindow = new google.maps.InfoWindow({content:'<strong>XL</strong><br>QL19 - An Phú -  Pleiku <br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
			</div>
		</div>
	</div>
	<div id="footer-bot" class="container">
		<div id="site-info">
			<div id="footer-nav">
				<ul class="menu">
					<li><a href="{{Request::root()}}/trang-chu">Trang chủ</a></li>
					<li><a href="{{Request::root()}}/gioi-thieu">Giới thiệu</a></li>
					<li><a href="{{Request::root()}}/Blog">Blog</a></li>
					<li><a href="{{Request::root()}}/lien-he">Liên Hệ</a></li>
				</ul>
			</div>
			<div id="credit" class="fl">
				<p>Thiết kế của XL</p>
			</div>
		</div>
	</div>
</footer>