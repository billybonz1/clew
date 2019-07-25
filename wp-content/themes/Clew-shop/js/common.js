$(function () {

	var windowWidth = $(window).width();

	if (windowWidth < 1150) {
		$('.header__hamburger').on('click', function () {
			$('.hamburger').toggleClass('is-active');
			$('.header__menu-mobile').toggleClass('mobile-menu-active');
			$('.bgmobile').toggleClass('bgmobile-active');
		});
		$('.header__hamburger-menu').on('click', function () {
			$('.hamburger').removeClass('is-active');
			$('.header__menu-mobile').removeClass('mobile-menu-active');
			$('.bgmobile').removeClass('bgmobile-active');
		});
	} else {
		$('.header__hamburger').on('click', function () {
			$('.hamburger').toggleClass('is-active');
			$('.header__menu-mobile').toggleClass('mobile-menu-active');
			$('.bgmobile').toggleClass('bgmobile-active');
			$(this).toggleClass('hamb-desktop-hover');
		});
	}

	$('.bgmobile').on('click', function () {
		$('.hamburger').removeClass('is-active');
		$('.header__menu-mobile').removeClass('mobile-menu-active');
		$('.bgmobile').removeClass('bgmobile-active');
		$('.header__hamburger').removeClass('hamb-desktop-hover');
	});

	/* function checkForChanges() {
		if (!$('.header__menu-mobile').hasClass('mobile-menu-active')){
			$('.header__hamburger').on('click', function () {
				$('.hamburger').toggleClass('is-active');
				$('.header__menu-mobile').toggleClass('mobile-menu-active');
				$('.bgmobile').toggleClass('bgmobile-active');
				$(this).toggleClass('hamb-desktop-hover');
			});
		}else{
			$(document).click(function (e) {
				var container = $(".header__menu-mobile");
				if (container.has(e.target).length === 0) {
					$('.header__menu-mobile').removeClass('mobile-menu-active');
					$('.hamburger').removeClass('is-active');
					$('.header__hamburger').removeClass('hamb-desktop-hover');
					$('.bgmobile').removeClass('bgmobile-active');
				}
			});
		}
		setTimeout(checkForChanges, 500);

	}
	checkForChanges(); */


	$('.grid-btn').on('click', function (e) {
		e.preventDefault();
		$('.section__product-item').addClass('grid-item');
		$(this).addClass('trigger-active');
		$('.single-btn').removeClass('trigger-active');
	});

	$('.single-btn').on('click', function (e) {
		e.preventDefault();
		$('.section__product-item').removeClass('grid-item');
		$(this).addClass('trigger-active');
		$('.grid-btn').removeClass('trigger-active');
	})

	var owl = $('.owl-carousel');

	owl.owlCarousel({
		nav: false,
		dots: false,
		items: 1,
		smartSpeed: 1000,
	});

	$('.topsl-next').click(function (e) {
		e.preventDefault();
		owl.trigger('next.owl.carousel');
	});

	$('.topsl-prev').click(function (e) {
		e.preventDefault();
		owl.trigger('prev.owl.carousel');
	});

	$('.go-scroll').mPageScroll2id();

	$('.lang-select').niceSelect();

	$(document).ready(function () {
		$('.city').select2();
		$('.country').select2();
		$('.stage').select2();
		$('.avenue').select2();
	});

	/* if(windowWidth<1150){
		var logoWidth = $('.header__logo').width();
		windowWidth = $(window).width();
		var mnuWidth = windowWidth - logoWidth;
		$('.header__menu-mobile').css('width', mnuWidth);

		window.addEventListener('resize',function(){
			var logoWidth = $('.header__logo').width();
			windowWidth = $(window).width();
			var mnuWidth = windowWidth - logoWidth;
			$('.header__menu-mobile').css('width', mnuWidth);
		});
	} */

	if (windowWidth < 1600) {
		windowWidth = $(window).width();
		$('.desktop-menu-toggle').css('width', windowWidth);

		window.addEventListener('resize', function () {
			windowWidth = $(window).width();
			$('.desktop-menu-toggle').css('width', windowWidth);
		});
	} else {
		windowWidth = $(window).width();
		var toggleWidth = windowWidth - 339;
		$('.desktop-menu-toggle').css('width', toggleWidth);

		window.addEventListener('resize', function () {
			windowWidth = $(window).width();
			var toggleWidth = windowWidth - 339;
			$('.desktop-menu-toggle').css('width', toggleWidth);
		});
	}

	$('.search-desktop-icon').on('click', function (e) {
		$(this).parent().addClass('s-contain-active')
	});


	$(document).mouseup(function (e) {
		var container = $(".desktop-search-toggle");
		if (container.has(e.target).length === 0) {
			$('.desktop-search-toggle').removeClass('search-toggle-active');
		}
	});

	$('.desktop-search-close').on('click', function () {
		$('.header__desktop-search').removeClass('s-contain-active');
	});

	$('.desktop-menu-link').hover(function () {
		$(this).find('.desktop-menu-toggle').toggleClass('dmt-active');
	});

	$('.hover-bg-contain').hover(function () {
		$('.buble1').toggleClass('elem-is-active');
		$('.buble2').toggleClass('elem-is-active');
		$('.eye1').toggleClass('elem-is-active');
		$('.eye2').toggleClass('elem-is-active');
		$('.smile1').toggleClass('elem-is-active');
		$('.smile2').toggleClass('elem-is-active');
		$('.drop').toggleClass('elem-is-active');
	});

	$('.dmt-link:last-child').addClass('dmt-link-all');

	var form = $("#example-form");
	form.validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
			confirm: {
				equalTo: "#password"
			}
		}
	});
	form.children("div").steps({
		headerTag: "h3",
		bodyTag: "section",
		transitionEffect: "slideLeft",
		labels: {
			next: "Продовжити",
			previous: "123",
		},
		onStepChanging: function (event, currentIndex, newIndex) {
			form.validate()
			return form.valid();
		},
		onFinishing: function (event, currentIndex) {
			form.validate().settings.ignore = ":disabled";
			return form.valid();
		},
		onFinished: function (event, currentIndex) {
			alert("Submitted!");
		}
	});

	$('.open-ad-info').on('click', function (e) {
		e.preventDefault();
		$(this).parent().toggleClass('adi-active').siblings(".ad-content__line").removeClass('adi-active');
	});

	$('.woocommerce-Price-currencySymbol').innerHTML = 'грн';

	$(window).resize(function(){
		if(windowWidth > 1400){
			$(window).scroll(function() {
				var sect = $('.section__single-product-card');
				if (parseInt(sect.offset().top) < $(window).scrollTop()) {
				  var tops = parseInt($(window).scrollTop() - sect.offset().top);
				  if (tops < sect.height() - $(".product-card-slider").height()) {
					$(".product-card-slider").css("top", tops);
				  }
				}
			});
		}
	});

	if(windowWidth > 1400){
		$(window).scroll(function() {
			var sect = $('.section__single-product-card');
			if (parseInt(sect.offset().top) < $(window).scrollTop()) {
			  var tops = parseInt($(window).scrollTop() - sect.offset().top);
			  if (tops < sect.height() - $(".product-card-slider").height()) {
				$(".product-card-slider").css("top", tops);
			  }
			}
		});
	}

});
