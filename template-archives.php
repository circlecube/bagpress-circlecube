<?php
/**
 * Template Name: Archives Page
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package BagPress
 */

get_header();

function posts_by_year() {
  // array to use for results
  $years = array();

  // get posts from WP
  $posts = get_posts(array(
    'numberposts' => -1,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'post_type' => 'post',
    'post_status' => 'publish'
  ));

  // loop through posts, populating $years arrays
  foreach($posts as $post) {
    $years[date('Y', strtotime($post->post_date))][] = $post;
  }

  // reverse sort by year
  krsort($years);

  return $years;
}

?>

	<div id="primary" class="small-12 columns content-area">
		<main id="main" class="site-main" role="main">
				
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
				
				<?php /*
							Custom Billboard Module
					*/
							$module_i = 0;
				?>

		<div class="page-content">
			<div class="row row-max">
				
				<div class="small-12 medium-8 medium-push-2 columns">
					<?php //get_search_form(); ?>
					
					<div class="widget">
						<h2 class="widgettitle">Blog Posts</h2>

						<?php foreach(posts_by_year() as $year => $posts) : ?>
						  <h3><?php echo $year; ?></h3>

						  <ul>
						    <?php foreach($posts as $post) : setup_postdata($post); ?>
						      <li>
						        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						      </li>
						    <?php endforeach; ?>
						  </ul>
						<?php endforeach; ?>
					</div>

					<div class="widget widget_categories">
						<h2 class="widgettitle">Categories</h2>
						<ul>
						<?php
							wp_list_categories( array(
								'orderby'    => 'count',
								'order'      => 'DESC',
								'show_count' => 1,
								'title_li'   => '',
								'number'     => 10,
							) );
						?>
						</ul>
					</div><!-- .widget -->
					
					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>
					
					<br>
					<br>
					</div>
					
				</div><!-- .page-content -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>