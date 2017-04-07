<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BagPress
 */

?>
			</div><!-- .row -->
		</div><!-- .row_wrap -->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row_wrap">
			<div class="row">
				<?php dynamic_sidebar( 'footer-aside' ); ?>
				<div class="small-12 columns">
					<?php wp_nav_menu( array( 'theme_location' => 'social', 'menu_id' => 'social-menu' ) ); ?>
				</div>
				<div class="small-12 columns site-info legal">
					&copy; <?php echo date('Y'); ?> Evan Mullins <?php bloginfo('name'); ?>.com
				</div><!-- .site-info -->
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
