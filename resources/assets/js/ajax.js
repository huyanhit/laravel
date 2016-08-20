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

 
// $(document).ready(function(){    
// 	var is_busy = false;
// 	var page = 1;
// 	var stopped = false;
//     $(window).scroll(function() 
//     {
//         $element = $('#ajax-masonry-ads');
//         $loadding = $('#loading');
// 		console.log($(window).height());
// 		console.log($(window).scrollTop());
//         if($(window).scrollTop() + $(window).height() >= $element.height()) 
//         {
//             if (is_busy == true){
//                 return false;
//             }
// 			is_busy = true;
//             page++;
//             $.ajax(
//             {
//                 type        : 'get',
//                 dataType    : 'text',
//                 url         : './ajaxads',
//                 success     : function (result)
//                 {
//                     $element.append(result);
//                 }
//             }).always(function()
//             {
//                 is_busy = false;
//             });
//             return false;
//         }
//     });
// });