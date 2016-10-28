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

  Drupal.behaviors.dropDownMenu = {
    attach: function (context, settings) {
      $(".main_nav li.expanded").mouseover(function(){
       $(this).find("ul").slideDown("fast");
      });
      $(".main_nav li.expanded ul").mouseout(function(){
       $(this).slideUp("slow");
      });
    }
  }


})(jQuery, Drupal);
