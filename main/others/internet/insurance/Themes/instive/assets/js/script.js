jQuery( document ).ready( function($){
   "use strict";

   
   /**-------------------------------------------------
     *Fixed Header
     *----------------------------------------------------**/
    $(window).on('scroll', function () {

      /**Fixed header**/
      if ($(window).scrollTop() > 250) {
      $('.navbar-sticky').addClass('sticky fade_down_effect');
      } else {
      $('.navbar-sticky').removeClass('sticky fade_down_effect');
      }
});


  /* ----------------------------------------------------------- */
  /*  Mobile Menu
  /* ----------------------------------------------------------- */
   $('.dropdown > a').on('click', function(e) {
      e.preventDefault();
      if($(window).width() > 991)
      {
         location.href = this.href; 
      } 
      var dropdown = $(this).parent('.dropdown');
      dropdown.find('>.dropdown-menu').slideToggle('show');
      $(this).toggleClass('opened');
      return false;
    });

   
   /* ----------------------------------------------------------- */
   /*  tooltip
   /* ----------------------------------------------------------- */
   $(document).ready(function () {
      $('[data-toggle="tooltip"]').tooltip();
   });
   /* ----------------------------------------------------------- */
   /*  Site search
   /* ----------------------------------------------------------- */


   $('.nav-search').on('click', function () {
      $('.search-block').fadeIn(350);
      $('.nav-search').addClass('hide');
   });

   $('.search-close').on('click', function () {
      $('.search-block').fadeOut(350);
      $('.nav-search').removeClass('hide');
   });

   $(document).on('mouseup', function (e) {
      var container = $(".nav-search-area");

      if (!container.is(e.target) && container.has(e.target).length === 0) {
         $('.search-block').fadeOut(350);
         $('.nav-search').removeClass('hide');
      }

  }); 
    /* ----------------------------------------------------------- */
   /*  Video popup
   /* ----------------------------------------------------------- */

  if ($('.ts-play-btn').length > 0) {
   $('.ts-play-btn').magnificPopup({
       type: 'iframe',
       mainClass: 'mfp-with-zoom',
       zoom: {
           enabled: true, // By default it's false, so don't forget to enable it

           duration: 300, // duration of the effect, in milliseconds
           easing: 'ease-in-out', // CSS transition easing function

           opener: function (openerElement) {
               return openerElement.is('img') ? openerElement : openerElement.find('img');
           }
       }
   });
}

  if ($('.play-btn').length > 0) {
   $('.play-btn').magnificPopup({
       type: 'iframe',
       mainClass: 'mfp-with-zoom',
       zoom: {
           enabled: true, // By default it's false, so don't forget to enable it

           duration: 300, // duration of the effect, in milliseconds
           easing: 'ease-in-out', // CSS transition easing function

           opener: function (openerElement) {
               return openerElement.is('img') ? openerElement : openerElement.find('img');
           }
       }
   });
}


   /* ----------------------------------------------------------- */
   /*  Back to top
   /* ----------------------------------------------------------- */

   $(window).on('scroll', function () {
    if ($(window).scrollTop() > $(window).height()) {
       $(".scroll-top").fadeIn('slow');
    } else {
       $(".scroll-top").fadeOut('slow');
    }

    });
    $("body, html").on("click", ".scroll-top", function (e) {
        e.preventDefault();
        $('html, body').animate({
          scrollTop: 0
        }, 800);
    });

    /*---------------====================
      side menu
  ================-------------------*/

    $(".fixed-sidebar-nav ul li.menu-item-has-children > a").on("click", function ()
    {


        var element = $(this).parent("li");
        if (element.hasClass("open"))
        {
            element.removeClass("open");
            element.find("li").removeClass("open");
            element.find("ul").slideUp(500, "linear");
        }
        else
        {
            element.addClass("open");
            element.children("ul").slideDown();
            element.siblings("li").children("ul").slideUp();
            element.siblings("li").removeClass("open");
            element.siblings("li").find("li").removeClass("open");
            element.siblings("li").find("ul").slideUp();
        }


    });


    $(".xs-sidenav").overlayScrollbars(
        {
            className: "os-theme-light",
        });

    $(".open-sidemenu").on("click", function ()
    {
        $(".open-sidemenu").toggleClass("open-menu");
        $(".xs-sidenav, .xs-content").toggleClass("xs-active");
    });

          /*==========================================================
                    service Post grid ajax load
        ======================================================================*/

   $('.instive-load-more-btn').on('click',function(event){
    event.preventDefault();
   
    var $that = $(this);
    var ajaxjsondata = $that.data('json_grid_meta');
    var instive_json_data = Object (ajaxjsondata);
  
    var contentwrap = $('.instive-style4-service-list'); // item contentwrap
   
      var  postperpage = parseInt(instive_json_data.posts_per_page); // post per page number
      var  showallposts = parseInt(instive_json_data.total_post); // total posts count
       
        var items = contentwrap.find('.instive-grid-item');
        var  totalpostnumber = parseInt(items.length);
       
       var paged =  parseInt( totalpostnumber / postperpage ) + 1; // paged number
       
       $.ajax({
          url: instive_ajax.ajax_url,
          type: 'POST',
          data: {action: 'instive_post_ajax_loading',ajax_json_data: ajaxjsondata,paged:paged},
          beforeSend: function(){
             
              $('<i class="fa fa-spinner fa-spin" style="margin-left:10px"></i>').appendTo( "#instive-load-more-service" ).fadeIn(100);
          },
          complete:function(){
              $('.instive-load-more-service .fa-spinner ').remove();
          }
       })
      
       .done(function(data) {
       
             var $pstitems = $(data);
             $('.instive-style4-service-list').append( $pstitems );
             var newLenght  = contentwrap.find('.instive-grid-item').length;
          
             if(showallposts <= newLenght){
                $('.instive-load-more-service').fadeOut(300,function(){
                   $('.instive-load-more-service').remove();
                });
             }
       
       })

       .fail(function() {
          $('.instive-load-more-service').remove(); 
       });
  
  });

   /*==========================================================
                  Preloader
 ======================================================================*/
    $(window).on('load', function () {
    
        setTimeout(() => {
            $('#preloader').addClass('loaded');
        }, 1000);
        
        });
    // preloader close
    $('.preloader-cancel-btn').on('click', function (e) {
        e.preventDefault();
        if (!($('#preloader').hasClass('loaded'))) {
            $('#preloader').addClass('loaded');
        }
    });


} );











