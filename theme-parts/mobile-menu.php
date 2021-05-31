<div class="space-mobile-menu fixed<?php if( get_theme_mod('mercury_enable_header_dark_style') ) { ?> dark<?php } ?>">
	<div class="space-mobile-menu-block absolute" <?php if(get_theme_mod('mercury_mobile_menu_bg')) { ?>style="background-image: url('<?php echo esc_url( get_theme_mod( 'mercury_mobile_menu_bg' ) ) ?>');"<?php } ?>>
		<div class="space-mobile-menu-block-ins relative">
			<div class="space-mobile-menu-header relative text-center">
				<?php
					$custom_logo_id = get_theme_mod( 'custom_logo' );
					$logo = wp_get_attachment_image_src( $custom_logo_id , 'mercury-custom-logo' );
					if ( has_custom_logo() ) {
						echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'"><img src="'. esc_url( $logo[0] ) .'" alt="'. esc_attr( get_bloginfo( 'name' ) ) .'"></a>';
					} else {
						echo '<a href="'. esc_url( home_url( '/' ) ) .'" title="'. esc_attr( get_bloginfo( 'name' ) ) .'" class="text-logo">'. esc_html( get_bloginfo( 'name' ) ) .'</a><span>'. esc_html( get_bloginfo( 'description' ) ) .'</span>';
					}
				?>		
			</div>
			<div class="space-mobile-menu-list relative">
				<?php 
					if (has_nav_menu('main-menu')) {
						wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'mobile-menu', 'theme_location' => 'main-menu', 'depth' => 3, 'fallback_cb' => '__return_empty_string' ) );
					}
				?>
			</div>
			<div class="space-mobile-menu-copy relative text-center">
				<?php if(get_theme_mod('footer_copyright') == '') { ?>
					<?php esc_html_e( '&copy; Copyright', 'mercury' ); ?> <?php echo esc_html( date( 'Y' ) ) ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ) ?></a>.<br><?php esc_html_e( 'Designed by ', 'mercury' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'mercury' ) ); ?>" target="_blank" title="<?php esc_attr_e( 'Space-Themes.com', 'mercury' ); ?>"><?php esc_html_e( 'Space-Themes.com', 'mercury' ); ?></a>.
				<?php } else { ?>
					<?php 
						$allowed_html = array(
							'a' => array(
								'href' => true,
								'title' => true,
							),
							'br' => array(),
							'em' => array(),
							'strong' => array()
						);
						echo wp_kses( get_theme_mod( 'footer_copyright' ), $allowed_html );
					?>
				<?php } ?>
			</div>
			<div class="space-close-icon space-mobile-menu-close-button absolute">
				<div class="to-right absolute"></div>
				<div class="to-left absolute"></div>
			</div>
		</div>
	</div>
</div>