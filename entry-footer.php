<footer class="entry-footer">
	<span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span>
	<span class="meta-sep"> | </span>
	<span class="cat-links"><?php _e( 'Categories: ', 'blankslate' ); ?><?php the_category( ', ' ); ?></span>
	<span class="tag-links"><?php the_tags(); ?></span>
	
	<?php if ( comments_open() ) { 
		echo '<span class="meta-sep"> | </span> <span class="comments-link"><a href="' . get_comments_link() . '">' . sprintf( __( 'Comments', 'blankslate' ) ) . '</a></span>';
	} ?>
	
	<?php if ( current_user_can('edit_post') ) { ?>
		<span class="meta-sep"> | </span>
	<?php } ?>
	
	<?php edit_post_link(); ?>
</footer> 