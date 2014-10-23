<article id="post-<?php the_ID(); ?>" <?php post_class( ( myIsSingular() ? 'single' : 'plural' ) ); ?>>
	<?php if ( has_post_thumbnail() && !myIsSingular() ) {
		$domsxe = simplexml_load_string(get_the_post_thumbnail());
        if (isset($domsxe->src)) {
            $thumbnailsrc = $domsxe->attributes()->src;
        } else {
            $thumbnailsrc = '';
        }
		?>

        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark" style="background: url('<?php echo $thumbnailsrc; ?>') no-repeat center center scroll;" >
			<?php echo get_the_post_thumbnail(NULL, 'large') ?>
		</a>
	<?php } ?>
    <div class="details">
		<header>
			<?php if ( myIsSingular() ) {
				echo '<h1 class="entry-title">';
			} else { ?>
				<h2 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
			<?php } ?>
				
					<?php the_title(); ?>
				
			<?php if ( myIsSingular() ) { echo '</h1>'; } else { echo '</a></h2>'; } ?>
		</header>
		<?php get_template_part( 'entry', ( myIsSingular() ? 'content' : 'summary' ) ); ?>
		<?php if ( !is_search() ) get_template_part( 'entry-footer' ); ?>
	</div>
</article>