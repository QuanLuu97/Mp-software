$(document).ready(function () {
    $(".has-child").click(function() {
        $(this).find(".sub-menu").toggleClass("active")
    });
	$('.mpsw-slider .owl-carousel').owlCarousel({
	    loop:true,
	    margin:0,
	    dot: true,
	    nav: true,
		navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	    autoplay: true,
	    autoplayTimeout: 5000,
	    autoplayHoverPause: true,
	    smartSpeed: 1000,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:1
	        },
	        1000:{
	            items:1
	        }
	    }
	});

	// Slider techonogy
	var owl = $('.mpsw-technology .owl-carousel');
  owl.owlCarousel({
    items : 6,
    margin: 0,     
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    responsive: {
      0: {
          items: 2
      },
      480: {
          items:  2       },
      550: {
          items:  3       },
      991: {
          items: 4        },
      1200: {
          items: 5        },
      1300: {
          items: 6        }
    },
  });
  // Custom Navigation Events
  $('#mpsw-tech-control').find(".nav-next").click(function(){
    owl.trigger('next.owl.carousel');
  });
  $('#mpsw-tech-control').find(".nav-prev").click(function(){
    owl.trigger('prev.owl.carousel');
  });

  // Scoll wow.js
  new WOW().init();

  // Slider Gallery
  var owl1 = $('.mpsw-view-img .owl-carousel');
  owl1.owlCarousel({
    items : 4,
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    smartSpeed: 1000,
    responsive: {
      0: {
          items: 2
      },
      480: {
          items:  2       },
      550: {
          items:  3       },
      991: {
          items: 3        },
      1200: {
          items: 4        },
      1300: {
          items: 4        }
    },
  });
  // Select all links with hashes
 /* $('a[href*="#"]')
    // Remove links that don't actually link to anything
    .not('[href="#"]')
    .not('[href="#0"]')
    .click(function(event) {
      // On-page links
      if (
        location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
        && 
        location.hostname == this.hostname
      ) {
        // Figure out element to scroll to
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
        // Does a scroll target exist?
        if (target.length) {
          // Only prevent default if animation is actually gonna happen
          event.preventDefault();
          $('html, body').animate({
            scrollTop: target.offset().top
          }, 1000, function() {
            // Callback after animation
            // Must change focus!
            var $target = $(target);
            $target.focus();
            if ($target.is(":focus")) { // Checking if the target was focused
              return false;
            } else {
              $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
              $target.focus(); // Set focus again
            };
          });
        }
      }
    });*/

    $('.slider-jp-img').slick({
        dots: false,
        infinite: false,
        speed: 300,
        slidesToShow: 6,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
        ]
    });
});


