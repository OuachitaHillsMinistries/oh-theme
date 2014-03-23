// JavaScript Document

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
    	$('.navigation').addClass('horizontal');
		var navWidth = 0;
		$('.secondary-nav>li').each(function() {
			navWidth += ($(this).textWidth() + buffer);
		});
		return navWidth;
    }
    
    function addToggleButtons() {
    	var toggleButton = '<a href="#" class="toggle-secondary-nav" title="Toggle secondary nav"><div></div><div></div><div></div><div></div><div></div>Toggle menu</a>';
		
		$('.secondary-nav').before(toggleButton);
		$('.secondary-nav').append('<li class="toggle">' + toggleButton + '</li>');
		
		$('.toggle-secondary-nav').click(function() {
			$('.secondary-nav').toggle();
		});
    }
    
    function setNavToHorizontal() {
    	$('.navigation').addClass('horizontal');
		$('.toggle-secondary-nav, .toggle').hide();
		$('.secondary-nav').show();
    }
    
    function setNavToVertical() {
    	$('.navigation').removeClass('horizontal');
		$('.toggle-secondary-nav, .toggle').css( "display", "block");
		$('.secondary-nav').hide();
    }
    
    function loadResizeFunction() {
    	$(window).resize(function() {
    		var availableSpace = $('body').width();
    		
			if ( availableSpace > neededSpace ) {
				setNavToHorizontal();
			} else {
				setNavToVertical();
			}
		});
		
		$(window).resize();
    }
    
    function initiateResponsiveNavigation() {
		neededSpace = neededNavSpace(20);
    
		addToggleButtons();
		loadResizeFunction();
    }
    
    var neededSpace
    
    initiateResponsiveNavigation()
});