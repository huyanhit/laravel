$(document).ready(function(){
	$('input[name="active"]').click(function(){
		url = this.getAttribute( "url" );
		$.ajax({
		  	method: "GET",
		  	url: url,
		  	data : {check: $(this).is(':checked')},
		}).done(function( msg ){});
	});
	
	$('a.ajaxdelete').click(function(){
		url = this.getAttribute( "href" );
		if(!confirm("do you Want to delete?")){
			return false;
		}
		$(this).parent().parent().remove();
		$.ajax({
		  	method: "GET",
		  	url: url,
		  	data : {check: $(this).is(':checked')},
		}).done(function( msg ){});
		return false;
	});

	$('input[name="apply"]').click(function(){
		data = new Array();
		var choose = $('select[name="apply"]');
		url = window.location.pathname+'/'+choose.val();
		$("input[name='check']:checked").each(function(index,elem){
			data.push($(elem).attr('data')) ;
			console.log($(this).parent().parent().find("input[name='active']").prop('checked', this.checked));
		})
		$.ajax({
		  	method: "POST",
		  	url: url,
		  	data : {data:data},
		}).done(function( msg ){
			
		});
	})
});
