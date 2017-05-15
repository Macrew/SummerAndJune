$(document).ready(function(){
	/** slider homepage */
      $("#slider1").responsiveSlides({
		maxwidth: 1072, 
		auto: true,
		pager: false,
		nav: true,
		speed: 500,
		namespace: "callbacks",
		before: function () {
		  $('.events').append("<li>before event fired.</li>");
		},
		after: function () {
		  $('.events').append("<li>after event fired.</li>");
		}
	  });
  
  
}); // end of file