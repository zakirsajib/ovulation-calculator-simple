$ = jQuery.noConflict();
$(function ($) {
	
	$(document).ready(function() {
	  	$('#calendarInput, .calculator_table .icon-calendar2').click(function(){
	  		$('#calendar').toggle();
		});
	    
	    $('#calculatorOk').prop('disabled',true);
	    	    	    
	    // Email Send and checkbox
	    
	    $('#emailsend').prop('disabled',true);
		$('#ocEmail').keyup(function(){
			$('#emailsend').prop('disabled', this.value == "" ? true : false);
			$('#subscribeNews').prop("checked", true);
    	});
    	
    	$('#subscribeNews').change(function () {
			$('#emailsend').prop("disabled", !this.checked);
		});
		
		// Fertile Days fading
		setTimeout(function() {
								
			$('.fertileDay').each(function (x) {
				$(this).addClass('fertileDay-' + x);
			});
		}, 500);
		
		// Fertile Days fading
		$('.ui-datepicker-next, .ui-datepicker-prev').live('click', function(){
			setTimeout(function() {				
				$('.fertileDay').each(function (x) {
					$(this).addClass('fertileDay-' + x);
				});
			}, 500);
		});
		
		$('.fertile img.fertileTick[src$=".svg"], .fertile img.expected-ovulation[src$=".svg"]').each(function() {
	        var $img = jQuery(this);
	        var imgURL = $img.attr('src');
	        var attributes = $img.prop("attributes");
	
	        $.get(imgURL, function(data) {
	            // Get the SVG tag, ignore the rest
	            var $svg = jQuery(data).find('svg');
	
	            // Remove any invalid XML tags
	            $svg = $svg.removeAttr('xmlns:a');
	
	            // Loop through IMG attributes and apply on SVG
	            $.each(attributes, function() {
	                $svg.attr(this.name, this.value);
	            });
	
	            // Replace IMG with SVG
	            $img.replaceWith($svg);
	        }, 'xml');
	    });
		
		
		
	});
});