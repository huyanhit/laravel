$( document ).ajaxSend(function() {
   $("#ajaxsend").show();
});
$( document ).ajaxComplete(function() {
   $("#ajaxsend").hide();
});
if($("body").has('#ajaxjobs')){
	$.ajax({
	  	type: 'GET',
	  	url: './ajaxjobs',
	}).done(function( msg ){
		elem.html(msg);
	});
}
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

$(document).ready(function(){
	$("#postface").click(function(){
		url = this.getAttribute( "href" );
		$.ajax({
		  	type: 'GET',
		  	url: url,
		}).done(function( msg ){

		});
		return false;
	})
});