// JavaScript Document

jQuery(document).ready(function() {
	jQuery('.page_item_has_children').append('<a class="toggle" href="#">+</a>');
	jQuery('.current_page_item>.toggle, .current_page_ancestor>.toggle').html('-');

	jQuery('.toggle').click(function(e) {
		e.preventDefault();
		jQuery(this).siblings('ul').slideToggle();
		if (jQuery(this).html() == '+') {
			jQuery(this).html('-')
		} else {
			jQuery(this).html('+')
		}
	});

	jQuery('#s').value = 'Search';
	jQuery('#s').focus(function() {
		if (this.value == 'Search') {
			this.value = '';
			jQuery(this).css('color','black');
		}
	});
	jQuery('#s').blur(function() {
		if (this.value == '') {
			this.value = 'Search';
			jQuery(this).css('color','grey');
		}
	});
});