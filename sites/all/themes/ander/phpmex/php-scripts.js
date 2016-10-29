/*=================================================
Drupalmex JS
=================================================*/

(function ($, Drupal) {

  Drupal.behaviors.movilMenu = {
    attach: function (context, settings) {
      $( ".mobileAreaMenu ul li.expanded" ).click(function() {
        $(this).find("ul").addClass("activo")
      });
    }
  };

  // Adding classes container o button
  Drupal.behaviors.messagesClass = {
    attach: function (context, settings) {
      $(".messages").addClass("container");
      $(".contact-form #edit-submit, .page-events .node-readmore a").addClass("btn btn-purple");
    }
  };

})(jQuery, Drupal);
