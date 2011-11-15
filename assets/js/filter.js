$(document).ready(function() {
	
	reset_filter();
	
	/** CUSTOM SORTING */
	// get the first collection
	var $items = $('.items');
	
	// clone items to get a second collection
	var $data = $items.clone();
	
	/** Radio boxes **/
	$('.filter input:radio').change(function() {
		filter_items();
	});
	
	$('.filter button').click(function() {
		reset_filter();
		filter_items();
	});
	
	function reset_filter() {
		$('.filter .button_set').each(function() {
			$(this).find('input').filter("[value='All']").attr("checked","checked");
		});
	}
	
	function filter_items() {
		var filters = new Array();
		var filter = "";
		
		$('.filter .button_set').each(function() {
			var type = $(this).attr('data-type');
			if(type != "all") {
				if($(this).find('input:checked').val()!="All") {
					var value = 'all_'+$(this).find('input:checked').val().toLowerCase();
					//filters[type] = value;
					filter += '[data-'+type+'="'+value+'"]';
				}
				else {
					var value = $(this).parent().find('.button_set[data-type="'+type+'"]').find('input');
					value.each(function() {
						var value = 'all_'+$(this).val().toLowerCase();
						if(value!="all") {
							//filters[type] = value;
							filter += '[data-'+type+'^= "all"]';
						}
					});
				}
			}
		});
		
		var $filteredData = $data.find('li'+filter);
		
		var count = 0;
		$filteredData.each(function() {
			
			$(this).removeClass('alpha omega');
			count++;
			if(count%3==1) {
				$(this).addClass('alpha');
			}
			else if(count%3==0) {
				$(this).addClass('omega');
			}
			
		});
		
		// finally, call quicksand
		$items.quicksand($filteredData, {
			duration: 800,
			easing: 'easeInOutQuad',
			useScaling: false
		});
	}

});