<?php
	$casino_allowed_html = array(
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
		'p' => array(),
		'ul' => array(),
		'ol' => array(),
		'li' => array(),
	);
	$casino_pros_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_pros_desc', true ), $casino_allowed_html );
	$casino_cons_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_cons_desc', true ), $casino_allowed_html );
	$casino_short_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_short_desc', true ), $casino_allowed_html );
	$casino_terms_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_terms_desc', true ), $casino_allowed_html );
	$casino_external_link = esc_url( get_post_meta( get_the_ID(), 'casino_external_link', true ) );
	$casino_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_button_title', true ) );
	$casino_button_notice = wp_kses( get_post_meta( get_the_ID(), 'casino_button_notice', true ), $casino_allowed_html );
	$casino_rating_trust = esc_html( get_post_meta( get_the_ID(), 'casino_rating_trust', true ) );
	$casino_rating_games = esc_html( get_post_meta( get_the_ID(), 'casino_rating_games', true ) );
	$casino_rating_bonus = esc_html( get_post_meta( get_the_ID(), 'casino_rating_bonus', true ) );
	$casino_rating_customer = esc_html( get_post_meta( get_the_ID(), 'casino_rating_customer', true ) );

	$casino_ratings = array(
		$casino_rating_trust,
		$casino_rating_games,
		$casino_rating_bonus,
		$casino_rating_customer
	);

	$overall_rating = esc_html(array_sum($casino_ratings)/count($casino_ratings));

	if ($casino_button_title) {
		$button_title = $casino_button_title;
	} else {
		if ( get_option( 'casinos_play_now_title') ) {
			$button_title = esc_html__( get_option( 'casinos_play_now_title') );
		} else {
			$button_title = esc_html__( 'Play Now', 'mercury' );
		}
	}

	$casino_software = get_the_terms( $post->ID, 'software' );
	$casino_deposit_methods = get_the_terms( $post->ID, 'deposit-method' );
	$casino_withdrawal_methods = get_the_terms( $post->ID, 'withdrawal-method' );
	$casino_withdrawal_limits = get_the_terms( $post->ID, 'withdrawal-limit' );
	$casino_restricted_countries = get_the_terms( $post->ID, 'restricted-country' );
	$casino_licences = get_the_terms( $post->ID, 'licence' );
	$casino_languages = get_the_terms( $post->ID, 'language' );
	$casino_currencies = get_the_terms( $post->ID, 'currency' );
?>

<script type="application/ld+json">
	{
		"@context": "http://schema.org/",
		"@type": "Review",
		"itemReviewed": {
		    "@type": "Organization",
		    "name": "<?php the_title(); ?>",
		    "image": "<?php $src_schema = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-135-135'); echo esc_url($src_schema[0]); ?>"
		},
		"author": {
		    "@type": "Person",
		    "name": "<?php echo esc_attr(get_the_author()); ?>",
		    "url": "<?php echo esc_url( home_url( '/' )); ?>"
		},
		"reviewRating": {
		    "@type": "Rating",
		    "ratingValue": "<?php echo esc_attr($overall_rating); ?>",
		    "bestRating": "5",
		    "worstRating": "0"
		}
	}
</script>

<div class="space-single-casino space-style-2-casino relative">

	<!-- Casino Header Start -->

	<div class="space-style-2-casino-header box-100 relative">
		<div class="space-style-2-casino-header-ins space-page-wrapper relative">
			<div class="space-style-2-casino-header-elements box-100 relative">
				<div class="space-style-2-casino-header-left box-75 relative">
					<div class="space-style-2-casino-header-left-ins relative">
						<div class="space-casino-header-logo-title box-100 relative">
							<div class="space-casino-header-logo-box relative">
								<?php $src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-135-135'); if ($src) { ?>
								<img src="<?php echo esc_url($src[0]); ?>" alt="<?php the_title_attribute(); ?>">
								<?php } ?>
								<div class="space-casino-header-logo-rating absolute">
									<?php echo esc_html( number_format( round( $overall_rating, 1 ), 1, '.', ',') ); ?> <i class="fas fa-star"></i>
								</div>
							</div>
							<div class="space-casino-header-title-box relative">
								<div class="space-casino-header-title-box-ins box-100 relative">

									<!-- Title Start -->

									<h1><?php the_title(); ?></h1>

									<!-- Title End -->

									<?php if ($casino_short_desc) { ?>

									<!-- Short Description of the Casino Start -->

									<div class="space-casino-header-short-desc relative">
										<?php echo wp_kses( $casino_short_desc, $casino_allowed_html ); ?>
									</div>

									<!-- Short Description of the Casino End -->

									<?php } ?>

									<?php
									if( function_exists('aces_geolocation') ) {
										if ( get_option( 'aces_geolocation_enable') ) { ?>

										<!-- Accepted players info Start -->

										<div class="space-header-accepted-info relative">
											<?php aces_geolocation( get_the_ID() ); ?>
										</div>
										
										<!-- Accepted players info End -->

										<?php }
									} ?>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="space-style-2-casino-header-right box-25 relative">
					<div class="space-casino-header-button text-center box-100 relative">

						<?php if ($casino_external_link) { ?>

						<!-- Button Start -->

						<a href="<?php echo esc_url( $casino_external_link ); ?>" title="<?php echo esc_html( $button_title ); ?>" class="space-style-2-button" rel="nofollow" target="_blank"><?php echo esc_html( $button_title ); ?> <i class="fas fa-arrow-alt-circle-right"></i></a>

						<!-- Button End -->

						<?php } ?>

						<?php if ($casino_button_notice) { ?>

						<!-- The notice below of the button Start -->

						<div class="space-casino-header-button-notice relative">
							<?php echo wp_kses( $casino_button_notice, $casino_allowed_html ); ?>
						</div>

						<!-- The notice below of the button End -->

						<?php } ?>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Casino Header End -->

	<!-- Breadcrumbs Start -->

	<?php get_template_part( '/theme-parts/breadcrumbs' ); ?>

	<!-- Breadcrumbs End -->

		<!-- Single Casino Page Section Start -->

		<div class="space-page-section box-100 relative style-2-without-sidebar">
			<div class="space-page-section-ins space-page-wrapper relative">
				<div class="space-content-section box-100 relative">

							<div class="space-page-content-wrap relative">

								<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
								<?php if(function_exists('spacethemes_set_post_views')) { spacethemes_set_post_views(get_the_ID()); } ?>

								<?php if(has_excerpt()) { ?>
								<div class="space-casino-content-excerpt relative">
									<?php the_excerpt(); ?>
								</div>
								<?php } ?>

								<!-- Pros/Cons Start -->

								<?php if ($casino_pros_desc || $casino_cons_desc) { ?>

								<div class="space-pros-cons box-100 relative">
									<?php if ($casino_pros_desc) { ?>
									<div class="space-pros <?php if (!$casino_cons_desc) { ?>box-100<?php } else { ?>box-50<?php } ?> relative">
										<div class="space-pros-ins relative">
											<div class="space-pros-title box-100 relative">
												<?php
													if ( get_option( 'casinos_pros_title') ) {
														echo esc_html__( get_option( 'casinos_pros_title') );
													} else {
														echo esc_html( 'Pros', 'mercury' );
													}
												?>
											</div>
											<div class="space-pros-description box-100 relative">
												<?php echo wp_kses( $casino_pros_desc, $casino_allowed_html ); ?>
											</div>
										</div>
									</div>
									<?php } ?>
									<?php if ($casino_cons_desc) { ?>
									<div class="space-cons <?php if (!$casino_pros_desc) { ?>box-100<?php } else { ?>box-50<?php } ?> relative">
										<div class="space-cons-ins relative">
											<div class="space-cons-title box-100 relative">
												<?php
													if ( get_option( 'casinos_cons_title') ) {
														echo esc_html__( get_option( 'casinos_cons_title') );
													} else {
														echo esc_html( 'Cons', 'mercury' );
													}
												?>
											</div>
											<div class="space-cons-description box-100 relative">
												<?php echo wp_kses( $casino_cons_desc, $casino_allowed_html ); ?>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>

								<?php } ?>

								<!-- Pros/Cons End -->

								<div class="space-page-content-box-wrap relative">
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

								<?php if ( $casino_software || $casino_deposit_methods || $casino_withdrawal_methods || $casino_withdrawal_limits || $casino_restricted_countries || $casino_licences || $casino_languages || $casino_currencies ) { ?>

								<!-- Casino Details Start -->

								<div class="space-casino-details box-100 relative">
									<div class="space-casino-details-title box-100 relative">
										<h3><?php the_title(); ?> <?php esc_html_e( 'Details', 'mercury' ); ?></h3>
									</div>

									<?php if ($casino_software) { ?>

									<!-- Casino Software Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-puzzle-piece"></i></span> <?php if ( get_option( 'casinos_software_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_software_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Software', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_software as $software ) {
												$software_logo = get_term_meta($software->term_id, 'taxonomy-image-id', true);
												if ($software_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$software->term_id, $software->taxonomy )); ?>" title="<?php echo esc_attr($software->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $software_logo, 'mercury-9999-32', "", array( "class" => "space-software-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$software->term_id, $software->taxonomy )); ?>" title="<?php echo esc_attr($software->name); ?>"><?php echo esc_html($software->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Software End -->

									<?php } ?>

									<?php if ($casino_deposit_methods) { ?>

									<!-- Casino Deposit Methods Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-credit-card"></i></span> <?php if ( get_option( 'casinos_deposit_method_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_deposit_method_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Deposit Methods', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_deposit_methods as $deposit ) {
												$deposit_logo = get_term_meta($deposit->term_id, 'taxonomy-image-id', true);
												if ($deposit_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$deposit->term_id, $deposit->taxonomy )); ?>" title="<?php echo esc_attr($deposit->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $deposit_logo, 'mercury-9999-32', "", array( "class" => "space-deposit-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$deposit->term_id, $deposit->taxonomy )); ?>" title="<?php echo esc_attr($deposit->name); ?>"><?php echo esc_html($deposit->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Deposit Methods End -->

									<?php } ?>

									<?php if ($casino_withdrawal_methods) { ?>

									<!-- Casino Withdrawal Methods Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-wallet"></i></span> <?php if ( get_option( 'casinos_withdrawal_method_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_withdrawal_method_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Withdrawal Methods', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_withdrawal_methods as $withdrawal ) {
												$withdrawal_logo = get_term_meta($withdrawal->term_id, 'taxonomy-image-id', true);
												if ($withdrawal_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$withdrawal->term_id, $withdrawal->taxonomy )); ?>" title="<?php echo esc_attr($withdrawal->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $withdrawal_logo, 'mercury-9999-32', "", array( "class" => "space-withdrawal-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$withdrawal->term_id, $withdrawal->taxonomy )); ?>" title="<?php echo esc_attr($withdrawal->name); ?>"><?php echo esc_html($withdrawal->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Withdrawal Methods End -->

									<?php } ?>

									<?php if ($casino_withdrawal_limits) { ?>

									<!-- Casino Withdrawal Limits Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-coins"></i></span> <?php if ( get_option( 'casinos_withdrawal_limit_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_withdrawal_limit_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Withdrawal Limits', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_withdrawal_limits as $limit ) {
												$limit_logo = get_term_meta($limit->term_id, 'taxonomy-image-id', true);
												if ($limit_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$limit->term_id, $limit->taxonomy )); ?>" title="<?php echo esc_attr($limit->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $limit_logo, 'mercury-9999-32', "", array( "class" => "space-limit-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$limit->term_id, $limit->taxonomy )); ?>" title="<?php echo esc_attr($limit->name); ?>"><?php echo esc_html($limit->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Withdrawal Limits End -->

									<?php } ?>

									<?php if ($casino_restricted_countries) { ?>

									<!-- Casino Restricted Countries Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-flag"></i></span> <?php if ( get_option( 'casinos_restricted_countries_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_restricted_countries_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Restricted Countries', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_restricted_countries as $country ) {
												$country_flag = get_term_meta($country->term_id, 'taxonomy-image-id', true);
												if ($country_flag) { ?>
													<span class="flag-item">
														<?php echo wp_get_attachment_image( $country_flag, 'mercury-9999-32', "", array( "class" => "space-country-flag" ) );  ?>
													</span>
												<?php } else {  ?>
													<span><?php echo esc_html($country->name); ?></span>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Restricted Countries End -->

									<?php } ?>

									<?php if ($casino_licences) { ?>

									<!-- Casino Licences Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-file-alt"></i></span> <?php if ( get_option( 'casinos_licences_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_licences_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Licences', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_licences as $licence ) {
												$licence_logo = get_term_meta($licence->term_id, 'taxonomy-image-id', true);
												if ($licence_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$licence->term_id, $licence->taxonomy )); ?>" title="<?php echo esc_attr($licence->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $licence_logo, 'mercury-9999-32', "", array( "class" => "space-licence-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$licence->term_id, $licence->taxonomy )); ?>" title="<?php echo esc_attr($licence->name); ?>"><?php echo esc_html($licence->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Licences End -->

									<?php } ?>

									<?php if ($casino_languages) { ?>

									<!-- Casino Languages Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-globe"></i></span> <?php if ( get_option( 'casinos_languages_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_languages_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Languages', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_languages as $language ) {
												$language_logo = get_term_meta($language->term_id, 'taxonomy-image-id', true);
												if ($language_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$language->term_id, $language->taxonomy )); ?>" title="<?php echo esc_attr($language->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $language_logo, 'mercury-9999-32', "", array( "class" => "space-language-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$language->term_id, $language->taxonomy )); ?>" title="<?php echo esc_attr($language->name); ?>"><?php echo esc_html($language->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Languages End -->

									<?php } ?>

									<?php if ($casino_currencies) { ?>

									<!-- Casino Currencies Start -->

									<div class="space-casino-details-item box-100 relative">
										<div class="space-casino-details-item-title box-33 relative">
											<span><i class="fas fa-dollar-sign"></i></span> <?php if ( get_option( 'casinos_currencies_title') ) { ?>
													<?php esc_html_e( get_option( 'casinos_currencies_title') ); ?>
												<?php } else { ?>
													<?php esc_html_e( 'Currencies', 'mercury' ); ?>
												<?php } ?>
										</div>
										<div class="space-casino-details-item-links box-66 relative">
											<?php foreach ( $casino_currencies as $currency ) {
												$currency_logo = get_term_meta($currency->term_id, 'taxonomy-image-id', true);
												if ($currency_logo) { ?>
													<a href="<?php echo esc_url (get_term_link( (int)$currency->term_id, $currency->taxonomy )); ?>" title="<?php echo esc_attr($currency->name); ?>" class="logo-item">
														<?php echo wp_get_attachment_image( $currency_logo, 'mercury-9999-32', "", array( "class" => "space-currency-logo" ) );  ?>
													</a>
												<?php } else {  ?>
													<a href="<?php echo esc_url (get_term_link( (int)$currency->term_id, $currency->taxonomy )); ?>" title="<?php echo esc_attr($currency->name); ?>"><?php echo esc_html($currency->name); ?></a>
												<?php } ?>
											<?php } ?>
										</div>
									</div>

									<!-- Casino Currencies End -->

									<?php } ?>

								</div>

								<!-- Casino Details End -->

								<?php } ?>

								<!-- Ratings Block Start -->

								<div class="space-casino-style-2-calltoaction-rating relative">
									<div class="space-casino-style-2-calltoaction-rating-ins box-100 relative">
										<div class="space-casino-style-2-calltoaction-block box-100 relative">
											<div class="space-casino-style-2-calltoaction-text box-66 relative">

												<?php if ($casino_terms_desc) { ?>

												<!-- Terms Start -->

												<div class="space-casino-style-2-calltoaction-text-ins relative">
													<?php echo wp_kses( $casino_terms_desc, $casino_allowed_html ); ?>
												</div>

												<!-- Terms End -->

												<?php } ?>

											</div>
											<div class="space-casino-style-2-calltoaction-button box-33 text-right relative">

												<?php if ($casino_external_link) { ?>

												<!-- Button Start -->

												<div class="space-casino-style-2-calltoaction-button-ins text-center relative">
													<a href="<?php echo esc_url( $casino_external_link ); ?>" title="<?php echo esc_html( $button_title ); ?>" class="space-calltoaction-button" rel="nofollow" target="_blank"><?php echo esc_html( $button_title ); ?> <i class="fas fa-arrow-alt-circle-right"></i></a>

													<?php if ($casino_button_notice) { ?>

													<!-- The notice below of the button Start -->

													<div class="space-casino-style-2-calltoaction-button-notice relative">
														<?php echo wp_kses( $casino_button_notice, $casino_allowed_html ); ?>
													</div>

													<!-- The notice below of the button End -->

													<?php } ?>

												</div>

												<!-- Button End -->

												<?php } ?>

											</div>
										</div>
										<div class="space-casino-style-2-ratings-block box-100 relative">
											<div class="space-casino-style-2-ratings-all box-66 relative">
												<div class="space-casino-style-2-ratings-all-ins box-100 relative">

													<?php if ($casino_rating_trust) { ?>
													<div class="space-casino-style-2-ratings-all-item box-50 relative">
														<div class="space-casino-style-2-ratings-all-item-ins relative">
															<div class="space-casino-style-2-ratings-all-item-value relative">
																<?php echo esc_html( number_format( round( $casino_rating_trust, 1 ), 1, '.', ',') ); ?> <i class="fas fa-star"></i>
															</div>
															<?php
															$rating_1_title = get_option( 'rating_1' );
															if ( $rating_1_title ) {
																echo esc_html($rating_1_title);
															} else {
																esc_html_e( 'Trust & Fairness', 'mercury' );
															} ?>
														</div>
													</div>
													<?php } ?>

													<?php if ($casino_rating_games) { ?>
													<div class="space-casino-style-2-ratings-all-item box-50 relative">
														<div class="space-casino-style-2-ratings-all-item-ins relative">
															<div class="space-casino-style-2-ratings-all-item-value relative">
																<?php echo esc_html( number_format( round( $casino_rating_games, 1 ), 1, '.', ',') ); ?> <i class="fas fa-star"></i>
															</div>
															<?php
															$rating_2_title = get_option( 'rating_2' );
															if ( $rating_2_title ) {
																echo esc_html($rating_2_title);
															} else {
																esc_html_e( 'Games & Software', 'mercury' );
															} ?>
														</div>
													</div>
													<?php } ?>

													<?php if ($casino_rating_bonus) { ?>
													<div class="space-casino-style-2-ratings-all-item box-50 relative">
														<div class="space-casino-style-2-ratings-all-item-ins relative">
															<div class="space-casino-style-2-ratings-all-item-value relative">
																<?php echo esc_html( number_format( round( $casino_rating_bonus, 1 ), 1, '.', ',') ); ?> <i class="fas fa-star"></i>
															</div>
															<?php
															$rating_3_title = get_option( 'rating_3' );
															if ( $rating_3_title ) {
																echo esc_html($rating_3_title);
															} else {
																esc_html_e( 'Bonuses & Promotions', 'mercury' );
															} ?>
														</div>
													</div>
													<?php } ?>

													<?php if ($casino_rating_customer) { ?>
													<div class="space-casino-style-2-ratings-all-item box-50 relative">
														<div class="space-casino-style-2-ratings-all-item-ins relative">
															<div class="space-casino-style-2-ratings-all-item-value relative">
																<?php echo esc_html( number_format( round( $casino_rating_customer, 1 ), 1, '.', ',') ); ?> <i class="fas fa-star"></i>
															</div>
															<?php
															$rating_4_title = get_option( 'rating_4' );
															if ( $rating_4_title ) {
																echo esc_html($rating_4_title);
															} else {
																esc_html_e( 'Customer Support', 'mercury' );
															} ?>
														</div>
													</div>
													<?php } ?>

												</div>
											</div>
											<div class="space-casino-style-2-rating-overall box-33 relative">
												<div class="space-casino-style-2-rating-overall-ins text-center relative">
													<?php echo esc_html( number_format( round( $overall_rating, 1 ), 1, '.', ',') ); ?>
													<span>
														<?php
														$rating_overall_title = get_option( 'rating_overall' );
														if ( $rating_overall_title ) {
															echo esc_html($rating_overall_title);
														} else {
															esc_html_e( 'Overall Rating', 'mercury' );
														} ?>
													</span>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- Ratings Block End -->

								<?php endwhile; ?>
								<?php endif; ?>

							</div>


					<!-- Related Games Start -->

					<?php
						$game_args = get_posts(
							array(
								'posts_per_page' => 8,
								'post_type' => 'game',
								'meta_query' => array(
							        array(
							            'key' => 'parent_casino',
							            'value' => $post->ID,
							            'compare' => 'LIKE'
							        )
							    )
							)
						);
						if( $game_args ){
					?>

					<div class="space-related-items box-100 read-more-block relative">
						<div class="space-related-items-ins space-page-wrapper relative">
							<div class="space-block-title relative">
								<span><?php the_title(); ?> <?php esc_html_e( 'Games', 'mercury' ); ?></span>
							</div>
							<div class="space-games-archive-items box-100 relative">

								<?php
									foreach( $game_args as $post ){
									setup_postdata($post);
									
									// connect the game loop item style
									get_template_part( '/aces/game-item-style-1' );

									}
									wp_reset_postdata();
								?>

							</div>
						</div>
					</div>

					<?php } ?>

					<!-- Related Games End -->

					<!-- Related Bonuses Start -->

					<?php
						$bonus_args = get_posts(
							array(
								'posts_per_page' => 4,
								'post_type' => 'bonus',
								'meta_query' => array(
							        array(
							            'key' => 'bonus_parent_casino',
							            'value' => $post->ID,
							            'compare' => 'LIKE'
							        )
							    )
							)
						);
						if( $bonus_args ){
					?>

					<div class="space-related-items box-100 read-more-block relative">
						<div class="space-related-items-ins space-page-wrapper relative">
							<div class="space-block-title relative">
								<span><?php the_title(); ?> <?php esc_html_e( 'Bonuses', 'mercury' ); ?></span>
							</div>
							<div class="space-bonuses-archive-items box-100 relative">

								<?php
									foreach( $bonus_args as $post ){
									setup_postdata($post);
									
									// connect the bonus loop item style
									get_template_part( '/aces/bonus-item-style-1' );

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
			</div>
		</div>

		<!-- Single Casino Page Section End -->

</div>