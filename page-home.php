<?php
/*
Template Name: Homepage (For Widgets)
*/
?>

<?php get_header(); ?>

<!-- Homepage Widgets Start -->

<div class="space-page-body home-page relative">

	<?php
		if ( is_active_sidebar( 'homepage-central-block' ) ) {
			dynamic_sidebar( 'homepage-central-block' );
		}
	?>

</div>

<!-- Homepage Widgets End -->

<!-- Archive Section Start -->

<?php if( get_theme_mod('mercury_enable_archive_section') ) { ?>

<div class="space-archive-section box-100 relative">
	<div class="space-archive-section-home-ins space-page-wrapper relative">
		<div class="space-content-section box-75 left relative">
			<div class="space-block-title relative">
				<span><?php esc_html_e( 'Latest News', 'mercury' ); ?></span>
			</div>
			<div class="space-archive-loop box-100 relative">

				<?php
					$args = array(
						'posts_per_page' => 10,
						'post_type' => 'post'
					);

					$postslist = get_posts( $args );
					foreach ($postslist as $post) : setup_postdata($post);
						get_template_part( '/theme-parts/archive/loop' );
					endforeach;
					wp_reset_postdata()
				?>

			</div>
		</div>
		<div class="space-sidebar-section box-25 left relative">

			<?php
				if ( is_active_sidebar( 'homepage-right-sidebar' ) ) {
					dynamic_sidebar( 'homepage-right-sidebar' );
				}
			?>

		</div>
	</div>
</div>

<?php } ?>

<!-- Archive Section End -->

<?php get_footer(); ?>