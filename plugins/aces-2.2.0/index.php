<?php

/*
Plugin Name: ACES [Mercury]
Plugin URI: https://space-themes.com/item/mercury/
Description: Additional plugin by Space-Themes.com for creation additional sections "Casinos", "Games" and "Bonuses".
Version: 2.2.0
Author: Space-Themes.com
Author URI: https://space-themes.com/
License: GNU General Public License v3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html
Text Domain: aces
*/

global $aces_options, $aces_plugin_dir, $aces_plugin_url;

$aces_plugin_dir = untrailingslashit( plugin_dir_path( __FILE__ ) );
$aces_plugin_url = untrailingslashit( plugin_dir_url( __FILE__ ) );

function aces_init() {
	load_plugin_textdomain( 'aces', false, plugin_basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_filter( 'init', 'aces_init' );

/*  ---  Settings  ---  */

include_once $aces_plugin_dir . '/settings/index.php';

/*  ---  Casinos  ---  */

include_once $aces_plugin_dir . '/casinos.php';

/*  ---  Games  ---  */

include_once $aces_plugin_dir . '/games.php';

/*  ---  Bonuses  ---  */

include_once $aces_plugin_dir . '/bonuses.php';

/*  ---  Geolocation  ---  */

include_once $aces_plugin_dir . '/functions/geolocation.php';

/*  Image Uploader Start  */

function aces_image_uploader() {
    global $typenow;
    if( $typenow == 'casino' || $typenow == 'game' || $typenow == 'bonus' ) {
        wp_enqueue_media();
        wp_register_script( 'aces-image-uploader', plugin_dir_url( __FILE__ ) . 'js/image-uploader.js', array( 'jquery' ), '2.2.0' );
        wp_enqueue_script( 'aces-image-uploader' );
    }
}
add_action( 'admin_enqueue_scripts', 'aces_image_uploader' );

/*  Image Uploader End  */

?>