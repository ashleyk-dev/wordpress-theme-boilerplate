<footer>
<h1>This is the footer</h1>

<?php if ( has_nav_menu( 'footer-menu' ) ) : ?>
			<nav aria-label="<?php esc_attr_e( 'Footer menu', '<theme>' ); ?>" class="footer-navigation">
				<ul class="footer-navigation-wrapper">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer-menu',
							'items_wrap'     => '%3$s',
							'container'      => false,
						)
					);
					?>
				</ul><!-- .footer-navigation-wrapper -->
			</nav><!-- .footer-navigation -->
        <?php endif; ?>

</footer>
<?php wp_footer();?>
</body>
</html>