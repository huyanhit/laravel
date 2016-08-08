$(document).ready(function(){
	$('input[name="active"]').click(function(){
		url = this.getAttribute( "url" );
		$.ajax({
		  	type: 'GET',
		  	url: url,
		  	data : {check: $(this).is(':checked')},
		}).done(function( msg ){});
	});
	
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

	$('input[name="apply"]').click(function(){
		data = new Array();
		var choose = $('select[name="apply"]');
		url = window.location.pathname+'/apply';
		$("input[name='check']:checked").each(function(index,elem){
			data.push($(elem).attr('data'));
		})
		console.log(choose.val());
		$.ajax({
		  	type: 'POST',
		  	url: url,
		  	data: {action: choose.val(), data: data}
		}).done(function( msg ){
			$("input[name='check']:checked").each(function(index,elem){
				if(choose.val() == '1'){
					$(this).parent().parent().find("input[name='active']").prop('checked', this.checked);
				}
				else if(choose.val() == '2'){
					$(this).parent().parent().find("input[name='active']").prop('checked', false);
				}
				else if(choose.val() == '3'){
					$(this).parent().parent().remove();
				}
			})
		})
	})
});
