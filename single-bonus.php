<?php get_header(); ?>

<?php
	$bonus_allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'target' => true,
			'rel' => true
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'span' => array(),
		'p' => array()
	);
	$bonus_short_desc = wp_kses( get_post_meta( get_the_ID(), 'bonus_short_desc', true ), $bonus_allowed_html );
	$bonus_external_link = esc_url( get_post_meta( get_the_ID(), 'bonus_external_link', true ) );
	$bonus_button_title = esc_html( get_post_meta( get_the_ID(), 'bonus_button_title', true ) );
	$bonus_button_notice = wp_kses( get_post_meta( get_the_ID(), 'bonus_button_notice', true ), $bonus_allowed_html );
	$bonus_code = esc_html( get_post_meta( get_the_ID(), 'bonus_code', true ) );
	$bonus_valid_date = esc_html( get_post_meta( get_the_ID(), 'bonus_valid_date', true ) );
	$bonus_dark_style = esc_attr( get_post_meta( get_the_ID(), 'bonus_dark_style', true ) );

	if ($bonus_button_title) {
		$button_title = $bonus_button_title;
	} else {
		if ( get_option( 'bonuses_get_bonus_title') ) {
			$button_title = esc_html__( get_option( 'bonuses_get_bonus_title') );
		} else {
			$button_title = esc_html__( 'Get Bonus', 'mercury' );
		}
	}
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="space-single-bonus relative<?php if ($bonus_dark_style == true ) { ?> space-dark-style<?php } ?>">

		<!-- Breadcrumbs Start -->

		<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

		<!-- Breadcrumbs End -->

		<!-- Single Game Page Section Start -->

		<div class="space-page-section box-100 relative">
			<div class="space-page-section-ins space-page-wrapper relative">
				<div class="space-content-section box-75 left relative">

					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
					<?php if(function_exists('spacethemes_set_post_views')) { spacethemes_set_post_views(get_the_ID()); } ?>

					<div class="space-aces-single-bonus-box box-100 text-center relative">
						<div class="space-aces-single-bonus-info box-100 relative"<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-900-675'); if ($src) { ?> style="background-image: url(<?php echo esc_url($src[0]); ?>);"<?php } ?>>
							<?php if ($src) { ?><div class="space-overlay absolute"></div><?php } ?>
							<div class="space-aces-single-bonus-info-ins relative">
								<div class="space-aces-single-bonus-info-ins-wrap relative">
									<div class="space-aces-single-bonus-info-cat relative">

										<?php $terms = get_the_terms( $post->ID , 'bonus-category' );

											if ($terms) {
								            foreach ( $terms as $term ) { ?>
								                <a href="<?php echo esc_url (get_term_link( (int)$term->term_id, $term->taxonomy )); ?>" title="<?php echo esc_attr($term->name); ?>"><?php echo esc_html($term->name); ?></a>
								        <?php }

								    	} ?>

									</div>
									<div class="space-aces-single-bonus-info-title relative">
										<h1><?php the_title(); ?></h1>
									</div>

									<?php if ($bonus_short_desc) { ?>
									<div class="space-aces-single-bonus-info-short-desc relative">
										<?php echo wp_kses( $bonus_short_desc, $bonus_allowed_html ); ?>
									</div>
									<?php } ?>

									<div class="space-aces-single-bonus-info-code-button box-100 relative"<?php if (! $bonus_short_desc) { ?> style="padding-top: 85px;"<?php } ?>>
										<div class="space-aces-single-bonus-info-code box-60 left relative">
											<div class="space-aces-single-bonus-info-code-ins relative">
												<fieldset class="space-aces-single-bonus-info-code-value relative">
													<legend><?php esc_html_e( 'Bonus Code', 'mercury' ); ?></legend>
													<span>
													<?php if ($bonus_code) { ?>
														<?php echo esc_html( $bonus_code ); ?>
													<?php } else { ?>
														<?php esc_html_e( 'N/A', 'mercury' ); ?>
													<?php } ?>
													</span>
												</fieldset>
												<?php if ($bonus_valid_date) { ?>
												<div class="space-aces-single-bonus-info-code-date relative">
													<?php esc_html_e( 'Valid Until:', 'mercury' ); ?> <span><?php echo esc_html( date_i18n('M d, Y',strtotime($bonus_valid_date))); ?></span>
												</div>
												<?php } ?>

											</div>
										</div>
										<div class="space-aces-single-bonus-info-button box-40 right relative">
											<div class="space-aces-single-bonus-info-button-ins relative">
												<a href="<?php echo esc_url( $bonus_external_link ); ?>" title="<?php echo esc_attr( $button_title ); ?>" target="_blank" rel="nofollow"><?php echo esc_html( $button_title ); ?> <i class="fas fa-arrow-alt-circle-right"></i></a>
											</div>

											<?php if ($bonus_button_notice) { ?>

											<!-- The notice below of the button Start -->

											<div class="space-casino-header-button-notice relative" style="margin-top: 5px;">
												<?php echo wp_kses( $bonus_button_notice, $bonus_allowed_html ); ?>
											</div>

											<!-- The notice below of the button End -->

											<?php } ?>

										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="space-page-content-wrap relative">
								<div class="space-page-content-box-wrap relative">

									<?php if(has_excerpt()) { ?>
									<div class="space-bonus-content-excerpt relative">
										<?php the_excerpt(); ?>
									</div>
									<?php } ?>

									<div class="space-page-content box-100 relative">

										<?php
											the_content();
											wp_link_pages( array(
												'before'      => '<div class="clear"></div><nav class="navigation pagination-post">' . esc_html__( 'Pages:', 'mercury' ),
												'after'       => '</nav>',
												'link_before' => '<span class="page-number">',
												'link_after'  => '</span>',
											) );
										?>

									</div>
								</div>
								
								<!-- Author Info Start -->

								<?php
									if(!get_theme_mod('mercury_author_info_block')) {
										get_template_part('/theme-parts/author-info');
									}
								?>

								<!-- Author Info End -->

						<?php endwhile; ?>
						<?php endif; ?>

					</div>

					<!-- Related Bonuses Start -->

					<?php
						$bonus_args = get_posts( array( 'posts_per_page' => 3, 'post_type' => 'bonus', 'category__in' => wp_get_post_categories($post->ID), 'exclude' => $post->ID) );
						if( $bonus_args ){
					?>

					<div class="space-related-items box-100 read-more-block relative">
						<div class="space-related-items-ins space-page-wrapper relative">
							<div class="space-block-title relative">
								<span><?php esc_html_e( 'More Bonuses', 'mercury' ); ?></span>
							</div>
							<div class="space-bonuses-archive-items box-100 relative">

								<?php
									foreach( $bonus_args as $post ){
									setup_postdata($post);
									
									// connect the bonus loop item style
									get_template_part( '/aces/related/bonus-item-style-1' );

									}
									wp_reset_postdata();
								?>

							</div>
						</div>
					</div>

					<?php } ?>

					<!-- Related Bonuses End -->

					<?php if ( comments_open() || get_comments_number() ) :?>

					<!-- Comments Start -->

					<?php comments_template(); ?>

					<!-- Comments End -->

					<?php endif; ?>

				</div>
				<div class="space-sidebar-section box-25 right relative">

					<?php get_sidebar(); ?>

				</div>
			</div>
		</div>

		<!-- Single Game Page Section End -->

	</div>
</div>

<?php get_footer(); ?>