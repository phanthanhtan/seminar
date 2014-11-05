
$(document).ready(function(){
	$(".tptnslides").owlCarousel({
		items : 4,
		itemsDesktop : [1440,3],
		itemsDesktopSmall : [1023,2],
		itemsTablet: [767,2],
		itemsMobile : [479,1],
		slideSpeed : 500,
		rewindSpeed : 1000,
		autoPlay : true,
		stopOnHover : false,
		navigation : true,
		navigationText : ["",""],
        scrollPerPage : true,
		pagination : false,
		baseClass : "",
		theme : "",
		lazyLoad : true
	});
});