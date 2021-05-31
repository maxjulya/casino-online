<?php ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" id="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="space-box relative<?php if( get_theme_mod('mercury_boxed_layout') ) { ?> enabled<?php } ?>">

<!-- Header Start -->

<?php
	$header_style = get_theme_mod('mercury_header_style');

	if ($header_style == 2) {
		get_template_part( '/theme-parts/header/style-2' );
	} else {
		get_template_part( '/theme-parts/header/style-1' );
	}
?>

<div class="space-header-search-block fixed">
	<div class="space-header-search-block-ins absolute">
		<?php get_search_form(); ?>
	</div>
	<div class="space-close-icon desktop-search-close-button absolute">
		<div class="to-right absolute"></div>
		<div class="to-left absolute"></div>
	</div>
</div>

<!-- Header End -->