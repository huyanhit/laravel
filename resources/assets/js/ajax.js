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
$(document).ready(function(){
	$('a.ajaxdelete').click(function(){
		url = this.getAttribute( "href" );
		if(!confirm("do you Want to delete?")){
			return false;
		}
		elem = $(this).parent().parent();
		$.ajax({
		  	type: 'GET',
		  	url: url,
		  	data : {check: $(this).is(':checked')},
		}).done(function( msg ){
			elem.remove();
		});
		return false;
	});
});