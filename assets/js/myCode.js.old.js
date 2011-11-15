$(document).ready(function() {
	$.ajaxSetup ({  
		cache: true  
	});
	
	/** JQUERY UI */
	$(function(){
		$('button').button();
		$('.button_set').buttonset();
		$('input[type="radio"]').buttonset();
		$('input[type="checkbox"]').button();
	});
	
	/** CUSTOM SORTING */
	// get the first collection
	var $items = $('.items');
	
	// clone items to get a second collection
	var $data = $items.clone();
	
	/** Radio boxes **/
	$('.filter input:radio').change(function() {
		var filterVal = $(this).val();
		
		var checked = $(this).is(':checked');
		var name = $(this).attr('name');
		
		
		//$('ul.items li').each(function() {
			if(filterVal=="All") {  
				//var $filteredData.push($(this));
				//alert("HI");
				var $filteredData = $data.find('li');
			}
			else {
			  var $filteredData = $data.find('li[data-type=' + $(this).val() + ']');
			}
			/**else if($(this).hasClass(filterVal)) {  
				//$(this).fadeIn('slow').removeClass('hidden');
				//var $filteredData.push($(this));
			}
			else {
				//$(this).fadeOut('normal').addClass('hidden');
			}*/
		//});
		// finally, call quicksand
		$items.quicksand($filteredData, {
		  duration: 800,
		  easing: 'easeInOutQuad'
		});
		
	});
	/** END CUSTOM SORTING */
	
	/** quicksand */
	// Custom sorting plugin
	/**(function($) {
	  $.fn.sorted = function(customOptions) {
	    var options = {
	      reversed: false,
	      by: function(a) { return a.text(); }
	    };
	    $.extend(options, customOptions);
	    $data = $(this);
	    arr = $data.get();
	    arr.sort(function(a, b) {
	      var valA = options.by($(a));
	      var valB = options.by($(b));
	      if (options.reversed) {
	        return (valA < valB) ? 1 : (valA > valB) ? -1 : 0;				
	      } else {		
	        return (valA < valB) ? -1 : (valA > valB) ? 1 : 0;	
	      }
	    });
	    return $(arr);
	  };
	})(jQuery);
	
	// DOMContentLoaded

	//$('.filter input:radio')
	  // bind radiobuttons in the form
	  var $filterCategory = $('.filter input[name="category"]');
	  var $filterType = $('.filter input[name="type"]');
	  var $filterYear = $('.filter input[name="year"]');
	
	  // get the first collection
	  var $items = $('.items');
	
	  // clone items to get a second collection
	  var $data = $items.clone();

	  // attempt to call Quicksand on every form change
	  $('.filter input:radio').change(function(e) {
	    //alert($(this).val());
	    if ($(this).val() == 'All') {
	      var $filteredData = $data.find('li');
	    } else {
	      var $filteredData = $data.find('li[data-type=' + $(this).val() + ']');
	    }
	
	    
	      // if sorted by name
	      var $sortedData = $filteredData.sorted({
	        by: function(v) {
	          return $(v).find('strong').text();
	        }
	      });
	
	    // finally, call quicksand
	    $items.quicksand($sortedData, {
	      duration: 800,
	      easing: 'easeInOutQuad'
	    });
	
	  });*/
	
		
	/**var ajax_load = "<img src='images/load.gif' alt='loading...' />";*/
});