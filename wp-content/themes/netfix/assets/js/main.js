(function ($) {
	"use strict";

/*=============================================
	=    		 Preloader			      =
=============================================*/
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

$(window).on('load', function () {
	preloader();
	mainSlider();
	wowAnimation();
});


/*=============================================
	=    		Mobile Menu			      =
=============================================*/
//SubMenu Dropdown Toggle
if ($('.menu-area li.menu-item-has-children ul').length) {
	$('.menu-area .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');

}
//Mobile Nav Hide Show
if ($('.mobile-menu').length) {

	var mobileMenuContent = $('.menu-area .main-menu').html();
	$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);

	//Dropdown Button
	$('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function () {
		$(this).toggleClass('open');
		$(this).prev('ul').slideToggle(500);
	});
	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function () {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.menu-backdrop, .mobile-menu .close-btn').on('click', function () {
		$('body').removeClass('mobile-menu-visible');
	});
}


/*=============================================
	=           Data Background             =
=============================================*/

	$("[data-background]").each(function () {
		$(this).css(
			"background-image",
			"url(" + $(this).attr("data-background") + ")"
		);
	});

	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});

  $("[data-top-space]").each(function () {
		$(this).css("padding-top", $(this).attr("data-top-space"));
	});

	$("[data-bottom-space]").each(function () {
		$(this).css("padding-bottom", $(this).attr("data-bottom-space"));
	});


function heroActive(){
	$("[data-background]").each(function () {
		$(this).css(
			"background-image",
			"url(" + $(this).attr("data-background") + ")"
		);
	});

	$("[data-bg-color]").each(function () {
		$(this).css("background-color", $(this).attr("data-bg-color"));
	});

	$("[data-top-space]").each(function () {
		$(this).css("padding-top", $(this).attr("data-top-space"));
	});
}


/*=============================================
	=     Menu sticky & Scroll to top      =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 300) {
		$("#sticky-header").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');
		$("#header-top-fixed").removeClass("header-fixed-position");

	} else {
		$("#sticky-header").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
		$("#header-top-fixed").addClass("header-fixed-position");
	}
});


/*=============================================
	=    		 Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1000);

  });
}


	// nice select
    $(".footer-widget select,.widget select").niceSelect();


	// menu-last class
	$(".navbar-wrap ul > li").slice(-4).addClass("menu-last");

	// Activate rtl slider
    let rtl_setting = $('body').hasClass("rtl") ? true : false;


/*=============================================
	=    		 Main Slider		      =
=============================================*/
function mainSlider() {
	$("[data-background").each(function () {
		$(this).css(
			"background-image",
			"url( " + $(this).attr("data-background") + "  )"
		);
	});

	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		autoplay: true,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		rtl: rtl_setting,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}


/*=============================================
	=    		Brand Active		      =
=============================================*/
function brandActive(){
	$('.brand-active').slick({
		dots: false,
		infinite: true,
		speed: 1000,
		autoplay: true,
		arrows: false,
		rtl: rtl_setting,
		slidesToShow: 5,
		slidesToScroll: 1,
		responsive: [
			{
				breakpoint: 1200,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					infinite: true,
				}
			},
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					arrows: false,
				}
			},
			{
				breakpoint: 575,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					arrows: false,
				}
			},
		]
	});
}


/*=============================================
	=    		Products Active		      =
=============================================*/
$('.rel-products-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	rtl: rtl_setting,
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


	/*=============================================
		=    		gallery post active	      =
	=============================================*/

	$(".post_gallery-active").slick({
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 1,
		slidesToScroll: 1,
		rtl: rtl_setting,
		prevArrow:
			'<button type="button" class="slick-prev"><i class="fal fa-arrow-left"></i></button>',
		nextArrow:
			'<button type="button" class="slick-next"><i class="fal fa-arrow-right"></i></button>',
		responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
			{
				breakpoint: 480,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
				},
			},
		],
	});




/*=============================================
	=         Flipster Active           =
=============================================*/
function streamingActive(){
$("#streaming-active").flipster({
	itemContainer: 'ul',
	itemSelector: 'li',
	style: 'coverflow',
	loop: true,
	scrollwheel: false,
	spacing: -0.5,
});

	$('.streaming-two-active').owlCarousel({
		loop: true,
		margin: 30,
		items: 3,
		autoplay: false,
		rtl: rtl_setting,
		autoplayTimeout: 5000,
		autoplaySpeed: 1000,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		nav: false,
		dots: false,
		responsive: {
			0: {
				items: 1,
				center: false,
				nav: false,
			},
			575: {
				items: 2,
				center: false,
				nav: false,
			},
			768: {
				items: 3,
				center: false,
			},
			992: {
				items: 3,
				center: false,
			},
			1200: {
				items: 3,
			},
		}
	})

}


/*=============================================
	=    		 Jarallax Active  	         =
=============================================*/
$('.jarallax').jarallax({
	speed: 0.2,
});


/*=============================================
	=         ProgressBar Active            =
=============================================*/
$('.progress-item').appear(function (e) {
	// Animated Prograssbar
	$(".progress--bar").each(function () {
		$(this)
		.find(".progress-fill")
		.animate(
			{
				width: $(this).attr("data-percentage"),
			},
			2000
		);
		$(this)
		.find(".progress-number")
		.animate(
			{ left: $(this).attr("data-percentage") },
			{
				duration: 2000,
				step: function (now, fx) {
					var data = Math.round(now);
					$(this)
					.find(".percent")
					.html(data + "%");
				},
			}
		);
	});
});


/*=============================================
	=    		 Cart Active  	         =
=============================================*/

	$(".cart-plus-minus").append(
		'<div class="qtybutton-box"><span class="inc qtybutton">+</span><span class="dec qtybutton">-</span></div>'
		                                          
	);
	$(".qtybutton-box .qtybutton").on("click", function () {
		var $button = $(this);
		var oldValue = $button.parent().parent().find("input").val();
		if ($button.text() == "+") {
			var newVal = parseFloat(oldValue) + 1;
		} else {
			// Don't allow decrementing below zero
			if (oldValue > 0) {
				var newVal = parseFloat(oldValue) - 1;
			} else {
				newVal = 0;
			}
		}
		$button.parent().parent().find("input").val(newVal);
	});


/*=============================================
	=    		Odometer Active  	       =
=============================================*/
$('.odometer').appear(function (e) {
	var odo = $(".odometer");
	odo.each(function () {
		var countNumber = $(this).attr("data-count");
		$(this).html(countNumber);
	});
});


/*=============================================
	=    		Magnific Popup		      =
=============================================*/
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
		enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});


/*=============================================
	=    		 Wow Active  	         =
=============================================*/
function wowAnimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true
	});
	wow.init();
}


  $(window).on('elementor/frontend/init', function () {
  		elementorFrontend.hooks.addAction('frontend/element_ready/slider.default', mainSlider);
      elementorFrontend.hooks.addAction('frontend/element_ready/video_slider.default', streamingActive);
      elementorFrontend.hooks.addAction('frontend/element_ready/brand.default', brandActive);
      elementorFrontend.hooks.addAction('frontend/element_ready/hero.default', heroActive);
  });


})(jQuery);