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
		$.ajax({
		  	type: 'GET',
		  	url: url,
		  	data: {action: choose.val(), data: data}
		}).done(function( msg ){
			var reload = false;
			$("input[name='check']:checked").each(function(index,elem){
				if(choose.val() == '1'){
					$(this).parent().parent().find("input[name='active']").prop('checked', this.checked);
				}
				else if(choose.val() == '2'){
					$(this).parent().parent().find("input[name='active']").prop('checked', false);
				}
				else if(choose.val() == '3'){
					$(this).parent().parent().remove();
                    reload = true;
				}
			});

			if(reload){
                window.location.reload(false);
            }
		})
	});
	$('input[name="updaterss"]').click(function(){
		$.ajax({
		  	type: 'GET',
		  	url: './news/rss',
		}).done(function( msg ){
			alert('success');
		})
	});
    $('input[name="updateinfo"]').click(function(){
        $.ajax({
            type: 'GET',
            url: './news/update',
        }).done(function( msg ){
            alert('success');
        })
    });
	$("#playlist").keyup(function(){
        value = $(this).val();
        id = $('#hidden_muti').val();
        url =  "./getfile",
		$.ajax({
			type: 'get',
			url: url,
			data: {value:value,id:id}
		}).done(function( html ){
			$('#listchoose').html(html);
		})
    });

    $("#listchoose").on('click','input[type="checkbox"]',function(){
        var muti = $('#hidden_muti').val();
        var playlist = $(this).val();
        var option = $(this).is(':checked');
        var token = $('input[name="_token"]').val();
        url =  "./updatemutiplaylist",
		$.ajax({
			type: 'post',
			url: url,
			data:{
				_token:token,
				muti_id:muti,
				playlist_id:playlist,
				option:option }
		}).done(function( html ){
		});
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
		val  = $(this).parent().find('.title').text();
		id   = $(this).parent().find('.btn-add').attr('val');
		html = $('#listadd').html();
		text = $('#playlist-muti').val();
		$('#playlist-muti').val(text+id+',');
		html += "<li data='"+id+"'>"+ val +"<span class='btn-delete'>delete</span></li>";
		$('#listadd').html(html);
	});
	$('#listadd').on('click','.btn-delete',function(){
		val = $(this).parent().remove();
		$('#playlist-muti').val('');
		text = '';
		$('#listadd li').each(function(index,elem){
			text += $(elem).attr('data')+',';
		})
		$('#playlist-muti').val(text);
	});
});
$(document).ajaxSend(function() {
   $("#ajaxsend").show();
});
$(document).ajaxComplete(function() {
   $("#ajaxsend").hide();
});