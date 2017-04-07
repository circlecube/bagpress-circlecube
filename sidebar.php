<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package BagPress
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<div id="secondary" class="small-12 medium-4 columns widget-area widgets" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</div><!-- #secondary -->
