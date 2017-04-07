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
	$this_postid = $post->ID;
	$images = get_field('images');
?>
<div class="row">
<article id="post-<?php the_ID(); ?>" <?php post_class('small-12 medium-8 columns'); ?>>
	<header class="entry-header small-12 columns">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php //bagpress_posted_on(); ?>
			<?php if( $images ) { ?>
			    <ul class="portfolio_images row clearing-thumbs clearing-feature" data-clearing>
			        <?php
			        $images_i = 0; 
			        	foreach( $images as $image ) { 
			        	$images_i++;	
			        ?>
			        <?php if ($images_i <= 1) { ?>
			            <li class="portfolio_image small-12 columns clearing-featured-img">
			                <a href="<?php echo $image['url']; ?>">
			                	<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
		            	    </a>
		            	</li>
		            	
		            <?php } else { ?>
			            <li class="portfolio_image">
			                <a href="<?php echo $image['url']; ?>">
				                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
			                </a>
			            </li>
		            <?php } ?>
			        <?php } //endforeach; ?>
			    </ul>
			<?php } //endif; ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content small-12 medium-6 columns">
		<?php the_content(); ?>
		
		<?php if ( get_field('url') ) { ?>
			<p>View online <a href="<?php the_field('url'); ?>" target="_blank"><?php the_field('url'); ?></a></p>
		<?php } ?>
	</div><!-- .entry-content -->
		
		<div class="entry-content entry-tax small-12 medium-6 columns">
			<span class="kind-links">This is a(n) <?php the_terms( $post->ID, 'kind', '', ', ', '' ); ?> project. </span>
			<span class="tech-links">Created using the following technologies: <?php the_terms( $post->ID, 'technology', '', ', ', '' ); ?>. </span>
			<!-- <span class="agency-links">With/at: <?php the_terms( $post->ID, 'agency', '', ', ', '' ); ?>. </span> -->
			<!-- <span class="client-links">For <?php the_terms( $post->ID, 'client', '', ', ', '' ); ?>. </span> -->
			<!-- <span class="award-links"><?php the_terms( $post->ID, 'award', '', ', ', '' ); ?></span> -->
			
		</div>

	<footer class="entry-footer small-12 columns">
		<?php bagpress_entry_footer(); ?>
	</footer><!-- .entry-footer -->
	
	
	<?php the_post_navigation(); ?>

	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		// if ( comments_open() || get_comments_number() ) :
		// 	comments_template();
		// endif;
	?>
</article><!-- #post-## -->
<aside class="small-12 medium-4 columns">
	<?php if( $images ) { ?>
	    <ul class="portfolio_images row clearing-thumbs" data-clearing>
	        <?php
	        $images_i = 0; 
	        	foreach( $images as $image ) { 
	        	$images_i++;	
	        ?>
	        <?php if ($images_i <= 1) { ?>
	            <li class="portfolio_image hide">
	                <a href="<?php echo $image['url']; ?>">
	                	<img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
            	    </a>
            	</li>
            	
            <?php } elseif ($images_i <= 3) { ?>
	            <li class="portfolio_image small-6 medium-12 columns">
	                <a href="<?php echo $image['url']; ?>">
	                	<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
            	    </a>
            	</li>
            	
            <?php } else { ?>
	            <li class="portfolio_image small-6 medium-6 columns">
	                <a href="<?php echo $image['url']; ?>">
		                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
	                </a>
	            </li>
            <?php } ?>
	        <?php } //endforeach; ?>
	    </ul>
	<?php } //endif; ?>
</aside>
</div>

</main>
</div>
</div>
</div>
<div class="portfolio_more portfolios">
	<div class="row">
	<h3>More Portfolio</h3>
		<?php
			$mp_args = array(	'post_type' => array('portfolio'),
								'posts_per_page' => 7 );
			
			$mp_query = new WP_Query( $mp_args );	
			
	            if ( $mp_query->have_posts() ) {
	            	$count = 0;
	            
	            	while ( $mp_query->have_posts() ) {
	            		
	            		$mp_query->the_post(); 
	            		$count++;
	            		$portfolio_i = 10;
	            		
	            		if ($post->ID != $this_postid && $count <= 6){
	                        
	                        include( locate_template( 'template-parts/content-portfolio.php' ) );
	                        
						}
						else{ 
							$count--; 
						}
	            
	            } // endwhile; ?>


			<?php } //endif; ?>
	</div>
</div>
<div class="row_wrap">
	<div class="row">
		<div class="content-area">
			<main class="site-main">
