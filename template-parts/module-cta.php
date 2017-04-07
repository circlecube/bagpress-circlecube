<?php // print_r($cta);
	
	$cta = get_sub_field('cta');
	
	$cta_href = $cta['button_link'];
	$cta_text = $cta['button_text'];
	
	$cta_classes = 'button ';
	if ( $cta['size'] != 'default' ) {
		$cta_classes .= $cta['size'] . ' ';
	}
	if ( $cta['style'] != 'default' ) {
		$cta_classes .= $cta['style'] . ' ';
	}
	if ( $cta['color'] != 'default' ) {
		$cta_classes .= $cta['color'] . ' ';
	}
	
	if ( $cta['button_url'] ) {
		$cta_href = $cta['button_url'];
	}
	
	if( $cta_text ) { ?>
		<a class="<?php echo $cta_classes; ?> cta " href="<?php echo $cta_href; ?>">
		<?php echo $cta_text; ?></a>
	<?php } ?>