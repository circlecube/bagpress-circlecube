<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package BagPress
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="modules">
	<?php
		the_content();

		if ( have_rows('modules') ) {
			while( have_rows('modules') ){
				the_row();
				//load the template for the corresponding module
				//the file must be called module_{{module_name_from_acf}}
				get_template_part( 'template-parts/module', get_row_layout() );
			}	
		} 
	?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( esc_html__( 'Edit', 'bagpress' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->