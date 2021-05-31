<?php 

function mercury_import_files() {

  return array(
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 1', 'mercury' ),
      'categories'                   => array( 'Casino' ),
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/demo1/options.dat',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/demo1/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-data/demo1/widgets.wie',
      'import_preview_image_url'     => 'https://mercury.space-themes.com/screenshots/demo1.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://mercury.space-themes.com/demo1/',
    ),
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 2', 'mercury' ),
      'categories'                   => array( 'Casino' ),
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/demo2/options.dat',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/demo2/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-data/demo2/widgets.wie',
      'import_preview_image_url'     => 'https://mercury.space-themes.com/screenshots/demo2.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://mercury.space-themes.com/demo2/',
    ),
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 3', 'mercury' ),
      'categories'                   => array( 'Casino' ),
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/demo3/options.dat',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/demo3/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-data/demo3/widgets.wie',
      'import_preview_image_url'     => 'https://mercury.space-themes.com/screenshots/demo3.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://mercury.space-themes.com/demo3/',
    ),
    array(

      'import_file_name'             => esc_html__( 'Mercury Demo 4', 'mercury' ),
      'categories'                   => array( 'Sports Betting' ),
      'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-data/demo4/options.dat',
      'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-data/demo4/content.xml',
      'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-data/demo4/widgets.wie',
      'import_preview_image_url'     => 'https://mercury.space-themes.com/screenshots/demo4.png',
      'import_notice'                => esc_html__( 'Please waiting for a few minutes, do not close the window or refresh the page until the data is imported.', 'mercury' ),
      'preview_url'                  => 'https://mercury.space-themes.com/demo4/',
    ),
  );
}

add_filter( 'pt-ocdi/import_files', 'mercury_import_files' );

add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

function mercury_after_import_setup() {

  $front_page_id = get_page_by_title( 'Home' );

  update_option( 'show_on_front', 'page' );
  update_option( 'page_on_front', $front_page_id->ID );

	$main_menu   = get_term_by( 'name', 'Main Menu', 'nav_menu' );
  $footer_menu   = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
  $top_menu   = get_term_by( 'name', 'Top Menu', 'nav_menu' );

  set_theme_mod( 'nav_menu_locations', array(
    'main-menu'   => $main_menu->term_id,
    'footer-menu'   => $footer_menu->term_id,
    'top-menu'   => $top_menu->term_id
  ));

}

add_action( 'pt-ocdi/after_import', 'mercury_after_import_setup' );