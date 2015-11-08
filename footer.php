<div class="clear"></div>
</div>
</div>
<footer id="footer" role="contentinfo">
	<div id="copyright">
		<?php
		echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) );
		?>
	</div>
	<div class="credits">
        <?php $creditsFolder = get_bloginfo('template_directory') . '/img/credits';?>
        <a href="https://github.com/OuachitaHillsMinistries/oh-theme"><img src="<?php echo $creditsFolder; ?>/github-favicon.ico" alt="GitHub" title="GitHub" width=16 height=16 /></a>
        <a href="https://wordpress.org/"><img src="<?php echo $creditsFolder; ?>/wordpress-favicon.ico" alt="WordPress" title="WordPress" width=16 height=16 /></a>
        <a href="http://tidythemes.com/"><img src="<?php echo $creditsFolder; ?>/tidythemes-favicon.ico" alt="TidyThemes" title="TidyThemes" width=16 height=16 /></a>
        <a href="http://www.surveymoz.com/"><img src="<?php echo $creditsFolder; ?>/surveymoz-favicon.ico" alt="SurveyMoz" title="SurveyMoz" width=16 height=16 /></a>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>