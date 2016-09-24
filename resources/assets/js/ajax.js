$( document ).ajaxSend(function() {
   $("#ajaxsend").show();
});
$( document ).ajaxComplete(function() {
   $("#ajaxsend").hide();
});

$(document).ready(function(){
	if($("body #ajaxjobs").length){
		$.ajax({
		  	type: 'GET',
		  	url: './ajaxjobs',
		}).done(function( msg ){
			elem.html(msg);
		});
	}
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

$(document).ready(function(){   
	if($("body #ajax-masonry-ads").length){ 
		var is_busy = false;
		var page = 1;
		var stopped = false;
		var total = $('#ajax-masonry-ads').attr('page');
	    $(window).scroll(function() 
	    {
	        $element = $('#ajax-masonry-ads');
	        $loadding = $('#loading');
	        if($(window).scrollTop() + $(window).height() >= $element.height() && page < total) 
	        {
	            if (is_busy == true){
	                return false;
	            }
				is_busy = true;
	            page++;
	            $.ajax(
	            {
	                type        : 'get',
	                dataType    : 'text',
	                url         : './ajaxads?page='+page,
	                success     : function (result)
	                {
	                    $element.append(result);
	                }
	            }).always(function()
	            {
	                is_busy = false;
	            });
	            return false;
	        }
	    });
	}
});

$(document).ready(function(){  
	$("#module-comment").on("click","#child-comment-form .submit",function(e) {
	    url = $('#child-comment-form').attr('action');
	    insert = $(this).parent().parent().parent().parent().parent();
	    if($("#child-comment-form #frm-name").val().length == 0){
	    	alert('input name');
	    }else{ 
	    	if($("#child-comment-form #frm-comment").val().length == 0){
	    		alert('input Comment');
	    	}else{
	    		data = {
		    		name: $("#child-comment-form #frm-name").val(), 
		    		comment: $("#child-comment-form #frm-comment").val(),
		    		_token:  $("#child-comment-form #_token").val(),
		    		id: $("#child-comment-form #frm-id").val(),
		    		idcomment: $("#child-comment-form #frm-idcomment").val(),
	    		};
	    		console.log(data);
			    $.ajax({
		            type: "POST",
		            url: url,
		            data: data,
		            success: function(html){
		           		htm =  '<ul><li>';
		           		htm += html;
		           		htm += '</li></ul>';
		           		insert.append(htm);
		           		html = '<form id="comment-form" method="POST" action="/laravel/insertcomment">';
						html += $("#child-comment-form").html();
						html +='</form>';
						$("#child-comment-form").remove();
						$('#comment-script .reply').text('Hoi dap')
						$("#comment-script").append(html);
		            }
		        });
		    }
        }
	    return false;
	});
	$("#module-comment").on("click","#comment-form .submit",function(e) {
	    url = $('#comment-form').attr('action');
	    id = $("#comment-form #frm-id").val();
	    if($("#comment-form #frm-name").val().length == 0){
	    	alert('input name');
	    }else{ 
	    	if($("#comment-form #frm-comment").val().length == 0){
	    		alert('input Comment');
	    	}else{
	    		data = {
	    		name: $("#comment-form #frm-name").val(), 
	    		comment: $("#comment-form #frm-comment").val(),
	    		_token:  $("#comment-form #_token").val(),
	    		id: $("#comment-form #frm-id").val()};
	    		console.log(data);
			    $.ajax({
		           type: "POST",
		           url: url,
		           data: data,
		           success: function(html){
		           		$("#comment-script").append(html);
		           }
		        });
		    }
        }
	    return false;
	});
	$("#comment-script .reply").click(function() {
		if($(this).text() !='Huy'){
			$('#comment-script .reply').text('Hoi dap')
			$(this).text('Huy');
			html = '<form id="child-comment-form" method="POST" action="/laravel/insertcomment">';
			html += '<input type="hidden" id="frm-idcomment" name="frm-idcomment" value="'+$(this).attr('data')+'">';
			html += $("#comment-form").html();
			html +='</form>';
			$("#comment-form").remove();
			$(this).parent().append(html);
		}else{
			$(this).text('Hoi dap');
			html = '<form id="comment-form" method="POST" action="/laravel/insertcomment">';
			html += $("#child-comment-form").html();
			html +='</form>';
			$("#child-comment-form").remove();
			$("#comment-script").append(html);
		}
	});
});