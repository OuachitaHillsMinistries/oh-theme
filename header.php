<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<?php
	registerStylesheets();
	registerScripts();
	?>
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
			<a href="#sidebar" class="nav-jump"><span>Nav</span></a>
		</header>
		<?php if ( is_home() ) {
			echo do_shortcode('[flexslider slug=homepage]');
		} elseif ( $post->post_title == "Academy" ) {
			echo do_shortcode('[flexslider slug=academy]');
		} elseif ( $post->post_title == "College" ) {
			echo do_shortcode('[flexslider slug=college]');
		} ?>
		<div class="container">