<div class="space-header-2-height relative <?php if( get_theme_mod('mercury_enable_header_dark_style') ) { ?> dark<?php } ?>">
	<div class="space-header-2-wrap space-header-float relative">
		<div class="space-header-2-top relative">
			<div class="space-header-2-top-ins space-wrapper relative">
				<div class="space-header-2-top-soc box-25 relative">
					<div class="space-header-2-top-soc-ins relative">
						<?php get_template_part( '/theme-parts/social-icons' ); ?>
					</div>
					<div class="space-mobile-menu-icon absolute">
						<div></div>
						<div></div>
						<div></div>
					</div>
				</div>
				<div class="space-header-2-top-logo box-50 text-center relative">
					<div class="space-header-2-top-logo-ins relative">
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
				<div class="space-header-2-top-search box-25 text-right relative">
					<div class="space-header-search absolute">
						<i class="fas fa-search desktop-search-button"></i>
					</div>
				</div>
			</div>
		</div>
		<div class="space-header-2-nav relative">
			<div class="space-header-2-nav-ins space-wrapper relative">
				<?php
					if (has_nav_menu('main-menu')) {
						wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'main-menu', 'theme_location' => 'main-menu', 'depth' => 3, 'fallback_cb' => '__return_empty_string' ) );
					}
				?>
			</div>
		</div>
	</div>
</div>