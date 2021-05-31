<?php get_header(); ?>

<!-- Title Box Start -->

<div class="space-archive-title-box box-100 relative">
	<div class="space-archive-title-box-ins space-page-wrapper relative">
		<div class="space-archive-title-box-h1 relative">
			<h1><?php echo esc_html(get_queried_object()->name); ?></h1>
			
			<!-- Breadcrumbs Start -->

			<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

			<!-- Breadcrumbs End -->
		</div>
	</div>
</div>

<!-- Title Box End -->

<!-- Archive Section Start -->

<div class="space-archive-section box-100 relative space-casino-archive">
	<div class="space-archive-section-ins space-page-wrapper relative">
		<div class="space-casino-archive-ins box-100 relative">
			
			<div class="space-companies-archive-items box-100 relative">

				<?php

				$term_id = get_queried_object()->term_id;
				$casinos_archive_style = get_theme_mod('mercury_casino_archive_style');

				if ($casinos_archive_style == 4) {
					$paged = $wp_query->get( 'paged' );
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$wp_query = new WP_Query(array(
						'post_type' => 'casino',
						'paged' => $paged,
						'meta_key' => 'casino_overall_rating',
						'orderby'  => 'meta_value_num',
						'order'    => 'DESC',
						'tax_query' => array(
							array(
								'taxonomy' => 'language',
								'field'    => 'id',
								'terms'    => $term_id
							)
						)
					));
				}

				if ( have_posts() ) : while ( have_posts() ) : the_post();

					if ($casinos_archive_style == 2) {
						get_template_part( '/aces/casino-item-style-2' );
					} elseif ($casinos_archive_style == 3) {
						get_template_part( '/aces/casino-item-style-3' );
					} elseif ($casinos_archive_style == 4) {
						get_template_part( '/aces/casino-item-style-4' );
					} elseif ($casinos_archive_style == 5) {
						get_template_part( '/aces/casino-item-style-5' );
					} else {
						get_template_part( '/aces/casino-item-style-1' );
					}

				endwhile; ?>

				<!-- Archive Navigation Start -->

				<?php
					the_posts_pagination( array(
						'end_size' => 2,
						'prev_text'    => esc_html__('&laquo;', 'mercury'),
						'next_text'    => esc_html__('&raquo;', 'mercury'),
					));
				?>

				<!-- Archive Navigation End -->

				<?php else : ?>

				<!-- Posts not found Start -->

				<div class="space-page-content-wrap relative">
					<div class="space-page-content page-template box-100 relative">
						<h2><?php esc_html_e( 'Posts not found', 'mercury' ); ?></h2>
						<p>
							<?php esc_html_e( 'No posts has been found. Please return to the homepage.', 'mercury' ); ?>
						</p>
					</div>
				</div>

				<!-- Posts not found End -->

				<?php endif; ?>

			</div>
			<div class="space-taxonomy-description box-100 relative">

				<?php if( !is_paged() ) { 
					if (term_description()) { ?>
					<div class="space-page-content case-15 relative">
						<?php echo term_description(); ?>
					</div>
				<?php }
				} ?>

			</div>
		</div>
	</div>
</div>

<!-- Archive Section End -->

<?php get_footer(); ?>