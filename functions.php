<?php
/**
 * onlinecasino functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package onlinecasino
 */

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

if (!function_exists('onlinecasino_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function onlinecasino_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on onlinecasino, use a find and replace
         * to change 'onlinecasino' to the name of your theme in all the template files.
         */
        load_theme_textdomain('onlinecasino', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(
            array(
                'menu-1' => esc_html__('Primary', 'onlinecasino'),
                'menu-footer' => esc_html__('Footer', 'onlinecasino'),
                'menu-footer-second' => esc_html__('Footer Second', 'onlinecasino'),

            )
        );

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
            )
        );

        // Set up the WordPress core custom background feature.
        add_theme_support(
            'custom-background',
            apply_filters(
                'onlinecasino_custom_background_args',
                array(
                    'default-color' => 'ffffff',
                    'default-image' => '',
                )
            )
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support(
            'custom-logo',
            array(
                'height' => 250,
                'width' => 250,
                'flex-width' => true,
                'flex-height' => true,
            )
        );

        // Crop Images

        add_image_size('casino_item_home', 350, 149, true);
        add_image_size('casino_item_image', 256, 213, true);
        add_image_size('casino_list_item', 256, 213, true);
        add_image_size('casino_list_thumb', 270, 240, true);
        add_image_size('casino_list_height', 210, 155, true);

        add_image_size('casino_item_single', 257, 180, true);
        add_image_size('casino_item_home_big', 832, 328, true);
        add_image_size('partners_img', 128, 64, true);
        add_image_size('game_img_big', 840, 424, true);
        add_image_size('game_img_small', 543, 274, true);

        add_image_size('blog_image', 832, 304, true);
        add_image_size('blog_image_single', 1696, 464, true);
        add_image_size('blog_image_single_related', 832, 304, true);
        //add_image_size('blog_image_single_related', 340, 200, true);
    }
endif;
add_action('after_setup_theme', 'onlinecasino_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onlinecasino_content_width()
{
    $GLOBALS['content_width'] = apply_filters('onlinecasino_content_width', 640);
}

add_action('after_setup_theme', 'onlinecasino_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onlinecasino_widgets_init()
{
    register_sidebar(
        array(
            'name' => esc_html__('Sidebar', 'onlinecasino'),
            'id' => 'sidebar-1',
            'description' => esc_html__('Add widgets here.', 'onlinecasino'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Сайдбар для новостей', 'onlinecasino'),
            'id' => 'sidebar-news',
            'description' => esc_html__('Add widgets here.', 'onlinecasino'),
            'before_widget' => '<aside class="article_page_sidebar">
                <div class="view_section"><section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section></div></aside>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => esc_html__('Сайдбар для страницы казино', 'onlinecasino'),
            'id' => 'sidebar-casino',
            'description' => esc_html__('Add widgets here.', 'onlinecasino'),
            'before_widget' => '        <aside class="casino_page_sidebar">
            <div class="view_section"><section id="%1$s" class="widget %2$s">',
            'after_widget' => '</section></div></aside>',
            'before_title' => '<div class="view_section_title">',
            'after_title' => '</div>',
        )
    );
}

add_action('widgets_init', 'onlinecasino_widgets_init');


add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-formats',
	array(
		'image',
		'video',
		'gallery',
	)
);

function mercury_comments_reply() {
	if( get_option( 'thread_comments' ) )  {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'comment_form_before', 'mercury_comments_reply' );

function mercury_remove_caption_extra_width($width) {
   return $width - 10;
}
add_filter('img_caption_shortcode_width', 'mercury_remove_caption_extra_width');

/*  Content Width Start  */

function mercury_content_width() {

	$content_width = 994;
	$GLOBALS['content_width'] = apply_filters( 'mercury_content_width', $content_width );
}
add_action( 'after_setup_theme', 'mercury_content_width', 0 );

/*  Content Width End  */

/*  Pingback Start  */

function mercury_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'mercury_pingback_header' );

/*  Pingback End  */

/*  Navigation Markup Template Start  */

add_filter('navigation_markup_template', 'mercury_navigation_template', 10, 2 );
			function mercury_navigation_template( $template, $class ){
			return '
			<div class="space-archive-navigation box-100 relative">
				<nav class="navigation %1$s">
					<div class="nav-links">%3$s</div>
				</nav>
			</div>
			';
}

/*  Navigation Markup Template End  */

/*  Menus, Languages and Thumbnails Start  */

function mercury_setup() {
	
	load_theme_textdomain( 'mercury', get_template_directory() . '/languages' );
	
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'mercury-custom-logo', 9999, 40);
	add_image_size( 'mercury-50-50', 50, 50, true );
	add_image_size( 'mercury-100-100', 100, 100, true );
	add_image_size( 'mercury-120-120', 120, 120, true );
	add_image_size( 'mercury-135-135', 135, 135, true );
	add_image_size( 'mercury-340-447', 340, 447, true );
	add_image_size( 'mercury-450-254', 450, 254, true );
	add_image_size( 'mercury-450-317', 450, 317, true );
	add_image_size( 'mercury-450-450', 450, 450, true );
	add_image_size( 'mercury-570-430', 570, 430, true );
	add_image_size( 'mercury-737-556', 737, 556, true );
	add_image_size( 'mercury-270-430', 270, 430, true );
	add_image_size( 'mercury-450-717', 450, 717, true );
	add_image_size( 'mercury-737-983', 737, 983, true );
	add_image_size( 'mercury-450-600', 450, 600, true );
	add_image_size( 'mercury-1920-375', 1920, 375, true );
	add_image_size( 'mercury-450-338', 450, 338, true );
	add_image_size( 'mercury-768-576', 768, 576, true );
	add_image_size( 'mercury-900-675', 900, 675, true );
	add_image_size( 'mercury-994-559', 994, 559, true );
	add_image_size( 'mercury-585-505', 585, 505, true );
	add_image_size( 'mercury-1170-505', 1170, 505, true );
	add_image_size( 'mercury-9999-32', 9999, 32);
	add_image_size( 'mercury-9999-80', 9999, 80);
	add_image_size( 'mercury-9999-135', 9999, 135);
	
	add_theme_support( 'gutenberg', array( 'wide-images' => true ));
	
//	register_nav_menus( array(
//		'main-menu'   => esc_html__( 'Main Menu', 'mercury' ),
//		'footer-menu' => esc_html__( 'Footer Menu', 'mercury' ),
//		'top-menu' => esc_html__( 'Top Menu', 'mercury' ),
//	) );
	
}
add_action( 'after_setup_theme', 'mercury_setup' );

/*  Menus, Languages and Thumbnails End  */

/*  Widgets Setup Start  */

function mercury_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mercury' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Add widgets here so that it appears on the sidebar.', 'mercury' ),
		'before_widget' => '<div id="%1$s" class="space-widget space-default-widget relative %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative"><span>',
		'after_title'   => '</span></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Central Block', 'mercury' ),
		'id'            => 'homepage-central-block',
		'description'   => esc_html__( 'For widgets in the homepage central block.', 'mercury' ),
		'before_widget' => '<div id="%1$s" class="space-widget relative %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative"><span>',
		'after_title'   => '</span></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Homepage Right Sidebar', 'mercury' ),
		'id'            => 'homepage-right-sidebar',
		'description'   => esc_html__( 'Add widgets here so that it appears on the homepage right sidebar.', 'mercury' ),
		'before_widget' => '<div id="%1$s" class="space-widget relative %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="space-widget-title relative"><span>',
		'after_title'   => '</span></div>',
	) );

}
add_action( 'widgets_init', 'mercury_widgets_init' );

/*  Widgets Setup End  */

/*  Mobile Browser Bar Color Start  */

function mercury_header_bar_color() {
?>
<meta name="theme-color" content="#222222" />
<meta name="msapplication-navbutton-color" content="#222222" /> 
<meta name="apple-mobile-web-app-status-bar-style" content="#222222" />
<?php }

add_action('wp_head', 'mercury_header_bar_color');

/*  Mobile Browser Bar Color End  */

/*  Register Fonts Start  */

function mercury_google_fonts() {
    $font_url = '';

    if ( 'off' !== _x( 'on', 'Google font: on or off', 'mercury' ) ) {
        $font_url = add_query_arg( 'family', urlencode( 'Roboto:300,400,700,900' ), "//fonts.googleapis.com/css" );
    }

    return $font_url;
}

function mercury_fonts() {
    wp_enqueue_style( 'mercury-fonts', mercury_google_fonts(), array(), '3.3.1' );

}
add_action( 'wp_enqueue_scripts', 'mercury_fonts' );

/*  Register Fonts End  */


/*  Register Scripts & Colors Start  */

function mercury_scripts() {


	
	if( get_theme_mod('mercury_sticky_sidebar') ) {
		wp_enqueue_script( 'theia-sticky-sidebar', get_theme_file_uri( '/js/theia-sticky-sidebar.min.js' ), array( 'jquery' ), '1.7.0', true );
		wp_enqueue_script( 'mercury-enable-sticky-sidebar-js', get_theme_file_uri( '/js/enable-sticky-sidebar.js' ), array( 'jquery' ), '3.3.1', true );
	}

	if( !get_theme_mod('mercury_disable_floating_header') ) {
		wp_enqueue_script( 'mercury-floating-header', get_theme_file_uri( '/js/floating-header.js' ), array( 'jquery' ), '3.3.1', true );
	}

	wp_enqueue_script( 'owl-carousel', get_theme_file_uri( '/js/owl.carousel.min.js' ), array( 'jquery' ), '2.3.4', true );

    wp_enqueue_script('onlinecasino-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/js/libs/jquery.flexslider-min.js', array(), '20151215', true);
    //wp_enqueue_script( 'ajax-loadmore', get_template_directory_uri() . '/js/libs/ajaxLoadMore.js', array(), '1.0', true );
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/libs/slick.min.js', array(), '1.0', true);
    wp_enqueue_script( 'nouislider', get_template_directory_uri() . '/js/libs/noUiSlider.min.js', array(), '1.0', true);

    wp_enqueue_script('onlinecasino-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0', true);


    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    //localize script
    wp_enqueue_script( 'my-script', get_template_directory_uri() . '/js/example.js' );
    $translation_array = array( 'templateUrl' => get_template_directory_uri() );
    wp_localize_script( 'my-script', 'themename', $translation_array );


	wp_enqueue_script( 'mercury-global-js', get_theme_file_uri( '/js/scripts_mercury.js' ), array( 'jquery' ), '3.3.1', true );


    wp_enqueue_style('onlinecasino-main', get_template_directory_uri() . '/layouts/main.css', array(), '1.0', false);
    wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2' );


	wp_enqueue_style( 'font-awesome-free', '//use.fontawesome.com/releases/v5.8.2/css/all.css', array(), '5.8.2' );
	wp_enqueue_style( 'owl-carousel', get_theme_file_uri( '/css/owl.carousel.min.css' ), array(), '2.3.4');
	wp_enqueue_style( 'owl-carousel-animate', get_theme_file_uri( '/css/animate.css' ), array(), '2.3.4');
	wp_enqueue_style( 'mercury-style', get_stylesheet_uri(), array(), '3.3.1');
	wp_enqueue_style( 'mercury-media', get_theme_file_uri( '/css/media.css' ), array(), '3.3.1');
	
	global $mercury_data; 
			
	// Custom Colors
			
	if( !$main_custom_color = get_theme_mod( 'main_color' ) ) {
		$main_custom_color = '#be2edd';
	} else {
		$main_custom_color = get_theme_mod( 'main_color' );
	}

	if( !$second_custom_color = get_theme_mod( 'second_color' ) ) {
		$second_custom_color = '#ff2453';
	} else {
		$second_custom_color = get_theme_mod( 'second_color' );
	}

	if( !$stars_custom_color = get_theme_mod( 'stars_color' ) ) {
		$stars_custom_color = '#ffd32a';
	} else {
		$stars_custom_color = get_theme_mod( 'stars_color' );
	}
			
$custom_css = '

/* Main Color */

.has-mercury-main-color,
.home-page .textwidget a:hover,
.space-header-2-top-soc a:hover,
.space-header-menu ul.main-menu li a:hover,
.space-header-menu ul.main-menu li:hover a,
.space-header-2-nav ul.main-menu li a:hover,
.space-header-2-nav ul.main-menu li:hover a,
.space-page-content a:hover,
.space-pros-cons ul li a:hover,
.space-pros-cons ol li a:hover,
.space-comments-form-box p.comment-notes span.required,
form.comment-form p.comment-notes span.required {
	color: ' . esc_attr ($main_custom_color) . ';
}

input[type="submit"],
.has-mercury-main-background-color,
.space-block-title span:after,
.space-widget-title span:after,
.space-companies-archive-item-button a,
.space-companies-sidebar-item-button a,
.space-casinos-3-archive-item-count,
.space-games-archive-item-button a,
.space-games-sidebar-item-button a,
.space-aces-single-bonus-info-button-ins a,
.space-bonuses-archive-item-button a,
.home-page .widget_mc4wp_form_widget .space-widget-title::after,
.space-content-section .widget_mc4wp_form_widget .space-widget-title::after {
	background-color: ' . esc_attr ($main_custom_color) . ';
}

.space-header-menu ul.main-menu li a:hover,
.space-header-menu ul.main-menu li:hover a,
.space-header-2-nav ul.main-menu li a:hover,
.space-header-2-nav ul.main-menu li:hover a {
	border-bottom: 2px solid ' . esc_attr ($main_custom_color) . ';
}
.space-header-2-top-soc a:hover {
	border: 1px solid ' . esc_attr ($main_custom_color) . ';
}

/* Second Color */

.has-mercury-second-color,
.space-page-content a,
.space-pros-cons ul li a,
.space-pros-cons ol li a,
.space-page-content ul li:before,
.home-page .textwidget ul li:before,
.space-widget ul li a:hover,
.home-page .textwidget a,
#recentcomments li a:hover,
#recentcomments li span.comment-author-link a:hover,
h3.comment-reply-title small a,
.space-companies-sidebar-2-item-desc a,
.space-companies-sidebar-item-title p a,
.space-companies-archive-item-short-desc a,
.space-companies-2-archive-item-desc a,
.space-casinos-3-archive-item-terms-ins a,
.space-casino-content-info a,
.space-casino-style-2-calltoaction-text-ins a,
.space-casino-details-item-title span,
.space-casino-style-2-ratings-all-item-value i,
.space-casino-style-2-calltoaction-text-ins a,
.space-casino-content-short-desc a,
.space-casino-header-short-desc a,
.space-casino-content-rating-stars i,
.space-casino-content-rating-overall .star-rating .star,
.space-companies-archive-item-rating .star-rating .star,
.space-casino-content-logo-stars i,
.space-casino-content-logo-stars .star-rating .star,
.space-companies-2-archive-item-rating .star-rating .star,
.space-casinos-3-archive-item-rating-box .star-rating .star,
.space-casinos-4-archive-item-title .star-rating .star,
.space-companies-sidebar-2-item-rating .star-rating .star,
.space-comments-list-item-date a.comment-reply-link,
.space-categories-list-box ul li a,
#scrolltop,
.widget_mc4wp_form_widget .mc4wp-response a,
.space-header-height.dark .space-header-menu ul.main-menu li a:hover,
.space-header-height.dark .space-header-menu ul.main-menu li:hover a,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li a:hover,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li:hover a,
.space-header-2-height.dark .space-header-2-top-soc a:hover,
.space-casino-header-logo-rating i {
	color: ' . esc_attr ($second_custom_color) . ';
}

.space-title-box-category a,
.has-mercury-second-background-color,
.space-casino-details-item-links a:hover,
.space-news-2-small-item-img-category a,
.space-news-2-item-big-box-category span,
.space-block-title span:before,
.space-widget-title span:before,
.space-news-4-item.small-news-block .space-news-4-item-img-category a,
.space-news-4-item.big-news-block .space-news-4-item-top-category span,
.space-news-6-item-top-category span,
.space-news-7-item-category span,
.space-news-3-item-img-category a,
.space-news-8-item-title-category span,
.space-news-9-item-info-category span,
.space-archive-loop-item-img-category a,
.space-casinos-3-archive-item:first-child .space-casinos-3-archive-item-count,
.space-single-bonus.space-dark-style .space-aces-single-bonus-info-button-ins a,
.space-bonuses-archive-item.space-dark-style .space-bonuses-archive-item-button a,
nav.pagination a,
nav.comments-pagination a,
nav.pagination-post a span.page-number,
.widget_tag_cloud a,
.space-footer-top-age span,
.space-footer-top-soc a:hover,
.home-page .widget_mc4wp_form_widget .mc4wp-form-fields .space-subscribe-filds button,
.space-content-section .widget_mc4wp_form_widget .mc4wp-form-fields .space-subscribe-filds button {
	background-color: ' . esc_attr ($second_custom_color) . ';
}

.space-footer-top-soc a:hover,
.space-header-2-height.dark .space-header-2-top-soc a:hover,
.space-categories-list-box ul li a {
	border: 1px solid ' . esc_attr ($second_custom_color) . ';
}

.space-header-height.dark .space-header-menu ul.main-menu li a:hover,
.space-header-height.dark .space-header-menu ul.main-menu li:hover a,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li a:hover,
.space-header-2-height.dark .space-header-2-nav ul.main-menu li:hover a {
	border-bottom: 2px solid ' . esc_attr ($second_custom_color) . ';
}

/* Stars Color */

.star,
.fa-star {
	color: ' . esc_attr ($stars_custom_color) . '!important;
}';

	$custom_css .= esc_attr($mercury_data['custom_css']);
	wp_add_inline_style( 'mercury-style', $custom_css );
	
}
add_action( 'wp_enqueue_scripts', 'mercury_scripts' );

/*  Register Scripts & Colors End  */

/*  Space-Themes Functions Start  */

require_once( get_template_directory() . '/space-themes/custom-comments.php' );
require_once( get_template_directory() . '/space-themes/customize.php' );
require_once( get_template_directory() . '/space-themes/gutenberg.php' );
require_once( get_template_directory() . '/space-themes/importer.php' );
require_once( get_template_directory() . '/space-themes/class-tgm-plugin-activation.php' );

/*  Space-Themes Functions End  */



/**
 * Init Metaboxes Options
 */
require get_template_directory() . '/inc/metaboxes.php';
/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/inc/breadcrumbs.php';

// Init dashicons
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('dashicons');
});
//template url
function my_js_variables() { ?>
    <script type="text/javascript">
        var templateUrl = '<?php get_template_directory_uri(); ?>';
    </script><?php
}
add_action ( 'wp_head', 'my_js_variables' );






/*  Mercury Rating Stars Start */

require_once ABSPATH .'wp-admin/includes/template.php';

function mercury_casino_rating($rating_value) {

	$allowed_i_tag = array(
	    'i' => array(
	        'class' => array()
	    ),
	);
	$star_full = '<i class="fas fa-star"></i>';
	$star_empty = '<i class="far fa-star"></i>';

	for ($i=1; $i<=$rating_value; $i++){
		echo wp_kses( $star_full, $allowed_i_tag );
	}
	for ($i=$rating_value; $i<5; $i++){
		echo wp_kses( $star_empty, $allowed_i_tag );
	}
}

/*  Mercury Rating Stars End */

/*  Mercury Register Required Plugins Start */

add_action( 'tgmpa_register', 'mercury_register_required_plugins' );

function mercury_register_required_plugins() {

	$plugins = array(

		array(
			'name'     				=> esc_html__('One Click Demo Import', 'mercury'),
			'slug'     				=> 'one-click-demo-import',
			'required' 				=> true,
			'version' 				=> '2.5.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'                  => esc_html__('Space-Themes Addons [Mercury]', 'mercury'),
			'slug'                  => 'mercury-addons',
			'source'                => get_template_directory() . '/plugins/mercury-addons-2.2.0.zip',
			'required'              => true,
			'version'               => '2.2.0',
			'force_activation'      => false,
			'force_deactivation'    => false,
			'external_url'          => '',
		),
		array(
			'name'                  => esc_html__('Aces [Mercury]', 'mercury'),
			'slug'                  => 'aces',
			'source'                => get_template_directory() . '/plugins/aces-2.2.0.zip',
			'required'              => true,
			'version'               => '2.2.0',
			'force_activation'      => false,
			'force_deactivation'    => false,
			'external_url'          => '',
		),
		array(
			'name'     				=> esc_html__('Yoast SEO', 'mercury'),
			'slug'     				=> 'wordpress-seo',
			'required' 				=> false,
			'version' 				=> '12.7.1',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		)

	);

	$config = array(
		'id'           => 'tgmpa',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}

/*  Mercury Register Required Plugins End */


/* Metaboxes Start*/
function oc_metaboxes($meta_boxes)
{

    $meta_boxes = array();


    wp_reset_postdata();

    $prefix = "oc_";

//    $meta_boxes[] = array(
//
//        'id' => 'casino_banner_img',
//        'title' => esc_html__('Баннер блок', 'onlinecasino'),
//        'pages' => array('casino'), // Post type
//        'context' => 'normal',
//        'priority' => 'high',
//        'show_names' => true, // Show field names on the left
//        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
//        'fields' => array(
//            array(
//                'name' => __('Баннер', 'onlinecasino'),
//                'desc' => __('', 'onlinecasino'),
//                'id' => $prefix . 'banner_img',
//                'std' => '',
//                'type' => 'file',
//            ),
//
//        )
//    );

    $meta_boxes[] = array(

        'id' => 'bonus_item_metabox',
        'title' => esc_html__('Опции Блока Бонуса', 'onlinecasino'),
        'pages' => array('bonus'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Рейтинг', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'bonus_rating_text',
                'std' => '8.2',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Ставка', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'bonus_wager',
                'std' => 'x30',
                'type' => 'text',
            ),

            array(
                'name' => __('Бесплатные вращения', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'free_spins',
                'std' => '200',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Сумма', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'bonus_amount',
                'std' => '$300',
                'type' => 'text',
            ),

        )
    );

    $meta_boxes[] = array(

        'id' => 'casino_item_metabox',
        'title' => esc_html__('Опции Блока Казино', 'onlinecasino'),
        'pages' => array('casino'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Рейтинг', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'rating_text',
                'std' => '4.5',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Ставка', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_wager',
                'std' => 'x30',
                'type' => 'text',
            ),
            array(
                'name' => __('Шанс на победу', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'winrate_text',
                'std' => '95.5% Winrate',
                'type' => 'text',
            ),
            array(
                'name' => __('Скорость выплаты', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'payout_speed',
                'std' => '1-5 days',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Входной бонус', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'welcome_bonus',
                'std' => '$1200',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Описание казино', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_rating_desc',
                'std' => '',
                'type' => 'textarea',
            ),

        )
    );

    $meta_boxes[] = array(
        'id' => 'casino_item_info_metabox',
        'title' => esc_html__('Основная информация', 'onlinecasino'),
        'pages' => array('casino'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Сайт:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_site_text',
                'std' => 'www.website.com',
                'type' => 'text',
            ),
            array(
                'name' => __('Действует с:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_online',
                'std' => 'Since 2009',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('E-mail:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_mail',
                'std' => 'support.casino@casino.gambling',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Всего игр:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_all_games',
                'std' => '500+',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Валюта:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_currencies',
                'std' => 'BRL, EUR, SEK, USD, ZA+',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Языки:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_languages',
                'std' => 'English, Czech, German, Greek, Spanish, Finnish, Norwegian, Polish, Portuguese, Russian, Swedish',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Лицензия:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_licence',
                'std' => 'Antigua (ADOG), United Kingdom (UKGC)',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Владелец:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_owner:',
                'std' => 'Universe Entertainment Services Malta Limited',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Поддержка:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_support',
                'std' => '24/7 Live chat, Email. Phone',
                'type' => 'text',
            ),

        )
    );

    $meta_boxes[] = array(
        'id' => 'casino_item_pros',
        'title' => esc_html__('Преимущества и недостатки', 'onlinecasino'),
        'pages' => array('casino'), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Преимущества:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_pros',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Преимущества:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_pros_two',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Преимущества:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_pros_three',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Преимущества:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_pros_four',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Преимущества:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_pros_five',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Недостатки:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_cons',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Недостатки:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_cons_two',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Недостатки:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_cons_three',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Недостатки:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_cons_four',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Недостатки:', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_item_cons_five',
                'std' => '',
                'type' => 'text',
            ),
        )
    );


    $meta_boxes[] = array(

        'id' => 'casino_bottom_text',
        'title' => esc_html__('Текст внизу страницы', 'onlinecasino'),
        'pages' => array('casino'), // Post type
        'context' => 'normal',
        'priority' => '',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Текст', 'onlinecasino'),
                'desc' => __('', 'onlinecasino'),
                'id' => $prefix . 'casino_bottom_text_field',
                'std' => '',
                'type' => 'textarea',
            ),

        )
    );


    $meta_boxes[] = array(
        'id' => 'about_metabox',
        'title' => 'About Data',
        'pages' => array('page',), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'show_on' => array('key' => 'page-template', 'value' => array('template-about.php'),), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Teacher Block title', 'onlinecasino'),
                'desc' => __('Specify the Teacher Block Title', 'onlinecasino'),
                'id' => $prefix . 'about_teachers',
                'std' => '',
                'type' => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'teachers_metabox',
        'title' => 'Teachers Social Links',
        'pages' => array('teachers',), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => __('Facebook Link', 'onlinecasino'),
                'desc' => __('Add the link', 'onlinecasino'),
                'id' => $prefix . 'fb_link',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Twitter Link', 'onlinecasino'),
                'desc' => __('Add the link', 'onlinecasino'),
                'id' => $prefix . 'twi_link',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Pinterest Link', 'onlinecasino'),
                'desc' => __('Add the link', 'onlinecasino'),
                'id' => $prefix . 'pin_link',
                'std' => '',
                'type' => 'text',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'contact_metabox',
        'title' => esc_html__('Contact Info', 'onlinecasino'),
        'pages' => array('page',), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'show_on' => array('key' => 'page-template', 'value' => array('template-contact.php'),), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => esc_html__('Address Label', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'address_label',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Address', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'address',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Phone Label', 'onlinecasino'),
                'desc' => __('Add the info', 'onlinecasino'),
                'id' => $prefix . 'phone_label',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Phone', 'onlinecasino'),
                'desc' => __('Add the info', 'onlinecasino'),
                'id' => $prefix . 'phone',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Email Label', 'onlinecasino'),
                'desc' => __('Add the info', 'onlinecasino'),
                'id' => $prefix . 'email_label',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Email', 'onlinecasino'),
                'desc' => __('Add the info', 'onlinecasino'),
                'id' => $prefix . 'email',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Google Maps Api Key', 'onlinecasino'),
                'desc' => __('Get your API key in Google Console.', 'onlinecasino'),
                'id' => $prefix . 'googleapi',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => __('Contact Form Shortcode', 'onlinecasino'),
                'desc' => __('You can use any contact for Plugin. Generate the Form and paste the shortcode here. ', 'onlinecasino'),
                'id' => $prefix . 'contactformshortcode',
                'std' => '',
                'type' => 'textarea_code',
            ),
        )
    );

    $meta_boxes[] = array(
        'id' => 'about_metabox',
        'title' => esc_html__('About Data'),
        'pages' => array('page',), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'show_on' => array('key' => 'page-template', 'value' => array('template-about.php'),), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => esc_html__('Teacher Block title', 'onlinecasino'),
                'desc' => esc_html__('Specify the Teacher Block title', 'onlinecasino'),
                'id' => $prefix . 'about_teachers',
                'std' => '',
                'type' => 'text',
            ),

        )
    );

    $meta_boxes[] = array(
        'id' => 'teachers_metabox',
        'title' => esc_html__('Teachers Social Links'),
        'pages' => array('teachers',), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'page-template', 'value' => array('template-about.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => esc_html__('Facebook Link', 'onlinecasino'),
                'desc' => esc_html__('Add the link', 'onlinecasino'),
                'id' => $prefix . 'fb_link',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Twitter Link', 'onlinecasino'),
                'desc' => esc_html__('Add the link', 'onlinecasino'),
                'id' => $prefix . 'twi_link',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Pinterest Link', 'onlinecasino'),
                'desc' => esc_html__('Add the link', 'onlinecasino'),
                'id' => $prefix . 'pin_link',
                'std' => '',
                'type' => 'text',
            ),

        )
    );

    $meta_boxes[] = array(
        'id' => 'contact_metabox',
        'title' => esc_html__('Contact Info'),
        'pages' => array('page',), // Post type
        'context' => 'normal',
        'priority' => 'high',
        'show_names' => true, // Show field names on the left
        'show_on' => array('key' => 'page-template', 'value' => array('template-contact.php'),), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => esc_html__('Address Label', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'address_label',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Address', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'address',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Phone Label', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'phone_label',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Phone', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'phone',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Email Label', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'email_label',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Email', 'onlinecasino'),
                'desc' => esc_html__('Add the info', 'onlinecasino'),
                'id' => $prefix . 'email',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Google Maps Api Key', 'onlinecasino'),
                'desc' => esc_html__('Get your Api Key in Google Console.', 'onlinecasino'),
                'id' => $prefix . 'googleapi',
                'std' => '',
                'type' => 'text',
            ),
            array(
                'name' => esc_html__('Contact Form Shortcode', 'onlinecasino'),
                'desc' => esc_html__('You can use any contact form Plugin. Generate the Form and paste the shortcode here', 'onlinecasino'),
                'id' => $prefix . 'contactformshortcode',
                'std' => '',
                'type' => 'textarea_code',
            ),

        )
    );

    return $meta_boxes;
}
/* Metaboxes End*/