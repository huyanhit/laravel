$(document).ready(function($) {
  var owl = $("#headline .owl-carousel");
  owl.owlCarousel({
      itemsCustom : [
        [0, 1],
        [768, 2],
        [992, 3],
        [1200, 4],
      ],
      navigation : false,
   });
});
$(document).ready(function($) {
  $("#scroller").simplyScroll();
});
$(document).ready(function($) {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
$(document).ready(function($){
  $("#tabnav").idTabs();  
});