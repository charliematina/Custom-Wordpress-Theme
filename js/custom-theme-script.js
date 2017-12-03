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


	// FORM VALIDATION
	$('#contact-submit-button').click(function(event){
		event.preventDefault();
		// alert('HI');
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
			console.log(enquiryValid);
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
			emailValid = true;
			console.log(emailValid);
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
			console.log(emailValid);
		}

		// Name validation
		if(nameField.val() == 0){
			nameField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter your name.");
			nameField.focus();
		} else if (nameField.val().length > 50){
			nameField.next().empty().html("<i class='fa fa-exclamation-circle' aria-hidden='true'></i> Please enter less than 50 characters.");
			nameField.focus();
			console.log(nameField.val());
		} else{
			nameField.next().empty();
			nameValid = true;
			console.log(nameValid);
		}

		if(nameValid && emailValid && enquiryValid == true){
			$(".contact-form").addClass('form-filled');
			$("#contact-submit-button").fadeOut().empty().fadeIn().text("EMAIL SENT. THANK YOU");
		} else{
			event.preventDefault();
		}

		if(formValid == false){
			event.preventDefault();
		} else{
			console.log('Form valid');
		}

	});


	// Get in touch contact form show effect
	$('.get-in-touch-btn').click(function() {
		$('.get-in-touch-btn').css('opacity','0.4');
		$('.hidden-form').fadeIn();
	});



// End of script

})
