
$(document).ready(function(){
	$("#ajaxsend").hide();
	$('#list input[name="active"]').click(function(){
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
	$('input[name="updaterss"]').click(function(){
		$.ajax({
		  	type: 'GET',
		  	url: './news/rss',
		}).done(function( msg ){
			alert('success');
		})
	})
	$("#searchmuti").keyup(function(){
		value = $(this).val();
		url =  "./getfile",
		$.ajax({
		  	type: 'get',
		  	url: url,
		  	data: {value: value}
		}).done(function( html ){
			$('#listchoose').html(html);
		})
	});
	$("#searchplaylist").keyup(function(){
		value = $(this).val();
		url =  "./getfile",
		$.ajax({
		  	type: 'get',
		  	url: url,
		  	data: {value: value}
		}).done(function( html ){
			$('#listchoose').html(html);
		})
	});
	$('#listchoose').on('click','.btn-add',function(){
		val = $(this).parent().find('.title').text();
		id = $(this).parent().find('.btn-add').attr('val');
		html = $('#listadd').html();
		text = $('#playlist-muti').val();
		$('#playlist-muti').val(text+id+',');
		html += "<li data='"+id+"'>"+ val +"<span class='btn-delete'>delete</span></li>";
		$('#listadd').html(html);
	})
	$('#listadd').on('click','.btn-delete',function(){
		val = $(this).parent().remove();
		$('#playlist-muti').val('');
		text = '';
		$('#listadd li').each(function(index,elem){
			text += $(elem).attr('data')+',';
		})
		$('#playlist-muti').val(text);
	})
});
$(document).ajaxSend(function() {
   $("#ajaxsend").show();
});
$(document).ajaxComplete(function() {
   $("#ajaxsend").hide();
});