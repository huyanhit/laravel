$(document).ready(function(){
	$('input[name="active"]').click(function(){
		url = this.getAttribute( "url" );
		$.ajax({
		  	method: "GET",
		  	url: url,
		  	data : {check: $(this).is(':checked')},
		}).done(function( msg ){
		});
	});
	$('a.ajaxdelete').click(function(){
		url = this.getAttribute( "href" );
		
		if(!confirm("Want to delete?")){
			return false;
		}
		$(this).parent().parent().remove();
		$.ajax({
		  	method: "GET",
		  	url: url,
		  	data : {check: $(this).is(':checked')},
		}).done(function( msg ){
		});
		return false;
	});
});
