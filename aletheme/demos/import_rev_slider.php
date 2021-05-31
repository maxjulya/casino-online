<?php

WP_Filesystem();
global $wp_filesystem;

$absolute_path = __FILE__;
$path_to_file = explode( 'wp-content', $absolute_path );
$path_to_wp = $path_to_file[0];

require_once( $path_to_wp.'/wp-includes/functions.php');
require_once( $path_to_wp.'/wp-admin/includes/file.php');

//Create a temp zip file and put content from the server
$file = "TempSlider.zip";
$test = $wp_filesystem->put_contents($file, $wp_filesystem->get_contents($slider_url));

//Create Slider Object
$slider = new RevSlider();

//Import the zip file
$slider->importSliderFromPost(true,true,$file);


