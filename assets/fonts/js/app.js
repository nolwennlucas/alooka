(function ($) {
    "use strict";
  
    $(window).on('load', eltdfOnWindowLoad);
  
    /*
     All functions to be called on $(window).on('load', ) should be in this function
     */
    function eltdfOnWindowLoad() {
      eltdfSubscribePopup();
    }
  
    function eltdfSubscribePopup() {
      var popupClose = $('.eltdf-sp-close, .eltdf-sp-close-area');
  
      popupClose.on('click', function (e) {
        e.preventDefault();
  
        // we force the popup disable flag when clicking on the X button or outside the newsletter modal
        // so that the modal does not show on new pages
        localStorage.setItem('disabledPopup', 'yes');
      });
    }
  })(jQuery);
  