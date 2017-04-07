<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BagPress
 */

get_header(); ?>

	<div id="primary" class="small-12 columns content-area">
		<main id="main" class="site-main portfolios" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			<div class="row">
			<?php /* Start the Loop */ 
			$portfolio_i = 0;
			while ( have_posts() ) {
				the_post();
				$portfolio_i++;
				include( locate_template( 'template-parts/content-portfolio.php' ) );
				
			} //endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
