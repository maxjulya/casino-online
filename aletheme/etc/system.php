<?php

/**
 * Initialize Theme Support Features 
 */
function ale_init_theme_support() {
	if (function_exists('ale_get_images_sizes')) {
		foreach (ale_get_images_sizes() as $post_type => $sizes) {
			foreach ($sizes as $config) {
				ale_add_image_size($post_type, $config);
			}
		}
	}
}
add_action('init', 'ale_init_theme_support');

function ale_after_setup_theme() {
	// add editor style for admin editor
	add_editor_style();

	// add post thumbnails support
	add_theme_support('post-thumbnails');
	
	// add needed post formats to theme
	if (function_exists('ale_get_post_formats')) {
		add_theme_support('post-formats', ale_get_post_formats());
	}
}
add_action('after_setup_theme', 'ale_after_setup_theme');

/**
 * Initialize Theme Navigation 
 */
function ale_init_navigation() {
	if (function_exists('register_nav_menus')) {
		register_nav_menus(array(
			'header_menu'	=> esc_html__('Header Menu', 'gardener'),
            'mobile_menu'	=> esc_html__('Mobile Menu', 'gardener'),
		));
	}
}
add_action('init', 'ale_init_navigation');



/**
 * Add custom image size wrapper
 * @param string $post_type
 * @param array $config 
 */
function ale_add_image_size($post_type, $config) {
	add_image_size($config['name'], $config['width'], $config['height'], $config['crop']);
}



// THIS INCLUDES THE THUMBNAIL IN OUR RSS FEED
function ale_insert_feed_image($content) {
global $post;

if ( has_post_thumbnail( $post->ID ) ){
	$content = ' ' . get_the_post_thumbnail( $post->ID, 'medium' ) . " " . $content;
}
return $content;
}

add_filter('the_excerpt_rss', 'ale_insert_feed_image');
add_filter('the_content_rss', 'ale_insert_feed_image');