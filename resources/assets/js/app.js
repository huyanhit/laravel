$(document).ready(function($) {
  var owl = $("#headline .owl-carousel");
  if(owl.length){
    owl.owlCarousel({
      itemsCustom : [
        [0, 1],
        [768, 2],
        [992, 3],
        [1200, 4],
      ],
      navigation : false,
    });
  }
  var owl2 = $("#mutimedia .owl-carousel");
  if(owl2.length){
    owl2.owlCarousel({
        itemsCustom : [
          [0, 2],
          [768, 3],
          [992, 4],
          [1200, 6],
        ],
        navigation : true,
    });
  }
});
$(document).ready(function($) {
    $(".frame-masonry .item").each(function(index , elem) {
        var height = parseInt($(elem).width());
        if(height%2 != 0)
          height += 1;
        var display = $(elem).attr('display');
        height = parseInt(height * display/2);
        $(elem).attr('style','height:'+height+'px');
    });
});
$(document).ready(function($){
  if($("#scroller").length){
    $("#scroller").simplyScroll();
  }
});
$(document).ready(function($) {
  if($(".flexslider").length){
    $('.flexslider').flexslider({
      animation: "slide",
      controlNav: "thumbnails"
    });
  }
});
$(document).ready(function($){
  if($("#tabnav").length){
    $("#tabnav").idTabs();  
  }
});
$(document).ready(function($){
  var height = $(".frame-masonry .masonry-text").width(); 
  $(".frame-masonry .masonry-text").attr('height', height);
});
$(document).ready(function($){
  var url = 'https://query.yahooapis.com/v1/public/yql';
  var yql = 'select title, units.temperature, item.forecast from weather.forecast where woeid in (select woeid from geo.places where text="pleiku, vietnam") and u = "C" limit 2 | sort(field="item.forecast.date", descending="false");';
  var iconUrl = 'https://s.yimg.com/zz/combo?a/i/us/we/52/';
  $.ajax({url: url, data: {format: 'json', q: yql}, method: 'GET', dataType: 'json'})
    .success(function(data) {
      if (data.query.count > 0) {
        jQuery.each(data.query.results.channel, function(idx, result) {
          var f = result.item.forecast;
          var u = result.units.temperature;
          var c = $('#weather').clone();
          c.find('.weather_date').text('Pleiku: ' + f.date+' - ');
          c.find('.weather_temp_min').text('Nhiệt độ: ' + f.low + u + ' -');
          c.find('.weather_temp_max').text(f.high + u);
          c.find('.weather_icon').attr('src', iconUrl + f.code + '.gif');
          c.appendTo($('.introweather'));
        });
      }
    }
  );
});
$(document).ready(function($){
  if($('.playlist audio,.playlist video').length){
    $('.playlist video, .playlist audio').mediaelementplayer({
      loop: true,
      shuffle: true,
      playlist: true,
      audioHeight: 30,
      playlistposition: 'bottom',
      features: ['playlistfeature', 'prevtrack', 'playpause', 'nexttrack', 'loop', 'shuffle', 'playlist', 'current', 'progress', 'duration', 'volume'],
      keyActions: []
    });
  }
  if($('.single audio, .single video').length){
    $('.single video, .single audio').mediaelementplayer();
  }
  if($('.muti-caroul-item audio, .muti-caroul-item video').length){
    $('.muti-caroul-item video, .muti-caroul-item audio').mediaelementplayer({
      loop: true,
      shuffle: true,
      features: ['playpause','progress'],
    });
  }
  if($('.my_scroll').length){
    $('.my_scroll').jScrollPane();
  }
});