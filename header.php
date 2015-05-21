<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( ' | ', true, 'right' ); ?></title>
	<?php
	registerStylesheets();
	registerScripts();
	echo landingPageCss();
	?>
</head>

<body <?php bodyClasses() ?>>
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
		<div class="mobile-nav">
			<?php navigation(); ?>
		</div>
		<?php slider() ?>
		<h3 class="college">College</h3>
		<h3 class="academy">Academy</h3>
		<div class="container">
