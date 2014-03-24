<div class="clear"></div>
</div>
<footer id="footer" role="contentinfo">
<div id="copyright">
<?php
	echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) );
?>
</div>
<div class="credits"><a href="<?php echo getURLByTitle('Credits') ?>">Credits</a></div>
</footer>
</div>
<?php wp_footer(); ?>
</body>
</html>