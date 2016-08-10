$( document ).ajaxSend(function() {
   $("#ajaxsend").show();
});
$( document ).ajaxComplete(function() {
   $("#ajaxsend").hide();
});
$("#ajaxjobs").ready(function(){
	$.ajax({
	  	type: 'GET',
	  	url: './ajaxjobs',
	}).done(function( msg ){
		elem.html(msg);
	});
});
$(document).ready(function(){
	elem = $("#ajaxjobs");
	$('#ajaxjobs').delegate(".ajaxpagin a","click",function(){
		url = this.getAttribute( "href" );
		$.ajax({
		  	type: 'GET',
		  	url: url,
		}).done(function( msg ){
			elem.html(msg);
		});
		return false;
	});
});

