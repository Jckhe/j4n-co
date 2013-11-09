(function($){

	/**
	 * Copyright 2012, Digital Fusion
	 * Licensed under the MIT license.
	 * http://teamdf.com/jquery-plugins/license/
	 *
	 * @author Sam Sehnert
	 * @desc A small plugin that checks whether elements are within
	 *		 the user visible viewport of a web browser.
	 *		 only accounts for vertical position, not horizontal.
	 */
	$.fn.visible = function(partial){
		
	    var $t				= $(this),
	    	$w				= $(window),
	    	viewTop			= $w.scrollTop(),
	    	viewBottom		= viewTop + $w.height(),
	    	_top			= $t.offset().top,
	    	_bottom			= _top + $t.height(),
	    	compareTop		= partial === true ? _bottom : _top,
	    	compareBottom	= partial === true ? _top : _bottom;
		
		return ((compareBottom <= viewBottom) && (compareTop >= viewTop));
    };
    
})(jQuery);



var doc = $(document)

doc.ready(function(){

	var project_gallery_item = $('.project_gallery_item')
	var project_gallery = $('.project_gallery')
	var gifcast = $('.gifcast').first()
	var top = 0 

	if ( project_gallery_item.length > 0 ){
		
		project_gallery_item.click(function(){
			project_gallery.toggleClass('active')
		})

		doc.scroll(function(e){
			
			if (!project_gallery.hasClass('active') &&  doc.scrollTop() < 275){
				project_gallery[0].style.height = 600 - doc.scrollTop()
			}
				
			/*
			if (gifcast.visible(true)){
				top = top-10
				console.log(top)
				gifcast[0].style.top = top

			}	
			*/
		
		})

	}
	
});//end document ready