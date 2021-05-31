<!-- Footer Start -->

<div class="space-footer box-100 relative">
	<div class="space-footer-top box-100 relative">
		<div class="space-footer-ins relative">
			<div class="space-footer-top-desc box-33 relative">
				<?php echo '<span>'. esc_html( get_bloginfo( 'description' ) ) .'</span>'; ?>
			</div>
			<div class="space-footer-top-age box-33 text-center relative">
				<span><?php esc_html_e( '18+', 'mercury' ); ?></span>
			</div>
			<div class="space-footer-top-soc box-33 text-right relative">
				<?php get_template_part( '/theme-parts/social-icons' ); ?>
			</div>
		</div>
	</div>
	<div class="space-footer-copy box-100 relative">
		<div class="space-footer-ins relative">
			<div class="space-footer-copy-left box-50 left relative">
				<?php if(get_theme_mod('footer_copyright') == '') { ?>
					<?php esc_html_e( '&copy; Copyright', 'mercury' ); ?> <?php echo esc_html( date( 'Y' ) ) ?> <a href="<?php echo esc_url( home_url( '/' ) ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ) ?>"><?php echo esc_html( get_bloginfo( 'name' ) ) ?></a>. <?php esc_html_e( 'Designed by ', 'mercury' ); ?> <a href="<?php echo esc_url( __( 'https://space-themes.com/', 'mercury' ) ); ?>" target="_blank" title="<?php esc_attr_e( 'Space-Themes.com', 'mercury' ); ?>"><?php esc_html_e( 'Space-Themes.com', 'mercury' ); ?></a>.
				<?php } else { ?>
					<?php 
						$allowed_html = array(
							'a' => array(
								'href' => true,
								'title' => true,
							),
							'br' => array(),
							'em' => array(),
							'strong' => array(),
							'span' => array(),
							'p' => array()
						);
						echo wp_kses( get_theme_mod( 'footer_copyright' ), $allowed_html );
					?>
				<?php } ?>
			</div>
			<div class="space-footer-copy-menu box-50 left relative">
				<?php
					if (has_nav_menu('footer-menu')) {
						wp_nav_menu( array( 'container' => 'ul', 'menu_class' => 'space-footer-menu', 'theme_location' => 'footer-menu', 'depth' => 1, 'fallback_cb' => '__return_empty_string' ) );
					}
				?>
			</div>
		</div>
	</div>
</div>

<!-- Footer End -->

</div>

<!-- Mobile Menu Start -->

<?php get_template_part( '/theme-parts/mobile-menu' ); ?>

<!-- Mobile Menu End -->

<!-- Back to Top Start -->

<div class="space-to-top">
	<a href="#" id="scrolltop" title="<?php esc_attr_e( 'Back to Top', 'mercury' ); ?>"><i class="far fa-arrow-alt-circle-up"></i></a>
</div>

<!-- Back to Top End -->

<?php wp_footer(); ?>

</body>
</html>