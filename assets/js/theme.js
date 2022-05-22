(function ($) {
    
$(window).load(function () {
	/*
	map_resize();
	$(window).resize(map_resize);
    
    if ($('.page-contact-footer').length) {
		$('.page-contact-footer').removeClass('load');
		$('.page-contact-form').hide();
		pageContactHandler(); 
	}*/
});
    
$(document).ready(function () {
	//search icons
    $('.cl-search-icon').click(function () {
		if (!$('#search-form-overlay').is(':visible')) {
		  $('#search-form-overlay').fadeIn();
		}
	});
	$('.icon-cancel').click(function () {
		if ($('#search-form-overlay').is(':visible')) {
		  $('#search-form-overlay').fadeOut();
		}
	});

	$('.popup-video').magnificPopup({
		type: 'iframe',
		fixedContentPos: false
	});
    
    //resizes the main nav on scroll
	main_nav_resizing();
});
    
function pageContactHandler() {
	$('.contactClick').click(function (e) {
		showContactForm(false);
		e.preventDefault();
	});
	$('.leftContactClick').click(function (e) {
		showContactForm(true);
		e.preventDefault();
	});

	$('.page-contact-button').click(function () {
		if ($('.page-contact-footer').hasClass('left')) {
			showContactForm(true);
		} else {
			showContactForm(false);
		}
	});
	$('#icon-close, #icon-minimize').click(function () {
		$('body').removeAttr('style');
		$('.page-contact-form').fadeOut('fast');
		$('.page-contact-button').fadeIn('fast');
	});
}
    
// Your theme scripts
/*$('.navbar-toggle').on('click', function(e){
    e.preventDefault();
    
    $('.navbar').toggleClass('navbar-expand');
});*/
    
function map_resize() {
	if ($('.b3map').length) {
		//console.log($('.b3map').width());
		$('.b3map .elementor-widget-container').height( $('.b3map').width() - 6 );
	}
}
    
function showContactForm(left) {
	//console.log("here");
	
	if ($(window).width() < 700) {
		$('body').css('overflow','hidden');
	}

	if ( !$('.page-contact-button').hasClass('dont-fade') ) {
		$('.page-contact-button').fadeOut('fast');
	}
	/*$('#page-contact-footer').css({
		'height'   : '600px',
		'width'    : '400px',
		'overflow' : 'hidden'
	});*/

	if (left) {
		$('.page-contact-footer.left .page-contact-form').fadeIn('fast');
	} else {
		$('.page-contact-footer.right .page-contact-form').fadeIn('fast');
	}
}

/*
$(document).ready(function() {
    calculateLIsInRow();
});

$(window).resize(function(){
    calculateLIsInRow();
});
    
function calculateLIsInRow() {
    var lisInRow = 0;

    $('#submenu-container .menu > li').each(function() {
        //console.log($(this).position().top);

        $(this).removeClass("last-item").attr('data-top', $(this).position().top);
        if($(this).prev().length > 0) {
            if($(this).position().top != $(this).prev().position().top) {
                //if ($('body.page-id-30').length) {
                    if ($(window).width() > 1155) {

                    } else {
                        $(this).prev().addClass("last-item");
                    }
                //} else {

                //}
            }
            lisInRow++;
        } else {
            lisInRow++;
        }
        if ($(this).next().length > 0) {

        } else {
            $(this).addClass("last-item");
        }
    });
}
*/
    
function main_nav_resizing() {
	$('header').data('size','big');

	$(window).scroll(function () {
		if ($(window).width() > 1000) {
			if($(document).scrollTop() > 50){
				if($('header').data('size') == 'big'){
					$('header').data('size','small');

                    $('#header-top').css('overflow', 'hidden').slideUp();
                    $('.header-logo').addClass('small');
				}
			} else {
				if($('header').data('size') == 'small'){
					$('header').data('size','big');

                    $('#header-top').css('overflow', 'visible').slideDown();
                    $('.header-logo').removeClass('small');
				}
			}
		}
	});
}
})(jQuery);