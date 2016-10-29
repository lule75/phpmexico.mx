/*=================================================
Drupalmex JS
=================================================*/

(function ($, Drupal) {



  Drupal.behaviors.movilMenu = {
    attach: function (context, settings) {
      $( ".mobileAreaMenu ul li.expanded" ).click(function() {
        $(this).find("ul").slideToggle("fast");
      });
    }
  };

})(jQuery, Drupal);
