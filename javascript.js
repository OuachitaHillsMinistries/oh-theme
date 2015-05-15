// JavaScript Document

jQuery(document).ready(function() {
	function setupNavigationSubmenus() {
		jQuery('.page_item_has_children').append('<a class="toggle" href="#">+</a>');
		jQuery('.current_page_item>.toggle, .current_page_ancestor>.toggle').html('-');
		jQuery('.toggle').click(function (e) {
			e.preventDefault();
			jQuery(this).siblings('ul').slideToggle();
			if (jQuery(this).html() == '+') {
				jQuery(this).html('-')
			} else {
				jQuery(this).html('+')
			}
		});
	}

	function setupSearchBoxDefaultText() {
		var searchBoxes = jQuery("input[name='s']");
		searchBoxes.each(function () {
			if (this.value == '') {
				this.value = 'Search';
			} else if (this.value != 'Search') {
				jQuery(this).css('color', 'black');
			}
		});
		searchBoxes.focus(function () {
			if (this.value == 'Search') {
				this.value = '';
				jQuery(this).css('color', 'black');
			}
		});
		searchBoxes.blur(function () {
			if (this.value == '') {
				this.value = 'Search';
				jQuery(this).css('color', 'grey');
			}
		});
	}

	setupNavigationSubmenus();
	setupSearchBoxDefaultText();
});