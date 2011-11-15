$(document).ready(function() {
	
	$.ajaxSetup ({  
        cache: false  
    }); 
	
	
	$('.admin_page .organize').sortable({
		update: function(event, ui) {
			var size = $(this).find('li').size();
			$(this).find('li').each(function(index) {
				var id = $(this).attr('data-id');
				id = id.substring(3);
				$.get(base_url+"index.php/admin/update_project/"+id+"/position/"+size);
				size --;
			});
		}
	});
	$( ".admin_page .organize" ).disableSelection();
	
	$( ".admin_page .organize li input:checkbox").change(function() {
		var id,featured;
		
		id = $(this).parent().parent().attr('data-id');
		id = id.substring(3);
		
		if($(this).attr('checked')=="checked") {
			featured = 1;
		}
		else {
			featured = 0;
		}
		$.get(base_url+"index.php/admin/update_project/"+id+"/featured/"+featured);
	});
	
	$( ".admin_page .organize li a").live('click', function() {
		var id = $(this).closest('li').attr('data-id').substring(3);
		$('.admin_panel').load(base_url+"index.php/admin/edit_project/"+id, function() {
			$.getScript(base_url+'assets/js/myCode.js', function(data, textStatus){
			   console.log(data); //data returned
			   console.log(textStatus); //success
			   console.log('Load was performed.');
			});
			
		});
		
		return false;
	});
	
	$('.admin_page form .delete_button').live("click", function() {
		var project = $(this).parent().find('#name').val();
		var confirmation = confirm("Are you sure you want to delete "+project+"?");
		if(confirmation) {
			var id = $(this).attr('data-id').substring(3);
			
			$('.admin_panel').load(base_url+"index.php/admin/delete_project/"+id, function() {
				$.getScript(base_url+'assets/js/myCode.js', function(data, textStatus){
				   console.log(data); //data returned
				   console.log(textStatus); //success
				   console.log('Load was performed.');
				});
				
			});
		}
		
		return false;
	});
	
	$('.admin_panel form').bind('submit', function() {
		var str = $(this).serialize();
		var action = $(this).attr('action');
		$.ajax({
			url: action,
			type: 'POST',
			data: str,
			success: function(msg) {
				$('.admin_panel').html(msg);
				$.getScript(base_url+'assets/js/myCode.js', function(data, textStatus){
				   console.log(data); //data returned
				   console.log(textStatus); //success
				   console.log('Load was performed.');
				});
				$.getScript(base_url+'assets/js/admin.js', function(data, textStatus){
				   console.log(data); //data returned
				   console.log(textStatus); //success
				   console.log('Load was performed.');
				});
			}
		});
		
		return false;
	});
	
});