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

							$casino_short_desc = wp_kses( get_post_meta( get_the_ID(), 'casino_short_desc', true ), $casino_allowed_html );
							$casino_overall_rating = esc_html( get_post_meta( get_the_ID(), 'casino_overall_rating', true ) );

							$terms = get_the_terms( $post->ID, 'casino-category' );

						?>

						<div class="space-companies-2-archive-item box-25 relative">
							<div class="space-companies-2-archive-item-ins relative">
								<div class="space-companies-2-archive-item-img left relative">
									<?php $widget_2_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-100-100'); if ($widget_2_img) { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<img src="<?php echo esc_url($widget_2_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
									</a>
									<?php } ?>
								</div>
								<div class="space-companies-2-archive-item-title-box left relative">
									<div class="space-companies-2-archive-item-title-box-ins relative">
										<div class="space-companies-2-archive-item-title relative">
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
										</div>

										<div class="space-companies-2-archive-item-rating relative">
											<?php if( function_exists('wp_star_rating') ){ wp_star_rating( array( 'rating'=>$casino_overall_rating, 'type'=>'rating' ) ); } ?>
										</div>

										<?php if ($casino_short_desc) { ?>
										<div class="space-companies-2-archive-item-desc relative">
											<?php echo wp_kses( $casino_short_desc, $casino_allowed_html ); ?>
										</div>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>