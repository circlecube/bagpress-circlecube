<div class="module module--billboard">
	<div class="row">
		<section class="small-12 columns">
			<h1 class="billboard_headline"><?php the_sub_field('headline'); ?></h1>
			<h2 class="billboard_subheadline"><?php the_sub_field('subheadline'); ?></h2>
			<?php 
				if ( have_rows('ctas') ) {
					while ( have_rows('ctas') ) {
						the_row();
						// $cta = get_sub_field('cta');
						// print_r($cta);
						get_template_part( 'template-parts/module', 'cta' );
					}
				}
			?>
		</section>
	</div>
</div>