


$(document).ready(function() {

	'use strict';

	function scrollToSection(event) {
	    event.preventDefault();
	    var $section = $("#" + $(this).attr('data-section')); 
	    $('html, body').animate({
	      scrollTop: $section.offset().top - 70
	    }, 180);
	  }
	  $(document).on('click', '.data-scroll', scrollToSection);

	  // Back to top
		var amountScrolled = 200;
		var amountScrolledNav = 25;

		$(window).scroll(function() {
		  if ( $(window).scrollTop() > amountScrolled ) {
		    $('button.back-to-top').addClass('show');
		  } else {
		    $('button.back-to-top').removeClass('show');
		  }
		});

		$('button.back-to-top').click(function() {
		  $('html, body').animate({
		    scrollTop: 0
		  }, 180);
		  return false;
		});
	


	var map;

	function initialize() {
		var mapOptions = {
			zoom: 13,
			center: new google.maps.LatLng(50.97797382271958, -114.107718560791)
			// styles: style_array_here
		};
		map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	}

	var google_map_canvas = $('#map-canvas');

	if (google_map_canvas.length) {
		google.maps.event.addDomListener(window, 'load', initialize);
	}

	

});
