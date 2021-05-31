<?php get_header(); ?>

<!-- Title Box Start -->

<?php 
global $casino_archive_title;
if ( get_option( 'casinos_section_name') ) {
	$casino_archive_title = get_option( 'casinos_section_name', 'Casinos' );
} else {
	$casino_archive_title = esc_html__( 'Casinos', 'mercury' );
}
?>

<div class="space-archive-title-box box-100 relative">
	<div class="space-archive-title-box-ins space-page-wrapper relative">
		<div class="space-archive-title-box-h1 relative">
			<h1><?php esc_html_e( $casino_archive_title ); ?></h1>
			
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

			<?php
				if( get_theme_mod('mercury_category_navigation_casinos') ) {
				$args = array(
					'hide_empty'=> 1,
					'type' => 'casino',
					'orderby' => 'name',
					'taxonomy' => 'casino-category',
					'order' => 'ASC'
				);
				$categories = get_categories($args);

				if( $categories ){
			 ?>
			<div class="space-categories-list-box relative">
				<ul class="space-categories-title">
					<li class="active">  
						<?php esc_html_e( 'All', 'mercury' ); ?>
					</li>
					<?php
						$current_tax = get_queried_object();

						foreach($categories as $category) { ?>

							<li>  
								<a href="<?php echo esc_url( get_term_link($category->slug, 'casino-category') ); ?>" title="<?php echo esc_attr($category->name); ?>"><?php echo esc_html($category->name); ?></a>
							</li>
							
							<?php
						}
					?>
				</ul>
			</div>
			<?php }
			} ?>

			<div class="space-companies-archive-items box-100 relative">

				<?php

				$casinos_archive_style = get_theme_mod('mercury_casino_archive_style');
				
				if ($casinos_archive_style == 4) {
					$paged = $wp_query->get( 'paged' );
					$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
					$wp_query = new WP_Query(array(
						'post_type' => 'casino',
						'paged' => $paged,
						'meta_key' => 'casino_overall_rating',
						'orderby'  => 'meta_value_num',
						'order'    => 'DESC'
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
		</div>
	</div>
</div>

<!-- Archive Section End -->

<?php get_footer(); ?>