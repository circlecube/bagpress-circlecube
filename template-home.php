<?php
/**
 * Template Name: Home Page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BagPress
 */

get_header(); ?>

	<div id="primary" class="small-12 columns content-area">
		<main id="main" class="site-main" role="main">
		
			<h1 class="entry-title">circlecube</h1>

		</main><!-- #main -->
		
		<?php dynamic_sidebar( 'home-aside' ); ?>
		
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
