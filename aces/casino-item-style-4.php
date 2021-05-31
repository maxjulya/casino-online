						<?php
							global $post;
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
								'p' => array()
							);

							$casino_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-9999-80');
							$casino_terms_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_terms_desc', true ), $casino_allowed_html );
							$casino_button_title = esc_html( get_post_meta( get_the_ID(), 'casino_button_title', true ) );
							$casino_external_link = esc_url( get_post_meta( get_the_ID(), 'casino_external_link', true ) );
							$casino_overall_rating = esc_html( get_post_meta( get_the_ID(), 'casino_overall_rating', true ) );

							if ($casino_button_title) {
								$button_title = $casino_button_title;
							} else {
								if ( get_option( 'casinos_play_now_title') ) {
									$button_title = esc_html__( get_option( 'casinos_play_now_title') );
								} else {
									$button_title = esc_html__( 'Play Now', 'mercury' );
								}
							}

							if ($casino_external_link) {
								$external_link_url = $casino_external_link;
							} else {
								$external_link_url = get_the_permalink();
							}

							$terms = get_the_terms( $post->ID, 'casino-category' );
							$games = get_posts(
								array(
									'post_type'=>'game',
									'posts_per_page'=>-1,
									'meta_query' => array(
									    array(
									        'key' => 'parent_casino',
									        'value' => $post->ID,
									        'compare' => 'LIKE'
									    )
									)
								)
							);
							$games_count = count($games);

						?>

						<div class="space-casinos-3-archive-item box-100 relative">
							<div class="space-casinos-3-archive-item-ins relative">
								<div class="space-casinos-3-archive-item-logo box-25 relative">
									<div class="space-casinos-3-archive-item-logo-ins box-100 text-center relative">
										<?php if ($casino_img) { ?>
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
											<img src="<?php echo esc_url($casino_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
										</a>
										<?php } ?>
									</div>
								</div>
								<div class="space-casinos-3-archive-item-terms box-25 relative">
									<div class="space-casinos-3-archive-item-terms-ins box-100 text-center relative">
									<?php if ($casino_terms_desc) {
										echo wp_kses( $casino_terms_desc, $casino_allowed_html );
									} ?>
									</div>
								</div>
								<div class="space-casinos-3-archive-item-rating box-25 relative">
									<div class="space-casinos-3-archive-item-rating-ins box-100 text-center relative">
										<?php if ($games_count) { ?>
										<div class="space-casinos-3-archive-item-games relative">
											<i class="fas fa-dice"></i> <span><?php echo esc_html( $games_count ); ?></span> <?php if ($games_count == 1) { echo esc_html( 'game', 'mercury' ); } else { echo esc_html( 'games', 'mercury' ); } ?>
										</div>
										<?php } ?>
										<div class="space-casinos-3-archive-item-rating-box relative">
											<?php if( function_exists('wp_star_rating') ){ wp_star_rating( array( 'rating'=>$casino_overall_rating, 'type'=>'rating' ) ); } ?>
											<span><?php echo esc_html( number_format( round( $casino_overall_rating, 1 ), 1, '.', ',') ); ?></span>
										</div>
									</div>
								</div>
								<div class="space-casinos-3-archive-item-button box-25 relative">
									<div class="space-casinos-3-archive-item-button-ins box-100 text-center relative">
										<a href="<?php echo esc_url( $external_link_url ); ?>" title="<?php echo esc_attr( $button_title ); ?>" <?php if ($casino_external_link) { ?>target="_blank" rel="nofollow"<?php } ?>><i class="fas fa-check-circle"></i> <?php echo esc_html( $button_title ); ?></a>

										<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( 'Read More', 'mercury' ); ?>"><i class="fas fa-arrow-alt-circle-right"></i> <?php echo esc_html( 'Read More', 'mercury' ); ?></a>
									</div>
								</div>
							</div>
						</div>