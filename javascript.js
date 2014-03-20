// JavaScript Document
/*
$(document).ready(function() {
	$('.branding').after('<a href="#" class="toggle-search" title="Toggle search"><img src="/wp-content/themes/ouachitahills/img/search-icon-2.png" width="20" /></a>');
	
	$('.search').hide();
	
	$('.toggle-search').click(function() {
		$('.search').toggle();
	});
});


$(document).ready(function() {
	$.fn.textWidth = function(){
        var self = $(this),
            calculator = $('<span style="display: inline-block;" />'),
            width;
    
        self.wrap(calculator);
        width = self.parent().width(); // parent = the calculator wrapper
        self.unwrap();
        return width;
    };
    
    function neededNavSpace(buffer) {
    	$('.menu').addClass('horizontal');
		var navWidth = 0;
		$('.menu>li').each(function() {
			navWidth += ($(this).textWidth() + buffer);
		});
		return navWidth;
    }
    
    var neededNavSpace = neededNavSpace(25);
    
    function availableNavSpace() {
		return $(window).width() - $('.branding').width();
    }
	
    $('.branding').after('<a href="#" class="toggle-menu" title="Toggle menu"><div></div><div></div><div></div><div></div><div></div></a>');
		
	$('.toggle-menu').click(function() {
		$('.search').hide();
		$('.menu').toggle();
	});
	
	$(window).resize(function(){
		console.log('Needed: ' + neededNavSpace);
		console.log('Available: ' + availableNavSpace());
		if (availableNavSpace() > neededNavSpace) {
			$('.menu').addClass('horizontal');
			$('.menu').show();
			$('.toggle-menu').hide();
		} else {
			$('.menu').removeClass('horizontal');
			$('.menu').hide();
			$('.toggle-menu').show();
		}
	});
	
	$(window).resize();
});
*/