<aside id="sidebar" role="complementary">
    <?php get_search_form( true ); ?>

    <h3>Navigation</h3>
    <ul id="nav">
        <li class="home<?php if (is_home() || is_front_page()) { echo ' current_page_item'; } ?>">
            <a href="<?php echo home_url() ?>">Home</a>
        </li>
        <li class="live">
            <a href="<?php echo get_option('streamingUrl'); ?>">Live</a>
        </li>
        <?php wp_list_pages(array(
            'title_li'=>null
        )); ?>
    </ul>



    <?php if ( is_active_sidebar( 'primary-widget-area' ) ) : ?>
    <div id="primary" class="widget-area">
    <ul class="xoxo">
    <?php dynamic_sidebar( 'primary-widget-area' ); ?>
    </ul>
    </div>
    <?php endif; ?>
</aside>