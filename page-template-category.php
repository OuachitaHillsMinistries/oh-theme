<?php
/*
Template Name: Category
*/
?>

<?php get_header(); ?>
<section id="content" role="main">
	<?php 
	$categoryName = get_post_meta( get_the_ID(), 'categoryPageCategory', true );
        
        $isCategoryUncategorized = $categoryName == 'Uncategorized';
        
        if ($isCategoryUncategorized) {
            $categoryId = NULL;
        } else {
            $categoryId = get_category_id($categoryName);
        }
        
	$args = array ( 'category' => $categoryId, 'posts_per_page' => 5);
	$myposts = get_posts( $args );
        
	foreach ( $myposts as $post ) {
            setup_postdata($post);
            get_template_part( 'entry' );
        }
        ?>
	
	<!--
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry' ); ?>
		<?php comments_template(); ?>
	<?php endwhile; endif; ?>
	-->
	
	<?php get_template_part( 'nav', 'below' ); ?>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>