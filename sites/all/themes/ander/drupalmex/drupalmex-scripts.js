/*=================================================
Drupalmex JS
=================================================*/

(function ($, Drupal) {

  // Preloader
  Drupal.behaviors.messagesClass = {
    attach: function (context, settings) {
      $(".messages").addClass("container");
    }
  };


})(jQuery, Drupal);
