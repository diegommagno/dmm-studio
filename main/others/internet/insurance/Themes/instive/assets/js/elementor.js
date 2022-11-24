(function ($, elementor) {
   "use strict";

   var Instive = {

      init: function () {

         var widgets = {
            
            'instive-main-slider.default': Instive.Main_Slider,
            'instive-content-slider.default': Instive.Content_Slider,
            'instive-testimonial.default': Instive.Testimonial,
            'instive-team-slider.default': Instive.Team_Slider,
            'instive-post-slider.default': Instive.Post_Slider,
            'instive-insurance.default': Instive.instive_insurance,
            'instive-popup.default': Instive.instive_popup,
            'instive-client-logo.default': Instive.Client_Logo,
            'instive-quote-slider.default': Instive.Quote_Slider,
            'instive-insurance-plan.default': Instive.Plan_Slider,
         };
         $.each(widgets, function (widget, callback) {
            elementor.hooks.addAction('frontend/element_ready/' + widget, callback);
         });

      },
       
      Main_Slider: function ($scope) {

         var $container = $scope.find('.main-slider');

         var controls= JSON.parse($container.attr('data-controls'));
               
         var navShow = Boolean(controls.show_nav?true:false);
         var autoslide = Boolean(controls.auto_nav_slide?true:false);
         var dot_nav_show = Boolean(controls.dot_nav_show?true:false);
         var ts_slider_speed = parseInt(controls.ts_slider_speed);
        
         if ($container.length > 0) {
            $container.owlCarousel({
               items: 1,
               loop: true,
               autoplay: autoslide,
               nav: navShow,
               dots: dot_nav_show,
               autoplayTimeout: ts_slider_speed,
               autoplayHoverPause: true,
               mouseDrag: false,
               smartSpeed: 1100,
               navText: ['<i class="icon icon-left-arrow2">', '<i class="icon icon-right-arrow2">'],
               responsive: {
                  0: {
                     items: 1,
                     nav: false,
                  },
                  600: {
                     items: 1,
                     nav: false,
                  },
                  1000: {
                     nav: navShow,
                  }
               }
         
            });
         }
      },

      // content slider 
      Content_Slider: function ($scope) {
         var $container = $scope.find('.content-slider');
         var controls_data = $container.attr('data-controls');

         var autoslide = false;
         var navShow = true;
         var dot_nav_show = true;
            if(controls_data){
               var controls= JSON.parse($container.attr('data-controls'));
               var navShow = Boolean(controls.show_nav?true:false);
               var autoslide = Boolean(controls.auto_nav_slide?true:false);
               var dot_nav_show = Boolean(controls.dot_nav_show?true:false);
            }
         
         
         if ($container.length > 0) {
            $container.owlCarousel({
               items: 1,
               loop: true,
               autoplay: autoslide,
               nav: navShow,
               dots: dot_nav_show,
               autoplayHoverPause: true,
               mouseDrag: false,
               smartSpeed: 1100,
               animateOut: 'fadeOut',
               navText: ['<i class="icon icon-left-arrow2">', '<i class="icon icon-right-arrow2">'],
               });
         }
      },

      Post_Slider: function ($scope) {

         var $container = $scope.find('.blog-post');

         var controls= JSON.parse($container.attr('data-controls'));
               
         var navShow = Boolean(controls.show_nav?true:false);
         var autoslide = Boolean(controls.auto_nav_slide?true:false);
         var dot_nav_show = Boolean(controls.dot_nav_show?true:false);
         var ts_slider_speed = parseInt(controls.ts_slider_speed);
         
         if ($container.length > 0) {
            $container.owlCarousel({
               items: 2,
               loop: true,
               autoplay: autoslide,
               nav: navShow,
               dots: dot_nav_show,
               autoplayTimeout: ts_slider_speed,
               autoplayHoverPause: true,
               mouseDrag: false,
               smartSpeed: 1100,
               navText: ['<i class="icon icon-left-arrow2">', '<i class="icon icon-right-arrow2">'],
               responsive: {
                  0: {
                     items: 1,
                     nav: false,
                  },
                  600: {
                     items: 1,
                     nav: false,
                  },
                  1000: {
                     items: 2,
                     nav: navShow,
                  }
               }
         
            });
         }
         
   
      },

      instive_insurance: function ($scope) {

         var $container = $scope.find('.ts-service-slider');

         var controls_data = $container.attr('data-controls');

         var autoslide = false;
         var slide_count = '4';
         var dot_nav_show = true;
            if(controls_data){
               var controls= JSON.parse($container.attr('data-controls'));
               var dot_nav_show = Boolean(controls.dot_nav_show?true:false);
               var slide_count = parseInt(controls.item_count);
            }

         if ($container.length > 0) {
            $container.owlCarousel({
               items: slide_count,
               loop: true,
               autoplay: autoslide,
               dots: dot_nav_show,
               autoplayHoverPause: true,
               mouseDrag: true,
               smartSpeed: 1100,
               
               responsive: {
                  0: {
                     items: 1,
                     nav: false,
                  },
                  600: {
                     items: 2,
                     nav: false,
                  },
                  768: {
                     items: 3,
                  },
                  1000: {
                     items: slide_count,
                  }
               }
         
            });
         }
         
   
      },

      Testimonial: function ($scope) {

      var $container = $scope.find('.ts-testimonial-sync1');

      if ($('.testimonial-slider').length > 0) {
         var testimonial = $scope.find('.testimonial-slider');
         testimonial.owlCarousel({
            items: 1,
            mouseDrag: true,
            loop: true,
            touchDrag: true,
            autoplay:false,
            dots: true,
            center: true,
            autoplayTimeout: 5000,
            margin:0,
            autoplayHoverPause: true,
            smartSpeed: 1000,
         });
         
      }
      if ($('.ts-testimonial-slider').length > 0) {
         var testimonial = $scope.find('.ts-testimonial-slider');
         testimonial.owlCarousel({
            items: 5,
            mouseDrag: true,
            loop: true,
            touchDrag: true,
            autoplay:false,
            dots: true,
            center: true,
            autoplayTimeout: 5000,
            margin:0,
            autoplayHoverPause: true,
            smartSpeed: 1000,
            responsive: {
               0: {
                  items: 3,
               },
               600: {
                  items: 3,
               },
               1000: {
                  items: 5,
               }
            }
      
         });
         
      }

      if ($('.ts-testimonial-slider-three').length > 0) {
         
         var testimonialSlider = $scope.find('.ts-testimonial-slider-three');
         var owl = testimonialSlider.owlCarousel({
            items 	 : 1,
            center	   : true, 
            nav        : false,
            dots       : true,
            loop       : false,
            margin     : 10,
            dotsContainer: '.testimonial-controls',
            navText: ['<i class="fas fa-arrow-right"></i>','<i class="fas fa-arrow-left"></i>'],
         });
      
         $('.testimonial-thumb').on('click', 'li', function(e) {
            owl.trigger('to.owl.carousel', [$(this).index(), 300]);
         });  
         }
      },
     
      Team_Slider: function ($scope){
         var $container = $scope.find('.ts-team-slider');
         var controls= JSON.parse($container.attr('data-controls'));
            
         var navShow = Boolean(controls.show_nav?true:false);
         var autoslide = Boolean(controls.auto_nav_slide?true:false);
         var dot_nav_show = Boolean(controls.dot_nav_show?true:false);
         var ts_team_loop = Boolean(controls.ts_team_loop?true:false);
         var ts_slider_speed = parseInt(controls.ts_slider_speed);
         var ts_slider_item = parseInt(controls.ts_slider_item);

         if ($('.ts-team-slider').length > 0) {
            var team_slider = $scope.find('.ts-team-slider');
            team_slider.owlCarousel({
               items: ts_slider_item,
               mouseDrag: true,
               loop: ts_team_loop,
               touchDrag: true,
               nav: navShow,
               navText: ['<i class="icon icon-left-arrow2">', '<i class="icon icon-right-arrow2">'],
               autoplay:autoslide,
               dots: dot_nav_show,
               autoplayTimeout: ts_slider_speed,
               autoplayHoverPause: true,
               smartSpeed: 1000,
               responsive: {
               0: {
                  items: 1,
                  nav: false,
               },
               600: {
                  items: 2,
                  nav: false,
               },
               1000: {
                  items: ts_slider_item,
                  nav: navShow,
               }
            }
            });
         }
      },

      Quote_Slider: function ($scope){
         var $container1 = $scope.find('.instive-popup');
         $($container1).each(function(){
            $container1.magnificPopup({ 
               removalDelay: 300,
               type: 'inline',
               closeOnContentClick: false,
               midClick: true,
               callbacks: {
               beforeOpen: function() {
                  this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure' + this.st.el.attr('data-effect'));
               }
               },
            });
         });

         var $container = $scope.find('.ts-quote-slider');
         var controls= JSON.parse($container.attr('data-controls'));
            
         var navShow = Boolean(controls.show_nav?true:false);
         var autoslide = Boolean(controls.auto_nav_slide?true:false);
         var dot_nav_show = Boolean(controls.dot_nav_show?true:false);
         var ts_slider_speed = parseInt(controls.ts_slider_speed);
         var ts_slider_item = parseInt(controls.ts_slider_item);

         if ($('.ts-quote-slider').length > 0) {
            var quote_slider = $scope.find('.ts-quote-slider');
            quote_slider.owlCarousel({
               items: ts_slider_item,
               mouseDrag: true,
               loop: false,
               touchDrag: true,
               nav: navShow,
               navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
               autoplay:autoslide,
               dots: dot_nav_show,
               autoplayTimeout: ts_slider_speed,
               autoplayHoverPause: true,
               smartSpeed: 1000,
               responsive: {
               0: {
                  items: 1,
                  nav: false,
               },
               600: {
                  items: 2,
                  nav: false,
               },
               1000: {
                  items: ts_slider_item,
                  nav: navShow,
               }
            }
            });
         }
      },
     
      instive_popup: function ($scope) {
         var $container = $scope.find('.instive-popup');
            $container.magnificPopup({ 
               removalDelay: 300,
               type: 'inline',
               closeOnContentClick: false,
               midClick: true,
               callbacks: {
               beforeOpen: function() {
                  this.st.image.markup = this.st.image.markup.replace('mfp-figure', 'mfp-figure' + this.st.el.attr('data-effect'));
               }
            },
            });
      },

      Client_Logo: function( $scope ) {
         var $el = $scope.find( '.elementskit-clients-slider' ),
            config = $el.data( 'config' );

         // Arrows
         if ( config.arrows ) {
            config.navigation = {
               prevEl: $scope.find( '.slick-prev' ),
               nextEl: $scope.find( '.slick-next' ),
            };
         }

         // pagination
         if ( config.dots ) {
            config.pagination = {
               el: $scope.find( '.swiper-pagination' ),
               type: 'custom',
               clickable: true,
               renderCustom: ( swiper, current, total ) => {
                  var pagination = '';
                  for ( let i = 1; i <= total; i++ ) {
                     pagination += '<li role="presentation" class="'+ (current === i ? " swiper-pagination-bullet-active slick-active" :  "swiper-pagination-bullet") +'"><button type="button" role="tab"  tabindex="0" aria-selected="true" class="">'+  i +'</button></li>';
                  }
                  return pagination;
               }
            }
         }

         // swiper
         let swiper = new Swiper( $scope.find( '.swiper-container' ), config );

         // pause on hover
         if ( config.autoplay && config.pauseOnHover ) {
            $scope.find( '.swiper-container' ).hover( function() {
               swiper.autoplay.stop();
            }, function() {
               swiper.autoplay.start();
            } );
         }
      }, 
      
      Plan_Slider: function( $scope ) {
         let $container = $scope.find( '.insurance-plan-slider' );
          if ( $container.length > 0 ) {
            let controls = $container.data( 'controls' );
            let autoslide = Boolean(controls.slider_autoplay === 'yes' ? true:false);
            let loop = Boolean(controls.slider_loop === 'yes' ? true:false);
            let slider_items = controls.slider_count;
            let widget_id = controls.widget_id;
            
            // eslint-disable-next-line
            $($container).each(function (index, element) {
               let $element = $( element ).find( '.swiper-container' );
               new Swiper( $element, {
                  spaceBetween: 30,
                  initialSlide: 1,
                  loop: loop,
                  slidesPerView: parseInt(slider_items),
                  wrapperClass: 'swiper-wrapper',
                  speed: 1200, //slider transition speed
                  parallax: true,
                  autoplay: autoslide,
                  navigation: {
                     nextEl: `.swiper-next-${widget_id}`,
                     prevEl: `.swiper-prev-${widget_id}`,
                  },
                  breakpoints: {
                     0: {
                        slidesPerView: 1,
                     },
                     767: {
                        slidesPerView: 2,
                     },
                     1024: {
                        slidesPerView: parseInt(slider_items),
                     },
                  },
               });
            });
         }
      },

   };
   $(window).on('elementor/frontend/init', Instive.init);
}(jQuery, window.elementorFrontend));


