jQuery(document).ready(function($){


	$('.go-back').click(function(){
		goBack();
	})

	function goBack() {
    	window.history.back();
	}

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


	if($(document).height() < 1000){
		$('.footer-to-top-btn').hide();
	}

	// Scroll to element functionfunction scroll(element, target, speed){
	function scrollTo(element, target, speed){
	   $(element).click(function() {
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
		   }, speed);
	   });
	}

	$('.footer-to-top-btn').on('click', function (e) {
        e.preventDefault();
        $('html,body').animate({
            scrollTop: 0
        }, 700);
    });

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
	var menuOpen = false;
	$("#hamburger-wrapper").click(function(){
		if(menuOpen === false){
			$(".burger-line").css({
				"width":"100%",
				"top":"10px"

			});
			$("#hamburger-wrapper").css('width','30px');
			$(".top").addClass("rotate1");
			$(".btm, .mdl").addClass("rotate2");
			$('.navbar-menu').stop().fadeIn(300);
			$('nav').addClass('nav-open');
			menuOpen = true;
		} else{
			$(".burger-line").css({
				"width":"110%",
				"top":"0"
			});
			$("#hamburger-wrapper").css('width','40px');
			$(".top").removeClass("rotate1");
			$(".btm, .mdl").removeClass("rotate2").css({'top':'15px','width':'60%'});
			$('.navbar-menu').stop().fadeOut(300);
			$('nav').removeClass('nav-open');
			menuOpen = false;
		}
	});

	$('.menu-item, menu-item ul').hover(function(){
		if($(this).hasClass('menu-item-has-children')){
			$(this).next('sub-menu').css('display','block');
			// $('nav').css({'height':'15vh','padding-bottom':'1em'});
		} else{

		}
	}, function(){
		// $('nav').css({'height':'13vh','padding-bottom':'0'});
	})

	var mobileMenu = false;

	// mobile menu
	$('.mobile-navbar-icon').click(function(){

		if( !mobileMenu){
			$(this).empty().html('<i class="material-icons">close</i>');
			$('body').css('overflow','hidden');
			$('nav').css('overflow','scroll');
			mobileMenu = true;
		} else{
			$(this).empty().html('<i class="material-icons">menu</i>');
			$('body').css('overflow','auto');
			$('nav').css('overflow','hidden');
			mobileMenu = false;
		}

	})

	// Project thumbnail hover
	$('.project-thumb-wrapper').hover(function(){

		$(this).find('.project-thumb-description, .project-thumb-overlay').stop().fadeIn(300);
	},function(){
		$(this).find('.project-thumb-description, .project-thumb-overlay').stop().fadeOut(300);
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

	$('#mobile-feature-slide-btn-1').addClass('active-slide-btn');
	$('.feature-button').click(function(){
		$('.slide-btn').removeClass('active-slide-btn');
		$(this).addClass('active-slide-btn');
		$('.slide[data-slide]').stop().fadeOut();
		$('.slide[data-slide="' + $(this).attr('data-feature') + '"]').stop().css('display','flex').hide().fadeIn();
	});


	// FORM VALIDATION
	$('#contact-submit-button').click(function(event){
		event.preventDefault();
		var nameValid = false;
		var emailValid = false;
		var enquiryValid = false;
		var numberValid = false;

		var nameField = $("#name-field");
		var emailField = $("#email-field");
		var textField = $("#textarea-field");
		var numberField = $("#number-field");

		var emailRegEx = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;

		var phoneRegEx = /^\s*(?:\+?(\d{1,3}))?([-. (]*(\d{3})[-. )]*)?((\d{3})[-. ]*(\d{2,4})(?:[-.x ]*(\d+))?)\s*$/gm;

		// Enquiry validation
		if(textField.val() == 0){
			textField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter an enquiry.");
			textField.focus();
		} else{
			textField.next().empty();
			enquiryValid = true;
		}

		// Phone number validation
		if(numberField.val() == 0){
			numberField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter your phone number");
			numberField.focus();
		} else if (!numberField.val().match(phoneRegEx)){
			numberField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter a valid phone number");
			numberField.focus();
		} else{
			numberField.next().empty();
			numberValid = true;
		}

		// Email validation
		if(emailField.val() == 0){
			emailField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter an email address.");
			emailField.focus();
		} else if (!emailField.val().match(emailRegEx)){
			emailField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter a valid email address");
			emailField.focus();
		} else{
			emailField.next().empty();
			emailValid = true;
		}

		// Name validation
		if(nameField.val() == 0){
			nameField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter your name.");
			nameField.focus();
		} else if (nameField.val().length > 50){
			nameField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter less than 50 characters.");
			nameField.focus();
		} else{
			nameField.next().empty();
			nameValid = true;
		}

		if(nameValid && emailValid && enquiryValid && numberValid == true){
			$(".contact-form").addClass('form-filled');
			$("#contact-submit-button").fadeOut().empty().fadeIn().text("EMAIL SENT. THANK YOU");
		} else{
			event.preventDefault();
		}

	});


	// Get in touch contact form show effect
	$('.get-in-touch-btn').click(function() {
		$('.get-in-touch-btn').css('opacity','0.4');
		$('.hidden-form').stop().fadeIn();
	});

	$('.fa-frown-o').hover(function(){
		$(this).removeClass('fa-frown-o').addClass('fa-smile-o');
	}, function(){
		$(this).removeClass('fa-smile-o').addClass('fa-frown-o');
	});

// End of script

})
