<div class="clear"></div>
</div>
</div>
<footer id="footer" role="contentinfo">
    <div class="contact">
        <h5>Contact</h5>
        <address>Ouachita Hills Ministries<br />
        46 Madison Way<br />
        Amity, AR, 71921</address>
        <address>Phone: (870) 342-6210</address>
        <address>Fax: (870) 342-9569</address>
        <address>Email: info@ohc.org</address>
    </div>
	<div class="links">
        <h5>Links</h5>

        <?php
        $imgFolder = get_bloginfo('template_directory') . '/img';
        $socialFolder = $imgFolder . '/social';
        $creditsFolder = $imgFolder . '/credits';
        ?>

        <div class="social">
            Social
            <a href="https://twitter.com/ouachitahills"><i class="fa fa-twitter fa-2x"></i></a>
            <a href="https://www.facebook.com/Ouachita-Hills-College-61457016451/"><img src="<?php echo $socialFolder; ?>/facebook-favicon.ico" alt="Facebook" title="Facebook" width=16 height=16 /></a>
            <a href="https://instagram.com/ouachitahills/"><img src="<?php echo $socialFolder; ?>/instagram-favicon.ico" alt="Instagram" title="Instagram" width=16 height=16 /></a>
            <a href="https://www.youtube.com/user/OuachitaHillsMedia"><img src="<?php echo $socialFolder; ?>/youtube-favicon.ico" alt="YouTube" title="YouTube" width=16 height=16 /></a>
        </div>

        <div class="credts">
            Credits
            <a href="https://github.com/OuachitaHillsMinistries/oh-theme"><img class="github" src="<?php echo $creditsFolder; ?>/github-favicon.ico" alt="GitHub" title="GitHub" width=16 height=16 /></a>
            <a href="https://wordpress.org/"><img src="<?php echo $creditsFolder; ?>/wordpress-favicon.ico" alt="WordPress" title="WordPress" width=16 height=16 /></a>
            <a href="http://tidythemes.com/"><img src="<?php echo $creditsFolder; ?>/tidythemes-favicon.ico" alt="TidyThemes" title="TidyThemes" width=16 height=16 /></a>
            <a href="http://www.surveymoz.com/"><img src="<?php echo $creditsFolder; ?>/surveymoz-favicon.ico" alt="SurveyMoz" title="SurveyMoz" width=16 height=16 /></a>
        </div>
    </div>
    <div id="copyright">
        <h5>Copyright</h5>
        <?php
        echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'blankslate' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) );
        ?>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>