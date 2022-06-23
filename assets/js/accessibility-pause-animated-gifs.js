(function ($) {
  "use strict";

  $(window).on('load',function () {

    $('img[src$=".gif"]').each(function(e){
      
      $(this).wrap('<div class="apag-image"></div>');
      $('.apag-image').append('<button class="apag-button" aria-label="pause"><i class="fa-solid fa-pause"></i></button>');
      
      $('.apag-button', $(this).parent()).click(function(){
        
        var img = $('img',$(this).parent());
        var button = $(this);
        var src = img.attr('src');

        if(button.attr('aria-label') == 'pause'){
          button.attr('aria-label', 'play');
          button.html('<i class="fa-solid fa-play"></i>');
          $('.apag-image img').attr('src', src.replace('.gif', '.jpg'));
        }else{
          button.attr('aria-label', 'pause');
          button.html('<i class="fa-solid fa-pause"></i>');
          $('.apag-image img').attr('src', src.replace('.jpg', '.gif'));
        }
        
      });

    });
  
  });

})(jQuery);
