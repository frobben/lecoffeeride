/*
 * Custom theme scripts.
 */

( function( $, window ) {

	$('h1, h2, h3, h4, h5, h6, p, span, a, label, option, textarea').each(function(index, el) {
		if(!$(this).hasClass('trn') && !$(this).hasClass('no-text'))
			$(this).addClass('trn');
	});

	// Translator.
	if($.cookie('coffee_lang') == undefined){
		$.cookie('coffee_lang', "en");
	}

	var lang = $.cookie('coffee_lang');

	var translator = $('body').translate({lang: lang, t: dict2}); //use English

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


	$('#outdoor_booking').click(function(event) {
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

	$('#custom_booking').click(function(event) {
		console.log('click');
		/* Act on the event */
		if(document.getElementById('booker').checkValidity()){

			event.preventDefault();

			var form = $('#booker')[0];

			$.ajax({
				url: booker_ajax.ajax_url,
				type: "POST",
				data: new FormData(form),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data) {
					console.log(data);
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


$(function() {
  $(".img-w").each(function() {
    $(this).wrap("<div class='img-c'></div>")
    let imgSrc = $(this).find("img").attr("src");
     $(this).css('background-image', 'url(' + imgSrc + ')');
  });

});

$('.gallery').magnificPopup({
  delegate: 'a',
  type: 'image',
  gallery:{
    enabled:true
  }
});

$('.process-panel').magnificPopup({
	type:'inline',
	mainClass:'show'
});


$( '.gpx_shortcode' ).find('a').addClass('btn btn-default');

var totlen = $( '.totlen' ).find( '.summaryvalue' );
var totlenNum = totlen.html();

if (totlenNum != undefined && totlenNum.includes("m") && !totlenNum.includes("km")){
  
	var newNum = parseInt(totlenNum);
	newNum = newNum / 1000;
	newNum = newNum.toFixed(1);

	totlen.html(" " + newNum + " km");

}



$( '.custom-apparel-thumb' )
	.mouseenter(function () {

		if($(this).next().hasClass('custom-apparel-secondary-image')){
			var nextImg = $(this).next().attr('src');

			if (nextImg !== ''){
				$(this).attr('src-sav', $(this).attr('src'));
				$(this).attr('src', nextImg);
				$(this).attr('srcset', nextImg);
			}

		}


	})
	.mouseleave(function(){
		//if($(this).hasAttribute('src-sav')){
		$(this).attr('src',$(this).attr('src-sav'));
		$(this).attr('srcset', $(this).attr('src-sav'));
		//}

	});

	$( '.attachment-woocommerce_thumbnail' )
    .mouseenter(function () {

		if($(this).next().hasClass('secondary-image')){
            var nextImg = $(this).next().attr('src');

            if (nextImg !== ''){
                $(this).attr('src-sav', $(this).attr('src'));
                $(this).attr('src', nextImg);
                $(this).attr('srcset', nextImg);
            }

        }


	})
    .mouseleave(function(){
		//if($(this).hasAttribute('src-sav')){
            $(this).attr('src',$(this).attr('src-sav'));
            $(this).attr('srcset', $(this).attr('src-sav'));
        //}

	});

function sleep(miliseconds) {
	var currentTime = new Date().getTime();

	while (currentTime + miliseconds >= new Date().getTime()) {
	}
}

$( '.cat-selector' ).click(function(e){
	e.preventDefault();
	var target = $(this).attr('cat-slug');
	var i = 0;

	$( '.product' ).each(function(){

		if($(this).hasClass(target) || target === 'all'){
			$(this).show();
			i++;

		}else{
            $( this ).hide();
		}

	});


	var msgShop = $("#message-shop");
	if(i === 0){
		msgShop.html('No product found');
	}else{
		msgShop.html('');
	}


});


$('body').on('added_to_cart', function() {
	setTimeout(function(){
		$('a.added_to_cart.wc-forward').html('<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 86 104.5" >\n' +
            '<path class="icon-bag-black" d="M67.2,26.7C64.6,11.5,54.8,0.2,43.1,0.2C31.4,0.2,21.6,11.5,19,26.7H0.1v77.6h86V26.7H67.2z M43.1,4.2\n' +
            '\tc9.6,0,17.7,9.6,20,22.6H23C25.4,13.8,33.5,4.2,43.1,4.2z M82.1,100.4h-78V30.7h14.4c-0.1,1.3-0.2,2.6-0.2,3.9c0,1.1,0,2.2,0.1,3.3\n' +
            '\tc-0.8,0.6-1.4,1.6-1.4,2.8c0,1.9,1.6,3.5,3.5,3.5s3.5-1.6,3.5-3.5c0-1.2-0.6-2.3-1.6-2.9c-0.1-1-0.1-2-0.1-3.1\n' +
            '\tc0-1.3,0.1-2.6,0.2-3.9h41.2c0.1,1.3,0.2,2.6,0.2,3.9c0,1,0,2.1-0.1,3.1c-1,0.6-1.6,1.7-1.6,2.9c0,1.9,1.6,3.5,3.5,3.5\n' +
            '\tc1.9,0,3.5-1.6,3.5-3.5c0-1.1-0.5-2.1-1.4-2.8c0.1-1.1,0.1-2.2,0.1-3.3c0-1.3-0.1-2.6-0.2-3.9h14.4V100.4z"></path>\n' +
            '</svg>');
	}, 100 );
});

$(document).ready(function () {
    $( '.description_tab' ).addClass('active');
    $('#tab-description').show();
});

$('.tab-bottom').click(function(){
    var target  = $(this).attr('data-target');

    $('.tab-bottom').removeClass('active');
    $(this).addClass('active');

    $('.tab-panel').hide();

    $(('#'+target)).show();

});


} ) ( jQuery, window );
