/*=================================================
1 - PRELOADER 
=================================================*/

$(window).load(function() { 
  $('#status').fadeOut(); 
  $('#preloader').delay(150).fadeOut('slow'); 
 
})

/*=================================================
2 - HEADER 
=================================================*/

jQuery(window).scroll(function () {
    if (jQuery(window).scrollTop() > 0) {
            jQuery('header').addClass('small');
    } else {
         jQuery('header').removeClass('small');  
    }   
  });

jQuery(window).load(function () {
    if (jQuery(window).scrollTop() > 0) {
            jQuery('header').addClass('small');
    } else {
         jQuery('header').removeClass('small');  
    }   
  });

/*=================================================
3 - SERVICE TAB 
=================================================*/


$(document).ready(function() {
"use strict";
var alltabs = $('#service_tab_triggers li');

$(".service_wrapper").hide(); 
$(".service_wrapper:first").show(); 

  $("#service_tab_triggers li a").click(function() {

  
	if (  $(this).parent('li').hasClass("active")       ) {
			
		return false;

    } else {

    $(alltabs).removeClass("active");
    $(this).parent('li').addClass("active");
    $(".service_wrapper").hide(); 

    var activeTab = $(this).attr("href"); 

    $(activeTab).fadeIn(600); 


    return false;

    				
    };

  });

});


/*=================================================
4 - PARALLAX VIDEO  
=================================================*/


if ( self == top ) {
$(document).ready(function() {
      $(".player").mb_YTPlayer();
    });
}

/*=================================================
5 - SKILLS 
=================================================*/

$(window).load(function() {
      var bar = $('.bar');
      $(bar).each(function() {
      var bar_percent = $(this).find('.percent').text();
      $(this).animate({width:bar_percent}, 900);
});
});


/*=================================================
6 - ISOTOPE FOR PORTFOLIO 
=================================================*/


$(document).ready(function() {
    "use strict";
    // cache container
    var $container = $('.grid');


    
        // initialize isotope
         $container.isotope({
          masonry: {
            columnWidth: 1
          }
        });


       // filter items when filter link is clicked
        $('#filters a').click(function(){
          var selector = $(this).attr('data-filter');
          $container.isotope({ filter: selector });
          return false;
        });
         
 });


/*=================================================
7 - FILTERS FOR PORTFOLIO 
=================================================*/


$(document).ready(function() {
   "use strict";
      $('#filters li>a').click(function() {
   $('#filters li').removeClass('active');
      $(this).parent().addClass('active');
      });
});



/*=================================================
8 - AJAX PORTFOLIO
=================================================*/



  $(window).load(function(){
  
  (function(){
  
    var container = $( "#portfoliod" );
    var $items = $('.grid > div.portfolio-item');
     index = $items.length;
      $('.grid .portfolio-item').click(function(){

      if ($(this).hasClass('active')){
      } else 
      { lastIndex = index;
      index = $(this).index();
      $items.removeClass('active');
      $(this).addClass('active');

      var myUrl = $(this).find('.ajax-trigger').attr("href") + " .item-data"; 

    $('html, body').animate({        scrollTop: $("#portfolio").offset().top + 300  }, 300);// Custom scroll to #portfoliod div 
      $('.loading_icon').css({ "display": "block", "opacity": "0" }).animate({ "opacity": "0.8" }, 300);
      $('#portfolioData').animate({opacity:0}, 400,function(){  
        $("#portfolioData").load(myUrl,function(){   //FIX THE HEIGHT BUG ON FLEXSLIDER
            var $helper = $('.helper');
            var height = $helper.height();
            $('#portfolioData').css("min-height", height);

          /*  $('.flexslider').flexslider({
              smoothHeight: true,controlNav:false
            });
            $('.flexslider').css({'height' : ''});*/
            $(".portfolio_slide").owlCarousel({
              navigation : false, // Show next and prev buttons
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem:true,
               autoHeight : true,
            transitionStyle:"fade"
          });
            
        });
        $('#portfolioData').animate({opacity:1}, 200);

      });
      
      //SLIDE UP
        
      $('#portfoliod').slideUp(400, function(){
        $('.loading_icon').delay(800).animate({ "opacity": "0" }, 100,function(){
          $('.loading_icon').css("display","none");
        });
        $('#portfolioData').css('visibility', 'visible');}).delay(800).slideDown(400,function(){
          $('#portfolioData').animate({opacity:1}, 400);
          $("a[data-gal^='prettyPhoto']").prettyPhoto();

      });


      }

      return false;       
      
      });

    //AJAX CLOSE 
    $('#ajax_close').click(function() {
      $('#portfoliod').slideUp(400);
      $items.removeClass('benext beprev active') ;
      return false;
        });

  })();
  
});

/*=================================================
9 -  PRETTY PHOTO
=================================================*/

$(window).load(function(){
 "use strict";
    $("a[data-gal^='prettyPhoto']").prettyPhoto();
  });

/*=================================================
10 - BUTTONS TRIGGERS FOR PORTFOLIO COLUMN SIZES
=================================================*/

$(function() {

var cont_portfolio = $('.grid');

var two_columns = $('#twocolumns_trigger');

var three_columns = $('#threecolumns_trigger');

var four_columns = $('#fourcolumns_trigger')

var $filters = $("#filters")


$(two_columns).click(function() {
  event.returnValue = false; 
  $(cont_portfolio).removeClass('two_columns four_columns').addClass('two_columns');
  $filters.find('li.active a').trigger('click');
});

$(three_columns).click(function() {
  event.returnValue = false;
  $(cont_portfolio).removeClass('two_columns four_columns');
  $filters.find('li.active a').trigger('click');
});


$(four_columns).click(function() {
  event.returnValue = false;
  $(cont_portfolio).removeClass('two_columns four_columns').addClass('four_columns');
  $filters.find('li.active a').trigger('click');
});

});


/*=================================================
11 - ONE PAGE NAV
=================================================*/

 $(document).ready(function(){
 "use strict";
  
$('.main_nav').onePageNav({
  currentClass: 'active',
  changeHash: false,
  scrollSpeed: 750,
  scrollOffset: 40,
  filter: ':not(.external)',
  easing: 'swing',
});

$('#logo').onePageNav({
  scrollSpeed: 750,
  scrollOffset: 40,
  filter: ':not(.external)',
  easing: 'swing',
});

$('#logo_dark').onePageNav({

  scrollSpeed: 750,
  scrollOffset: 40,
  filter: ':not(.external)',
  easing: 'swing',
});

$('.responsive_nav').onePageNav({

  scrollSpeed: 750,
  scrollOffset: 40,
  filter: ':not(.external)',
  easing: 'swing',
});
});

 /*=================================================
12 - CLIENTS CAROUSEL
=================================================*/
$(document).ready(function() {
 
  $("#clients").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true
  });
 
});

 /*=================================================
13 - TESTIMONIALS CAROUSEL
=================================================*/
$(document).ready(function() {
 
  $("#testimonials_slide").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
       autoHeight : true,
    transitionStyle:"fade"
  });
 
});


 /*=================================================
14 - PORTFOLIO CAROUSEL
=================================================*/


$(document).ready(function() {
 
  $(".portfolio_slide").owlCarousel({
      navigation : false, // Show next and prev buttons
      slideSpeed : 300,
      paginationSpeed : 400,
      singleItem:true,
       autoHeight : true,
    transitionStyle:"fade"
  });
 
});


/*=================================================
15 - BLOG CAROUSEL
=================================================*/
$(document).ready(function() {
 
  var owl = $("#blog-carousel");
 
  owl.owlCarousel({
 
      pagination: false,
      items : 2, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
      addClassActive : true,
    
  });
 
  // Custom Navigation Events
  $(".read_next_story").click(function(){
    owl.trigger('owl.next');
    return false;
  })
  $(".read_prev_story").click(function(){
    owl.trigger('owl.prev');
    return false;
  })

});



/*=================================================
17 - SIDEBAR TABS BLOG
=================================================*/

$(document).ready(function() {
"use strict";
var alltabs = $('.trigger_sidebar li');

$(".post-list-wrapper").hide(); // OK
$(".post-list-wrapper:first").show();  // OK 

  $(".trigger_sidebar li a").click(function() {

  
  if (  $(this).parent('li').hasClass("active")       ) {
      
    return false;

    } else {

    $(alltabs).removeClass("active");
    $(this).parent('li').addClass("active");
    $(".post-list-wrapper").hide(); 

    var activeTab = $(this).attr("href"); 

    $(activeTab).fadeIn(600); 


    return false;

            
    };

  });

});

/*=================================================
17 - ACCORDIONS
=================================================*/

$(document).ready(function() {
    $(".accordion_wrap").accordion();
});


/*=================================================
17 - TABS
=================================================*/

  $(document).ready(function(){
    $('.tabs').each(function(){
      $(this).find('.tabs-control a:first').addClass('active');
      $(this).find('.tabs-tabs .tabs-tab:first').addClass('active');
    });
    $('.tabs .tabs-control a').click(function(){
      var $tabs=$(this).parents('.tabs');
      if(!$tabs.length)
        return false;
      var tabname=$(this).attr('href').replace('#','');
      $tabs.find('.tabs-control a').removeClass('active');
      $(this).addClass('active');
      $tabs.find('.tabs-tabs .tabs-tab.active').hide().removeClass('active');
      $tabs.find('.tabs-tabs .tabs-tab.'+tabname).addClass('active').fadeIn(300);
      return false;
    });
  }); 


/*=================================================
17 - TOGGLE
=================================================*/

   $(document).ready(function(){

      var h3trigger = $("h3.trigger");
            $(".toggle_container").hide(); 
            $(h3trigger).click(function(){
                $(this).toggleClass("active").next().slideToggle("fast");
                return false;
            });
        });


/*=================================================
1 - RESPONSIVE MENU 
=================================================*/


jQuery(document).ready(function(){
"use strict";  
var menu_trigger = jQuery('.menu_trigger');
var areamenu = jQuery('.mobileAreaMenu');
var all_li =jQuery('.mobileAreaMenu li');

jQuery(menu_trigger).click(function() {


if (jQuery(menu_trigger).hasClass('active')){

      jQuery(areamenu).slideUp(200,function(){
        jQuery(areamenu).css("display","");
        jQuery(menu_trigger).removeClass("active");
      });
          
      } else {
        jQuery(areamenu).slideDown(200,function(){
          //
        });

        jQuery(menu_trigger).addClass("active");
      }
});

jQuery('.mobileAreaMenu a').click(function(){
  
  jQuery(areamenu).slideUp(200);
  jQuery(menu_trigger).removeClass("active");
});
});


//RESPONSIVE STYLE 4 VIDEO RESPONSIVE BACKGROUND

$(document).ready(function() {
  
"use strict";
var height_video = $(window).width();
var height_responsive = (height_video / 1.79011) + 1;
$('.video_slide').css("height",height_responsive);

});


$(window).resize(function() {
  "use strict";
var height_video = $(window).width();
var height_responsive = (height_video / 1.79011) + 1;
$('.video_slide').css("height",height_responsive);

});



//WAYPOINTS ANIMATIONS

$(document).ready(function() {

  $("[data-animation-target^='2']").waypoint(function() {
    //$("[data-animation-target^='2']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });

  $("[data-animation-target^='3']").waypoint(function() {
//    $("[data-animation-target^='3']").addClass('animated bounceInLeft');
  }, {
    offset: '75%'
  });


  $("[data-animation-target^='4']").waypoint(function() {
  //  $("[data-animation-target^='4']").addClass('animated bounceInRight');
  }, {
    offset: '75%'
  });


  $("[data-animation-target^='5']").waypoint(function() {
   // $("[data-animation-target^='5']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });

  $("[data-animation-target^='6']").waypoint(function() {
   // $("[data-animation-target^='6']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });

  $("[data-animation-target^='7']").waypoint(function() {
   // $("[data-animation-target^='7']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });


  $("[data-animation-target^='8']").waypoint(function() {
    //$("[data-animation-target^='8']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });


 $("[data-animation-target^='9']").waypoint(function() {
    //$("[data-animation-target^='9']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });

  $("[data-animation-target^='10']").waypoint(function() {
   // $("[data-animation-target^='10']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });

    $("[data-animation-target^='11']").waypoint(function() {
    //$("[data-animation-target^='11']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });


  $("[data-animation-target^='12']").waypoint(function() {
    //$("[data-animation-target^='12']").addClass('animated bounceInLeft');
  }, {
    offset: '75%'
  });


$("[data-animation-target^='13']").waypoint(function() {
  //  $("[data-animation-target^='13']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });


$("[data-animation-target^='14']").waypoint(function() {
   // $("[data-animation-target^='14']").addClass('animated bounceInLeft');
  }, {
    offset: '75%'
  });


$("[data-animation-target^='15']").waypoint(function() {
  //  $("[data-animation-target^='15']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });

$("[data-animation-target^='16']").waypoint(function() {
  //  $("[data-animation-target^='16']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });

$("[data-animation-target^='17']").waypoint(function() {
   // $("[data-animation-target^='17']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });

$("[data-animation-target^='18']").waypoint(function() {
   // $("[data-animation-target^='18']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });
$("[data-animation-target^='19']").waypoint(function() {
   // $("[data-animation-target^='19']").addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });
$("[data-animation-target^='20']").waypoint(function() {
   // $("[data-animation-target^='20']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });
$("[data-animation-target^='21']").waypoint(function() {
   // $("[data-animation-target^='21']").addClass('animated fadeIn');
  }, {
    offset: '75%'
  });
});

