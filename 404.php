<?php get_header(); ?>

<!-- Title Box Start -->

<div class="space-title-box box-100 relative">
	<div class="space-title-box-ins space-page-wrapper relative">
		<div class="space-title-box-h1 relative">
			<h1><?php esc_html_e( 'Error 404', 'mercury' ); ?></h1>
			
			<!-- Breadcrumbs Start -->

			<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

			<!-- Breadcrumbs End -->
		</div>
	</div>
</div>

<!-- Title Box End -->

<!-- Page Section Start -->

<div class="space-page-section box-100 relative">
	<div class="space-page-section-ins space-page-wrapper relative">
		<div class="space-content-section box-75 left relative">
			<div class="space-page-content-wrap relative">
				<div class="space-page-content page-template box-100 relative">
					<h2><?php esc_html_e( 'Page not Found', 'mercury' ); ?></h2>
					<p><?php esc_html_e( 'Nothing found.', 'mercury' ); ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php esc_html_e( 'Go back to home page', 'mercury' ); ?></a>.</p>
				</div>
			</div>
		</div>
		<div class="space-sidebar-section box-25 right relative">

			<?php get_sidebar(); ?>

		</div>
	</div>
</div>

<!-- Page Section End -->

<?php get_footer(); ?>