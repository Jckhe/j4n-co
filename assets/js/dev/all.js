
$(document).ready(function(){



	 var owl = $(".owl-carousel")

	 var owlItems = $('owl-item')
	 owl.owlCarousel({
	 	navigation : true,
	 	smartSpeed : 1000,
	 	singleItem:true, 
	 	items : 1, 
	 	itemsDesktop : false,
	 	itemsDesktopSmall : false,
	 	itemsTablet: false,
	 	itemsMobile : false, 
	 	loop:true
	 });

	 owl.on('translated.owl.carousel', function(event) {
	     var href = $('.owl-item.active').find('.js-carousel-link').attr('href')
	     $(href).siblings('.js-carousel-description').removeClass('active'); 
	     $(href).addClass('active'); 
	 })

	 $('.js-carousel-link').on('click', function(){
	 	$('.js-carousel-description-container').toggleClass('active')
	 	var href = $(this).attr('href'); 
	 	$(href).siblings('.js-carousel-description').removeClass('active'); 
	 	$(href).addClass('active'); 
	 })


	/*Home Parallax Scroll
	====================*/

	$.localScroll();


	function prevNext(){

		if ( $('.prevnext-nav').length < 0 ) {
			return; 
		} 

		var wHeight = $(window).height(); 

		var navOffset = wHeight / 2 ; 

		$(window).on('scroll', function(){
			
			if ( window.scrollY > navOffset ) {
				$('.prevnext-nav').addClass('active')
			} else {
				$('.prevnext-nav').removeClass('active')
			}

		});

	}
	prevNext();


	/*sandwich nav
	====================*/

	function is_touch_device() {
	  return !!('ontouchstart' in window);
	}

	if ( is_touch_device() ) {	
		
		$('.sandwich-nav').on('touchstart', function(e){

			var link = $(this);
			if ( link.hasClass('hover') ) 
			{
			    return true;
			} else 
			{
			    link.toggleClass('hover');
			    e.preventDefault();
			    return false;
			}

		})
	}

});