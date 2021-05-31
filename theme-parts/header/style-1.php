<div class="space-header-height relative <?php if( get_theme_mod('mercury_enable_top_bar') ) { ?> enable-top-bar<?php } ?><?php if( get_theme_mod('mercury_enable_header_dark_style') ) { ?> dark<?php } ?>">
	<div class="space-header-wrap space-header-float relative">
		<?php if( get_theme_mod('mercury_enable_top_bar') ) { ?>
		<div class="space-header-top relative">
			<div class="space-header-top-ins space-wrapper relative">
				<div class="space-header-top-menu box-75 left relative">
					<?php
						if (has_nav_menu('top-menu')) {
							wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'space-top-menu', 'theme_location' => 'top-menu', 'depth' => 1, 'fallback_cb' => '__return_empty_string' ) );
						}
					?>
				</div>
				<div class="space-header-top-soc box-25 right text-right relative">
					<?php get_template_part( '/theme-parts/social-icons' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="space-header relative">
			<div class="space-header-ins space-wrapper relative">
				<div class="space-header-logo box-25 left relative">
					<div class="space-header-logo-ins relative">
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
				</div>
				<div class="space-header-menu box-75 left relative">
					<?php
						if (has_nav_menu('main-menu')) {
							wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'main-menu', 'theme_location' => 'main-menu', 'depth' => 3, 'fallback_cb' => '__return_empty_string' ) );
						}
					?>
					<div class="space-header-search absolute">
						<i class="fas fa-search desktop-search-button"></i>
					</div>
					<div class="space-mobile-menu-icon absolute">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>