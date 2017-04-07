<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BagPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( has_post_thumbnail() ) { 
			the_post_thumbnail( 'thumbnail' );
		} ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
