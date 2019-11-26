/*
 * Custom theme scripts.
 */

( function( $, window ) {

	$('h1, h2, h3, h4, h5, h6, p, span, a, label, option, textarea').each(function(index, el) {
		if(!$(this).hasClass('trn'))
			$(this).addClass('trn');
	});

	// Translator.
	if($.cookie('coffee_lang') == undefined){
		$.cookie('coffee_lang', "en");
	}

	var lang = $.cookie('coffee_lang');

	var translator = $('body').translate({lang: lang, t: dict}); //use English

	$( '.lang_flag' ).click(function(event) {

		lang = $(this).attr('langue');
		$.cookie('coffee_lang', lang);

		translator.lang(lang);

	});

	// Link to booker

	$('#room_booking').click(function(event) {
		/* Act on the event */
		if(document.getElementById('booker').checkValidity()){

			event.preventDefault();
			var datastring = $('#booker').serialize();
			$.ajax({
			    type: "POST",
			    url: booker_ajax.ajax_url,
			    data: datastring,
			    success: function(data) {
			    	console.log(datastring);
			    	if(data == "0"){

			    		var lang = $.cookie('coffee_lang');

			    		if (lang == 'fr') {
			    			$('.awebooking-check-form__content').html("<div style='vertical-align:baseline'>Votre demande de réservation a bien été envoyée et nous vous recontacterons dans les plus brefs délais.<br>Nous vous remercions de votre confiance.<br>Le Cofee Ride</div>");
			    		}else if (lang == 'en'){
			    			$('.awebooking-check-form__content').html("<div style='vertical-align:baseline'>Your reservation has been send and will be proceed. We will soon contact you<br>Thank you!<br>Le Coffee Ride</div>");	
			    		}else if (lang == 'nl'){
			    			$('.awebooking-check-form__content').html("<div style='vertical-align:baseline'>Dank voor uw bericht.<br>We behandelen deze zo spoedig mogelijk.<br>Le Coffee Ride</div>");
			    		}
			    	}
			        
			    }
			});
		}

		
	});

	$('#bike_booking').click(function(event) {
		/* Act on the event */
		if(document.getElementById('booker').checkValidity()){

			event.preventDefault();
			var datastring = $('#booker').serialize();
			$.ajax({
			    type: "POST",
			    url: booker_ajax.ajax_url,
			    data: datastring,
			    success: function(data) {
			    	console.log(datastring);
			    	if(data == "0"){

			    		var lang = $.cookie('coffee_lang');

			    		if (lang == 'fr') {
			    			$('.awebooking-check-form__content').html("<div style='vertical-align:baseline'>Votre demande de réservation a bien été envoyée et nous vous recontacterons dans les plus brefs délais.<br>Nous vous remercions de votre confiance.<br>Le Cofee Ride</div>");
			    		}else if (lang == 'en'){
			    			$('.awebooking-check-form__content').html("<div style='vertical-align:baseline'>Your reservation has been send and will be proceed. We will soon contact you<br>Thank you!<br>Le Coffee Ride</div>");	
			    		}else if (lang == 'nl'){
			    			$('.awebooking-check-form__content').html("<div style='vertical-align:baseline'>Dank voor uw bericht.<br>We behandelen deze zo spoedig mogelijk.<br>Le Coffee Ride</div>");
			    		}
			    	}
			        
			    }
			});
		}

		
	});

	$('#booker').submit(function(event) {
		/* Act on the event */
		event.preventDefault();
	});

	$('.awebooking-field-group > i').hide();

	

	// Smooth scroll to anchor adjustment.
	$( 'a[href*="#"]:not([href="#"])' ).click( function() {
		if ( location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname ) {

			var target, adminBarHeight, navbarHeight, offset, windowWidth;

			target         = $( this.hash );
			target         = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			navBarHeight   = $( '#site-navigation' ).outerHeight();
			adminBarHeight = $( '#wpadminbar' ).outerHeight();
			offset         = 0;

			if ( 600 > $( window ).width() ) {
				$( '.menu-toggle' ).trigger( 'click' );
			} else if ( 600 < $( window).width() && 768 > $( window ).width() ) {
				offset = adminBarHeight - 1;
				$( '.menu-toggle' ).trigger( 'click' );
			} else {
				offset = adminBarHeight + navBarHeight - 1;
			}

			if ( target.length ) {
				$( 'html, body' ).animate( { scrollTop: target.offset().top - offset }, 300 );
				return false;
			}
		}
	} );
} ) ( jQuery, window );
