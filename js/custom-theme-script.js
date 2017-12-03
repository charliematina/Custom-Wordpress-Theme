jQuery(document).ready(function($){

	// Global variables
	var mobileNavOpen = false;
	var navOpen = false;

	$(".mobile-navbar-icon").click(function(){
		if(!mobileNavOpen){
			$('nav').css('height','100vh');
			mobileNavOpen = true;
		} else{
			$('nav').css('height','60px');
			mobileNavOpen = false;
		}
	})

	// Change aspect ratio for project thumbnails
	// $(window).load(function(){
	// 	$('.project-thumb-image').find('img').each(function(){
	// 		var imgClass = (this.width/this.height > 1) ? 'project-thumb-image-wide' : 'project-thumb-image-tall';
	// 		$(this).addClass(imgClass);
	// 	})
	// })


	// Scroll to element functionfunction scroll(element, target, speed){
	function scrollTo(element, target, speed){
	   $(element).click(function() {
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
		   }, speed);
	   });
	}

	scrollTo('.footer-to-top-btn','body',500);
	scrollTo('.go-down-btn','.projects-wrapper',1000);

	// Scroll function effect
	$(window).scroll(function() {
        if ($(document).scrollTop() > 100) {
            $('.landing-page-bottom-nav').css('opacity','0');
        }
        else {
            $('.landing-page-bottom-nav').css('opacity','100');
        }
    });

	// Desktop nav menu button actions
	$('.nav-bar-menu-icon .fa').click(function(){
		if(!navOpen){
			$('.navbar-menu').fadeIn(300);
			$('nav').css(
				{
					'background-color':'white',
					'box-shadow':'0px 0px 4px rgba(0, 0, 0, 0.15)'
				}
			);
			navOpen = true;
		} else{
			$('.navbar-menu').fadeOut(300);
			$('nav').css(
				{
					'background-color':'transparent',
					'box-shadow':'0px 0px 4px rgba(0, 0, 0, 0)'
				}
			);
			navOpen = false;
		}
	})

	// Project thumbnail hover
	$('.project-thumb-wrapper').hover(function(){

		$(this).find('.project-thumb-description, .project-thumb-overlay').fadeIn(400);
	},function(){
		$(this).find('.project-thumb-description, .project-thumb-overlay').fadeOut(400);
	})

	// Lazy load images homepage
	$(window).scroll(function() {
	$.each($('img'), function() {
		if ( $(this).attr('data-src') && $(this).offset().top < ($(window).scrollTop() + $(window).height() - 100) ) {
			var source = $(this).data('src');
			$(this).attr('src', source);
			$(this).removeAttr('data-src');
			var imageContainer = $(this).parent().parent().parent();
			imageContainer.css('opacity','100');
		}
	})
	})

	// Featured projects slide show
	$("#feature-slide-show > div:gt(0), #mobile-feature-slide-show > div:gt(0)").hide();

	setInterval(function() {
	  $('#feature-slide-show > div:first')
	    .fadeOut(800)
	    .next()
	    .fadeIn(1000)
	    .end()
	    .appendTo('#feature-slide-show');
	},  4000);

	setInterval(function() {
	  $('#mobile-feature-slide-show > div:first')
	    .fadeOut(800)
	    .next()
	    .fadeIn(1000)
	    .end()
	    .appendTo('#mobile-feature-slide-show');
	},  4000);


})
