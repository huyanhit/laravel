<footer id="footer">
	<div id="footer-top" class="container">
		<div class="row row-flex">
			<div class="col-md-4 footer-logo" >
				<h3 class="title">Thông tin Website</h3>
				<img src="{{Request::root()}}/resources/assets/images/logo.png" alt="xulanh.com">
				<p> Tin tức, việc làm, mua bán, rao vặt khu vực gia lai - pleiku <p>
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
					<li class="instagram"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				</ul>
				<script src="http://maps.google.com/maps/api/js?key=AIzaSyC13kBGIaj461ZgNJhQABmga8IOSbtRiPc" type="text/javascript"></script>
				<div id="googleMap" style="width: 100%; height: 200px;"></div>
				<script type="text/javascript">
				var myCenter=new google.maps.LatLng(51.508742,-0.120850);
				function initialize() {
				  var mapProp = {
				    center: myCenter,
				    zoom:5,
				    mapTypeId:google.maps.MapTypeId.ROADMAP
				  };
				  var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
				  var marker=new google.maps.Marker({
				    position: myCenter,
				  });
				  marker.setMap(map);
				}
				google.maps.event.addDomListener(window, 'load', initialize);
				</script>
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