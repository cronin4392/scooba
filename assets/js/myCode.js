$(document).ready(function() {
	$.ajaxSetup ({  
		cache: true  
	});
	
	/** JQUERY UI */
	$(function(){
		$('button').button();
		/** $('.button').button(); */
		$('.button_set').buttonset();
		$('input[type="radio"]').buttonset();
		//$('input[type="checkbox"]').button();
		/** $('.container section nav a').button(); */
	});
	
	$('.accordian').addClass('closed');
	
	/** $('.accordian .expand').click(function() {
		if($(this).parent().hasClass('closed')) {
			$(this).parent().removeClass('closed');
			$(this).parent().find('p').fadeIn();
			$(this).html("Contract");
			$(this).parent().addClass('open');
		}
		else if($(this).parent().hasClass('open')) {
			$(this).parent().removeClass('open');
			$(this).parent().find('p').not(':first-of-type').fadeOut();
			$(this).html("Expand");
			$(this).parent().addClass('closed');
		}
		return false;
	}); */
	
	$('.accordian .expand').click(function() {
		$(this).closest('.accordian').toggleClass('closed');
		
		return false;
	});
	
	
				
	/**var ajax_load = "<img src='images/load.gif' alt='loading...' />";*/
});

$(window).load(function(){
	var $container = $('.masonry');
	$container.imagesLoaded(function(){
		$container.masonry({
			// options
			itemSelector : 'li',
			columnWidth : 226,
			gutterWidth : 14
		});
	});
});