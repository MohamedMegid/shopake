(function(){
  "use strict";

$(function ($) {

    $("#ticker").tweet({
          username: "suryavardhan",
          modpath: './twitter/',
          count: 5,
          avatar_size: 48,
          loading_text: "loading ...",
          outro_text:"PixelGlimpse",
          template: "{text}<br/>{time}",        
        });

 $(".tweet_list").owlCarousel({
                  autoPlay:18000, //Set AutoPlay to 5 seconds
                  autoHeight : true,
                  singleItem:true,
                  navigation: false,
                  pagination: false,

                });

  }); 


})();