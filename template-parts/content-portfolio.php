<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BagPress
 */

?>
<?php 
// $portfolio_i = 1;
// $portfolio_size = 'medium';
	if ( $portfolio_i === 1 ) {
		$classes = 'small-12 columns folio_' . $portfolio_i;
		if ( !isset($portfolio_size) ){
			$portfolio_size = 'large';
		} 
	}
	elseif ( $portfolio_i <= 3 ) {
		$classes = 'small-6 medium-6 columns folio_' . $portfolio_i;
		if ( !isset($portfolio_size) ){
			$portfolio_size = 'medium';
		}
	}
	else {
		$classes = 'small-6 medium-4 columns folio_' . $portfolio_i;
		if ( !isset($portfolio_size) ){
			$portfolio_size = 'medium';
		}
	}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
	<div class="portfolio_wrap">
	<a href="<?php the_permalink(); ?>" rel="bookmark">
		<?php if ( has_post_thumbnail() ) {
			if ( $portfolio_i === 1 ) {
				the_post_thumbnail( $portfolio_size );
			}
			else {
				the_post_thumbnail( $portfolio_size );
			} 
		} ?>
	</a>
	<h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	</div>
</article><!-- #post-## -->

