jQuery(document).ready(function($) {
    $(".bcorporate_banner_inner_wrap").lightSlider({
        item: 1,
        loop: true,
        slideMargin:0,
        controls: false,

    });
    
	$(".home_feature_post_wrap").lightSlider({
	    item:4,
        loop:true,
        slideMove:1,
        easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
        speed:600,
        responsive : [
        {
                breakpoint:1025,
                settings: {
                    item:3,
                    slideMove:1,
                    slideMargin:6,
                  }
            },
            {
                breakpoint:769,
                settings: {
                    item:2,
                    slideMove:1,
                    slideMargin:6,
                  }
            },



            {
                breakpoint:480,
                settings: {
                    item:1,
                    slideMove:1
                  }
            }
        ]
	});

   
    $(function(){
         var shrinkHeader = 300;
          $(window).scroll(function() {
            var scroll = getCurrentScroll();
              if ( scroll >= shrinkHeader ) {
                   $('.headermain').addClass('shrink');
                }
                else {
                    $('.headermain').removeClass('shrink');
                }
          });
        function getCurrentScroll() {
            return window.pageYOffset || document.documentElement.scrollTop;
            }
        });

    $('.menu-toggle').click(function(){
        $('body').toggleClass('wdnoscroll');
    });



    $('.fa-chevron-circle-down').click(function() {
        $('html, body').animate({
            scrollTop: $("#bcorporate_home_about_wrap").offset().top-150
        }, 500);
    });


// for scroll to certain position

$(document).on('click', 'a[href^="#"]', function (event) {
    event.preventDefault();

    $('html, body').animate({
        scrollTop: $($.attr(this, 'href')).offset().top
    }, 500);
});

    AOS.init({
      disable: 'mobile'
    });

    //Scroll To Top
    var window_height = $(window).height();
    var window_height = (window_height) + (50);

$(window).scroll(function() {
        var scroll_top = $(window).scrollTop();
        if (scroll_top > window_height) {
            $('.bcorporate_move_to_top').show();
        }
        else {
            $('.bcorporate_move_to_top').hide();   
        }
    });

    $('.bcorporate_move_to_top').click(function(){
        $('html, body').animate({scrollTop:0}, 'slow');
        return false;
        
    });
    
});