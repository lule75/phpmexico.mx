/*=================================================
Drupalmex JS
=================================================*/

(function ($, Drupal) {

  // Preloader
  Drupal.behaviors.messagesClass = {
    attach: function (context, settings) {
      $(".messages").addClass("container");
      $(".contact-form #edit-submit").addClass("btn btn-purple");
    }
  };


})(jQuery, Drupal);
