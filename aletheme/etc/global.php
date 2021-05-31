<?php
class ale_global {

    //generate unique_ids
    private static $ale_unique_counter = 0;

    static function ale_generate_unique_id() {
        self::$ale_unique_counter++;
        return 'ale_uid_' . self::$ale_unique_counter . '_' . uniqid();
    }

    // Demo and plugins list
    public static $demo_list = array ();
    public static $plugins_list = array();

    static $ale_options;
}

//Demos Base
ale_global::$demo_list = array (
    'gardener' => array(
        'text' => 'Gardener Default',
        'folder' => get_template_directory() . '/aletheme/demos/gardener/',
        'demo_url' => ALETHEME_DEMOS_HOST .'gardener/',
        'category' => array('all','micro-niche'),
        'date-create' => '2017-08-22',
        'demo_preview' => get_template_directory_uri()."/screenshot.png",
        'required_plugins' => array('ale-shortcodes','cpt-gardener','api-key-for-google-maps')
    ),

);

ale_global::$plugins_list = array(

    'cpt-gardener' => array(
        'name'=>'Gardener Core',
        'location'=>'bundled',
        'slug'=>'cpt-gardener',
        'source' => ALETHEME_THEME_URL . '/plugins/cpt-gardener.zip'
    ),
    'ale-shortcodes' => array(
        'name'=>'Aletheme Shortcodes',
        'location'=>'bundled',
        'slug'=>'ale-shortcodes',
        'source' => ALETHEME_THEME_URL . '/plugins/ale-shortcodes.zip'
    ),
    'api-key-for-google-maps' => array(
        'name'=>'API KEY for Google Maps',
        'location'=>'wp_repo',
        'slug'=>'api-key-for-google-maps',

    ),
);