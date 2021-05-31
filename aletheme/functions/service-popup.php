<?php

/**
 * Javascript for Load More
 *
 */
function ale_service_popup_js() {

	global $wp_query;
	$args = array(
		'nonce'       => wp_create_nonce( 'ale-service-popup-nonce' ),
		'url'         => admin_url( 'admin-ajax.php' ),
	);
	wp_enqueue_script( 'ale-service_popup',
		get_stylesheet_directory_uri() . '/js/libs/service-popup.js',
		array( 'jquery' ),
		'1.0',
		true );
	wp_localize_script( 'ale-service_popup', 'aleservicepopup', $args );

}

add_action( 'wp_enqueue_scripts', 'ale_service_popup_js' );

/**
 * AJAX Load More
 *
 */
function ale_ajax_service_popup() {
	check_ajax_referer( 'ale-service-popup-nonce', 'nonce' );

	$post_id = $_POST['post'];

	$current_post = get_post( $post_id );

	ob_start(); ?>

	<div class="service_content_popup">
		<div class="top_line">
			<h2 class="title"><?php echo esc_attr($current_post->post_title); ?></h2>
			<div class="buttons">
				<a href="#" class="order_button"><?php echo esc_html_e('Order','gardener'); ?></a>
				<?php if(ale_get_meta('service_subtitle', true, $post_id)){ ?>
					<span class="subtitle font_two">
						<?php echo esc_attr(ale_get_meta('service_subtitle', true, $post_id)); ?>
					</span>
				<?php } ?>
			</div>
			<?php if(ale_get_meta('service_bigicon_hover', true, $post_id)){ ?>
				<div class="icon_box">
					<img src="<?php echo esc_url(ale_get_meta('service_bigicon_hover', true, $post_id)); ?>" alt="" />
				</div>
			<?php } ?>
		</div>
		<div class="content_line">
			<?php if(ale_get_meta('service_description_image', true, $post_id)){ ?>
				<div class="image_top">
					<img src="<?php echo esc_url(ale_get_meta('service_description_image', true, $post_id)); ?>" alt="" />
				</div>
			<?php } ?>
			<div class="service_content">
				<?php echo apply_filters( 'the_content',$current_post->post_content); ?>
			</div>

		</div>
		<div class="latest_projects">
			<div class="top_projects_line">
				<h3 class="box_title">
					<?php echo esc_html_e('Latest projects','gardener'); ?>
				</h3>
				<div class="line"> </div>
				<div class="all_projects_link">
					<a href="<?php echo home_url("/services"); ?>" class="font_two" target="_blank"><?php echo esc_html_e('All Projects','gardener'); ?> <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<div class="service_projects_list">
				<?php
				$args = array(
					'post_type' => 'projects',
					'posts_per_page' => 3
				);

				$projects = new WP_Query($args);

				if ($projects->have_posts()) : while ( $projects->have_posts()) : $projects->the_post();?>

					<div class="project_item">
						<span class="project_date"><?php echo get_the_date(); ?></span>
						<a href="<?php esc_url(the_permalink()); ?>" class="project_title_link font_two"><?php the_title(); ?></a>
					</div>

				<?php endwhile; endif; wp_reset_query(); ?>
			</div>

		</div>
	</div>

	<?php
	$data = ob_get_clean();
	wp_send_json_success( $data );
	wp_die();
}

add_action( 'wp_ajax_ale_ajax_service_popup', 'ale_ajax_service_popup' );
add_action( 'wp_ajax_nopriv_ale_ajax_service_popup', 'ale_ajax_service_popup' );
