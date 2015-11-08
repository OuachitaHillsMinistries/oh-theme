<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup()
{
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'blankslate' ) )
);
}
add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );
function blankslate_load_scripts()
{
wp_enqueue_script( 'jquery' );
}
add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );
function blankslate_enqueue_comment_reply_script()
{
if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}
add_filter( 'the_title', 'blankslate_title' );
function blankslate_title( $title ) {
if ( $title == '' ) {
return '&rarr;';
} else {
return $title;
}
}
add_filter( 'wp_title', 'blankslate_filter_wp_title' );
function blankslate_filter_wp_title( $title )
{
return $title . esc_attr( get_bloginfo( 'name' ) );
}
add_action( 'widgets_init', 'blankslate_widgets_init' );
function blankslate_widgets_init()
{
register_sidebar( array (
'name' => __( 'Sidebar Widget Area', 'blankslate' ),
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '<h3 class="widget-title">',
'after_title' => '</h3>',
) );
}
function blankslate_custom_pings( $comment )
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter( 'get_comments_number', 'blankslate_comments_number' );
function blankslate_comments_number( $count )
{
if ( !is_admin() ) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count( $comments_by_type['comment'] );
} else {
return $count;
}
}

# =================== My Additions ===================

# === FOR THEME:

add_action( 'after_setup_theme', 'createImageSize' );
function createImageSize() {
	add_image_size( 'ohThumb', 400, 400 );
}

add_theme_support( 'post-thumbnails' );
add_editor_style('style.css'); // Add CSS to Visual Editor

function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">Continue Reading...</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

function setup_theme_admin_menus() {
    add_submenu_page('themes.php', 'OH Theme Settings', 'OH Theme', 'manage_options', 'oh-theme-settings', 'createSettingsPanel');
}

add_action("admin_menu", "setup_theme_admin_menus");

function createSettingsPanel() {
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }

    $panelUrl = get_admin_url( 0, 'themes.php?page=oh-theme-settings' );

    if(isset($_POST['streaming'])) {
        update_option('streamingUrl',$_POST['streaming']);
    }

    $streamingUrl = get_option('streamingUrl');

    echo "
        <h2>Ouachita Hills Theme Options</h2>
        <form method='post' action='$panelUrl'>
            <label for=\"streaming\">
                Streaming URL:
            </label>
            <br />
            <input type=\"text\" name=\"streaming\" size=\"50\" value='$streamingUrl' />
            <br /><br />
            <input type='submit' value='Save Settings' />
        </form>
    ";

}

function isAcademy() {
	if (is_category('College') || is_home()) {
		return False;
	}
	if (topParent()->post_title == 'Academy' || in_category('Academy') || is_category('Academy')) {
		return True;
	} else {
		return False;
	}
}

function isCollege() {
	if (is_category('Academy') || is_home()) {
		return False;
	}
	if (topParent()->post_title == 'College' || in_category('College') || is_category('College')) {
		return True;
	} else {
		return False;
	}
}

function topParent() {
	$parents = get_post_ancestors( postID() );
	return get_post(end($parents));
}

function postID() {
	$url = explode('?', 'http://'.$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
	$ID = url_to_postid($url[0]);
	return $ID;
}

function collegeHomeURL() {
	return getURLByTitle('College');
}

function academyHomeURL() {
	return getURLByTitle('Academy');
}

function getURLByTitle( $title ) {
	$page = get_page_by_title( $title );
	return get_permalink( $page->ID );
}

function collegeHomeID() {
	return getIDByTitle('College');
}

function academyHomeID() {
	return getIDByTitle('Academy');
}

function getIDByTitle( $title ) {
	$page = get_page_by_title( $title );
	return $page->ID;
}

function get_category_id($cat_name) {
	$term = get_term_by('name', $cat_name, 'category');
	return $term->term_id;
}

function myIsSingular() {
	return is_singular() && !is_page_template('page-template-category.php');
}

function getPostThumbnail() {
	if (shouldUseThumbnail()) {
		$thumb = get_the_post_thumbnail();
		$permalink = get_permalink();
		$title = getPostTitle();
		return "<a href='$permalink' class='thumbnail' title='$title' rel='bookmark'>$thumb</a>";
	}
}

function getPostTitle()
{
	$args = array(
		'echo' => false
	);
	$title = the_title_attribute($args);
	return $title;
}

function shouldUseThumbnail()
{
	return has_post_thumbnail() && !myIsSingular();
}

function registerStylesheets()
{
	wp_register_style('ohFontAwesome','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css');
	wp_register_style('ohThemeStyle', get_stylesheet_uri());
	wp_register_style('ohThemeSass', get_bloginfo('template_directory') . "/style.css");
	wp_enqueue_style('ohThemeStyle');
	wp_enqueue_style('ohThemeSass');
}

function registerScripts()
{
	echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-62244680-1', 'auto');
  ga('send', 'pageview');

</script>";
	wp_register_script('ohThemeJs', get_bloginfo('template_directory') . '/javascript.js', array('jquery'));
	wp_enqueue_script('ohThemeJs');
	wp_head();
}

function navigation() {
	$searchForm = get_search_form(false);
	$pages = wp_list_pages(array(
		'title_li'=>null,
		'echo'=>false
	));

	$homeLinkClasses = (is_home() || is_front_page()) ? 'home current_page_item' : 'home';
	$homeLinkUrl = home_url();
	$homeLink = "<li class='$homeLinkClasses'><a href='$homeLinkUrl'>Home</a></li>";

	$liveUrl = get_option('streamingUrl');
	$liveLink = "<li class='live'><a href='$liveUrl'>Live</a></li>";

	$menu = "<ul class='nav'>$homeLink$liveLink$pages</ul>";

	echo "<div class='navigation'>$searchForm$menu</div>";
}

function slider() {

	if ( is_home() ) {
		echo do_shortcode('[flexslider slug=homepage]');
	} elseif (isAcademyHome()) {
		echo do_shortcode('[flexslider slug=academy]');
	} elseif (isCollegeHome()) {
		echo do_shortcode('[flexslider slug=college]');
	}
}

function isAcademyHome()
{
	$post = get_post();
	return $post->post_title == "Academy";
}

function isCollegeHome()
{
	$post = get_post();
	return $post->post_title == "College";
}

function bodyClasses() {
	$classes = 'no-js';

	if ( isCollege() && !isAcademy() ) {
		$classes .= ' college';
	} elseif ( isAcademy() && !isCollege() ) {
		$classes .= ' academy';
	}

	if (isAcademyHome()) {
		$classes .= ' academyHome';
	}

	if (isCollegeHome()) {
		$classes .= ' collegeHome';
	}

	if (is_home()) {
		$classes .= ' home';
	}

	return body_class($classes);
}

function registerLandingPagePostType() {
	$args = array(
		'label' => 'Landing Pages',
		'labels' => array(
			'name' => 'Landing Pages',
			'singular_name' => 'Landing Page',
			'menu-name' => 'Landing Pages'
		),
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => false,
		'query_var' => true,
		'rewrite' => true,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 20,
		'menu_icon' => 'dashicons-megaphone',
		'supports' => array('title','editor','revisions')
	);
	register_post_type( 'ohlandingpage', $args );
}

add_action( 'init', 'registerLandingPagePostType' );

function disableLandingPageVisualEditor($default) {
	global $post;
	$isLandingPage = get_post_type($post) == 'ohlandingpage';
	return ($isLandingPage) ? false : $default;
}

add_filter('user_can_richedit','disableLandingPageVisualEditor');

function myplugin_add_meta_box() {
	add_meta_box(
		'ohlandingpagecss',
		'Landing Page CSS',
		'ohLandingPageCssCallback',
		'ohlandingpage'
	);
}
add_action( 'add_meta_boxes', 'myplugin_add_meta_box' );

function ohLandingPageCssCallback( $post ) {
	wp_nonce_field( 'ohlandingpagecss', 'ohlandingpagecssnonce' );
	$value = get_post_meta( $post->ID, 'ohlandingpagecss', true );

	echo "<textarea  id='ohlandingpagecssfield' name='ohlandingpagecssfield' style='width:100%;' rows='20'>$value</textarea>";
}

function ohSaveLandingPageCss( $post_id ) {
	$isNonceUnset = !isset($_POST['ohlandingpagecssnonce']);
	$isNonceInvalid = !wp_verify_nonce($_POST['ohlandingpagecssnonce'], 'ohlandingpagecss');
	$userLacksPermission = !current_user_can('edit_post', $post_id);
	$isFieldNotSet = !isset($_POST['ohlandingpagecssfield']);
	
	if ($isNonceUnset or $isNonceInvalid or $userLacksPermission or $isFieldNotSet) {
		return;
	}

	$my_data = implode( "\n", array_map( 'sanitize_text_field', explode( "\n", $_POST['ohlandingpagecssfield'] ) ) );
	update_post_meta( $post_id, 'ohlandingpagecss', $my_data );
}
add_action( 'save_post', 'ohSaveLandingPageCss' );

function landingPageCss() {
	$post = get_post();
	if (isLandingPage($post)) {
		$style = get_post_meta( $post->ID, 'ohlandingpagecss', true );
		return "<style media='screen' type='text/css'>$style</style>";
	}
}

function isLandingPage($post)
{
	return get_post_type($post) == 'ohlandingpage';
}

function htmlTitle() {
	$post = get_post();
	$title = (isLandingPage($post)) ? get_bloginfo( 'name' ) : wp_title( ' | ', false, 'right' );
	return "<title>$title</title>";
}

# === FOR PLUGINS:

function set_flexslider_hg_rotators( $rotators = array() )
{
    $rotators['homepage']         = array( 'size' => 'homepage-rotator', 'heading_tag' => 'h1' );
    $rotators['college']         = array( 'size' => 'homepage-rotator', 'heading_tag' => 'h1' );
    $rotators['academy']         = array( 'size' => 'homepage-rotator', 'heading_tag' => 'h1' );
    return $rotators;

}
add_filter('flexslider_hg_rotators', 'set_flexslider_hg_rotators');