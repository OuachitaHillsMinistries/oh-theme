<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/javascript.js"></script>
	<?php wp_head(); ?>
</head>

<?php
if ( isCollege() && !isAcademy() ) {
	$extraBodyClasses = 'college no-js';
} elseif ( isAcademy() && !isCollege() ) {
	$extraBodyClasses = 'academy no-js';
} else {
	$extraBodyClasses = 'home no-js';
}
?>

<!--
<?php
	echo " | isCollege(): " . isCollege();
	echo " | isAcademy(): " . isAcademy();
	echo " | topParent()->post_title: " . topParent()->post_title;
	echo " | in_category('Academy'): " . in_category('Academy');
	echo " | is_category('Academy'): " . is_category('Academy');
?>
-->

<body <?php body_class($extraBodyClasses); ?>>
	<div id="wrapper" class="hfeed">
		<header class="main-header" role="banner">
			<section class="branding">
				<div class="site-title">
					<?php if ( ! is_singular() ) { echo '<h1>'; } ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blankslate' ); ?>" rel="home">
							<img src="/wp-content/themes/ouachitahills/img/OHM%20Logo%20Responsive%20Color%201%20Small.png" alt="Ouachita Hills Ministries" />
						<?php echo "<span class='replace'>" . esc_html(get_bloginfo( 'name' )) . "</span></a>"; ?>
					<?php if ( ! is_singular() ) { echo '</h1>'; } ?></div>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			</section>
			<!--<div class="search">
				<?php get_search_form(); ?>
			</div>-->
			<nav class="navigation" role="navigation">
				
				<?php
					if ( isCollege() && !isAcademy() ) {
						$secondaryNavArgs = array(
							'authors'      => '',
							'child_of'     => collegeHomeID(),
							'date_format'  => get_option('date_format'),
							'depth'        => 0,
							'echo'         => 1,
							'exclude'      => '',
							'include'      => '',
							'link_after'   => '',
							'link_before'  => '',
							'post_type'    => 'page',
							'post_status'  => 'publish',
							'show_date'    => '',
							'sort_column'  => 'menu_order',
							'title_li'     => '', 
							'walker'       => ''
						);
					} elseif ( isAcademy() && !isCollege() ) {
						$secondaryNavArgs = array(
							'authors'      => '',
							'child_of'     => academyHomeID(),
							'date_format'  => get_option('date_format'),
							'depth'        => 0,
							'echo'         => 1,
							'exclude'      => '',
							'include'      => '',
							'link_after'   => '',
							'link_before'  => '',
							'post_type'    => 'page',
							'post_status'  => 'publish',
							'show_date'    => '',
							'sort_column'  => 'menu_order',
							'title_li'     => '', 
							'walker'       => ''
						);
					} else {
						$secondaryNavArgs = array(
							'authors'      => '',
							'child_of'     => 0,
							'date_format'  => get_option('date_format'),
							'depth'        => 0,
							'echo'         => 1,
							'exclude'      => '',
							'include'      => '',
							'link_after'   => '',
							'link_before'  => '',
							'post_type'    => 'page',
							'post_status'  => 'publish',
							'show_date'    => '',
							'sort_column'  => 'menu_order',
							'title_li'     => '', 
							'walker'       => ''
						);
					}
				?>
				
				<ul class="primary-nav">
					<li class="home<?php if (is_home() || is_front_page()) { echo ' current_page_item'; } ?>">
						<a href="/">Home</a>
					</li>
					<li class="college<?php if (isCollege() && !isAcademy()) { echo ' current_page_item'; } ?>">
						<a href="<?php echo collegeHomeURL() ?>">College</a>
					</li>
					<li class="academy<?php if (isAcademy() && !isCollege()) { echo ' current_page_item'; } ?>">
						<a href="<?php echo academyHomeURL() ?>">Academy</a>
					</li>
				</ul>
				
				<ul class="secondary-nav">
					<?php wp_list_pages( $secondaryNavArgs ); ?>
				</ul>
			</nav>
		</header>
		<?php if ( is_home() ) {
			echo do_shortcode('[flexslider slug=homepage]');
		} elseif ( $post->post_title == "Academy" ) {
			echo do_shortcode('[flexslider slug=academy]');
		} elseif ( $post->post_title == "College" ) {
			echo do_shortcode('[flexslider slug=college]');
		} ?>
		<div class="container">