<footer class="site-footer">

    <?php if (has_nav_menu('footer-menu')) : ?>
            <nav class="footer-navigation navigation-menu">
                <?php
                wp_nav_menu(
                    [
                        'theme_location' => 'footer-menu',
                    ]
                );
                ?>
            </nav>
	<?php endif; ?>

</footer>
</body>
</html>