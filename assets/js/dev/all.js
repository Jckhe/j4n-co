
$(document).ready(function(){

	var $sandwich = $('.sandwich');
	var $flipcube = $('.flip-cube')

	var onHamSandwich = function(){
	   $flipcube.toggleClass('hover')
	}

	$sandwich.each(function(index, sandwich){
		
		var ham_sandwich = new Hammer( sandwich );
		
		ham_sandwich.on('tap', onHamSandwich)

	})
	

	$('.bubble-menu').on('touchstart focus', function(){

		$(this).toggleClass('active'); 
	})


	$('.tiles label').on('mouseover', function(){
		$(this).trigger('click')
	})

	/*Home Parallax Scroll
	====================*/

	$('.icon--play').on('mouseover mouseleave', function(){

		var vid = $(this).prev()[0]

		if (vid.paused ) {
			vid.play(); 
			$(this).addClass('hidden')
		} else {
			vid.pause();
			$(this).removeClass('hidden')
		}

	})

	function toggleInput(){

		var thisID = $(this).attr('id')
		
		if ( !thisID ) {
			thisID = $('.tiles label').first().attr('for')
		}

		$('label .tile').removeClass('active')
		$("label[for='"+thisID+"'] .tile").addClass('active')
	}
	toggleInput()

	$("input[name='showcase-item']").change(toggleInput); 

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