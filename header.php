<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/sass.css" />
	<script src="<?php bloginfo('template_directory'); ?>/jquery-2.0.3.min.js"></script>
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
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'blankslate' ); ?>" rel="home">
						<img src="<?php bloginfo('template_directory'); ?>/img/OHM-Logo-Responsive-Color-1-Medium.png" alt="Ouachita Hills Ministries" />
					<?php echo "<span class='replace'>" . esc_html(get_bloginfo( 'name' )) . "</span></a>"; ?>
				</div>
				<div class="site-description"><?php bloginfo( 'description' ); ?></div>
			</section>
			<!--<div class="search">
				<?php get_search_form(); ?>
			</div>-->
			<nav class="navigation" role="navigation">
				
				<ul class="primary-nav">
					<li class="home<?php if (is_home() || is_front_page()) { echo ' current_page_item'; } ?>">
						<a href="<?php echo home_url() ?>">Home</a>
					</li>
					<li class="college<?php if (isCollege() && !isAcademy()) { echo ' current_page_item'; } ?>">
						<a href="<?php echo collegeHomeURL() ?>">College</a>
					</li>
					<li class="academy<?php if (isAcademy() && !isCollege()) { echo ' current_page_item'; } ?>">
						<a href="<?php echo academyHomeURL() ?>">Academy</a>
					</li>
				</ul>
				
				<ul class="secondary-nav">
					<?php wp_list_pages( regionalSecondaryNavArgs() ); ?>
                    <li><a href="<?php echo get_option('streamingUrl'); ?>" target="_blank">Live</a></li>
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