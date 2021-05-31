<?php
/****************************************************************
 * System Functions
 ****************************************************************/

/**
 * Load Theme Variable Data
 * @param string $var
 * @return string 
 */
function ale_theme_data_variable($var) {
	if (!is_file(STYLESHEETPATH . '/style.css')) {
		return '';
	}

	$theme_data = wp_get_theme();
	return $theme_data->{$var};
}

/****************************************************************
 * Define Constants
 ****************************************************************/
define('ALETHEME_MODE', 'test');
define('ALETHEME_THEME_VERSION', ale_theme_data_variable('Version'));
define('ALETHEME_PREFIX',			'ale_');
define('ALETHEME_THEME_PREFIX',		ALETHEME_PREFIX . get_template().'_');
define('ALETHEME_SHORTNAME', 'Gardener');
define("ALETHEME_THEME_OPTIONS_NAME", "gardener");
define("ALETHEME_THEME_URL", get_template_directory_uri());
define("ALETHEME_DEMOS_HOST", "http://alethemes.com/");


/****************************************************************
 * Find The Configuration File
 ****************************************************************/
require_once ALETHEME_PATH . '/config.php';

/****************************************************************
 * Options Framework Set Up
 ****************************************************************/
require_once ALETHEME_PATH . '/options/options.php';
require_once ALETHEME_PATH . '/options/admin/options-framework.php';

/****************************************************************
 * Require Needed Files & Libraries
 ****************************************************************/

require_once (ALETHEME_PATH. '/etc/admin.php');
require_once (ALETHEME_PATH. '/etc/demos.php');
require_once (ALETHEME_PATH. '/etc/front.php');
require_once (ALETHEME_PATH. '/etc/global.php');
require_once (ALETHEME_PATH. '/etc/media.php');
require_once (ALETHEME_PATH. '/etc/nav.php');
require_once (ALETHEME_PATH. '/etc/system.php');

require_once (ALETHEME_PATH. '/functions/customizer.php');
require_once (ALETHEME_PATH. '/functions/general.php');
require_once (ALETHEME_PATH. '/functions/images_media.php');
require_once (ALETHEME_PATH. '/functions/infinite-load.php');
require_once (ALETHEME_PATH. '/functions/service-popup.php');
require_once (ALETHEME_PATH. '/functions/social.php');
require_once (ALETHEME_PATH. '/functions/tgm.php');
require_once (ALETHEME_PATH. '/functions/woocommerce.php');

require_once (ALETHEME_PATH. '/widgets/widget-about.php');
require_once (ALETHEME_PATH. '/widgets/widget-blog.php');
require_once (ALETHEME_PATH. '/widgets/widget-mostcommented.php');
require_once (ALETHEME_PATH. '/widgets/widgets.php');

require_once (ALETHEME_PATH. '/metaboxes/gallery-meta.php');
require_once (ALETHEME_PATH. '/metaboxes/metaboxes.php');

require_once (ALETHEME_PATH. '/taxonomies/tax-meta-class.php');
require_once (ALETHEME_PATH. '/taxonomies/taxonomies-fields.php');
