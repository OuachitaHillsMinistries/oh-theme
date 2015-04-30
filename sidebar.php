<aside id="sidebar" role="complementary">
    <h3>Navigation</h3>
    <ul class="secondary-nav" id="nav">
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