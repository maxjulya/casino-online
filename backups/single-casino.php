<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$casino_style = get_post_meta( get_the_ID(), 'casino_style', true );

		if ($casino_style == 1) {
			get_template_part( '/aces/single-casino/style-1' );
		} else if ($casino_style == 2) {
			get_template_part( '/aces/single-casino/style-2' );
		} else if ($casino_style == 3) {
			get_template_part( '/aces/single-casino/style-1-without-sidebar' );
		} else if ($casino_style == 4) {
			get_template_part( '/aces/single-casino/style-2-without-sidebar' );
		} else {
			get_template_part( '/aces/single-casino/style-1' );
		}
	?>

</div>

<?php get_footer(); ?>