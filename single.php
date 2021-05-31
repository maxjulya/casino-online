<?php get_header(); ?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		$post_style = get_post_meta( get_the_ID(), 'post_style', true );

		if ($post_style == 1) {
			get_template_part( '/theme-parts/single/style-1' ); }
		else if ($post_style == 2) {
			get_template_part( '/theme-parts/single/style-2' ); }
		else if ($post_style == 3) {
			get_template_part( '/theme-parts/single/style-3' ); }
		else if ($post_style == 4) {
			get_template_part( '/theme-parts/single/style-4' ); }
		else {
			get_template_part( '/theme-parts/single/style-1' ); }
	?>

</div>

<?php get_footer(); ?>