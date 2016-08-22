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