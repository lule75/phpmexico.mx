/*=================================================
Drupalmex JS
=================================================*/

(function ($, Drupal) {

  // Adding classes container o button
  Drupal.behaviors.messagesClass = {
    attach: function (context, settings) {
      $(".messages").addClass("container");
      $(".contact-form #edit-submit, .page-events .node-readmore a").addClass("btn btn-purple");
    }
  };

  


})(jQuery, Drupal);
