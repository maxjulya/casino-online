<?php get_header(); ?>

<!-- Title Box Start -->

<?php 
global $bonuses_archive_title;
if ( get_option( 'bonuses_section_name') ) {
	$bonuses_archive_title = get_option( 'bonuses_section_name', 'Bonuses' );
} else {
	$bonuses_archive_title = esc_html__( 'Bonuses', 'mercury' );
}
?>

<div class="space-archive-title-box box-100 relative">
	<div class="space-archive-title-box-ins space-page-wrapper relative">
		<div class="space-archive-title-box-h1 relative">
			<h1><?php esc_html_e( $bonuses_archive_title ); ?></h1>
			
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
		<div class="space-bonuses-archive-ins box-100 relative">

			<?php 
				if( get_theme_mod('mercury_category_navigation_bonuses') ) {
				$args = array(
					'hide_empty'=> 1,
					'type' => 'bonus',
					'orderby' => 'name',
					'taxonomy' => 'bonus-category',
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
								<a href="<?php echo esc_url( get_term_link($category->slug, 'bonus-category') ); ?>" title="<?php echo esc_attr($category->name); ?>"><?php echo esc_html($category->name); ?></a>
							</li>
							
							<?php
						}
					?>
				</ul>
			</div>
			<?php }
			} ?>

			<div class="space-bonuses-archive-items box-100 relative">

				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( '/aces/bonus-item-style-1' ); ?>

				<?php endwhile; ?>

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