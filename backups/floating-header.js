jQuery(document).ready(function($) {
	'use strict';

		// Float Header Start

		var stickyOffset = $('.space-header-float').offset().top;

		$(window).scroll(function(){
			'use strict';
		  var sticky = $('.space-header-float'),
		      scroll = $(window).scrollTop();
		    
		  if (scroll >= 200) sticky.addClass('fixed');
		  else sticky.removeClass('fixed');
		});

		// Float Header End

});