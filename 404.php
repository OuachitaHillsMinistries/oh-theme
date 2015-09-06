<?php
get_header();
$urlElements = explode('/', $_SERVER['REQUEST_URI']);
$page = end($urlElements);
if ($page === 'live') {
    echo '<h1>Redirecting...</h1>';
    $streamingUrl = get_option('streamingUrl');
    echo "Didn't quite work? <a href='$streamingUrl'>Click here.</a>";
    echo "<script>window.location.href = '$streamingUrl';</script>";
} else { ?>

<section id="content" role="main">
<article id="post-0" class="post not-found">
<header class="header">
<h1 class="entry-title"><?php _e( 'Not Found', 'blankslate' ); ?></h1>
</header>
<section class="entry-content">
    <p><?php _e( 'Nothing found for the requested page. Try a search instead?', 'blankslate' ); ?></p>
    <?php get_search_form(); ?>
</section>
</article>
</section>

<?php
get_sidebar();
get_footer();
} ?>
