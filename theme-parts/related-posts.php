			<div class="space-news-3 box-100 read-more-block relative">
				<div class="space-news-3-ins space-page-wrapper relative">
					<div class="space-block-title relative">
						<span><?php esc_html_e( 'Read More', 'mercury' ); ?></span>
					</div>
					<div class="space-news-3-items box-100 relative">

						<?php
							$args = array( 'posts_per_page' => 3, 'category__in' => wp_get_post_categories($post->ID), 'exclude' => $post->ID);
							$mercury_related = get_posts( $args );
							if( $mercury_related ) foreach( $mercury_related as $post ){ setup_postdata($post);
						?>

						<div class="space-news-3-item box-33 left relative">
							<div class="space-news-3-item-ins case-15 relative">
								<div class="space-news-3-item-img relative">

									<?php $widget_4_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-338'); if ($widget_4_img) { ?>

									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
										<div class="space-news-3-item-img-ins">
											<img src="<?php echo esc_url($widget_4_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
											<?php if ( has_post_format( 'video' )) { ?>
												<div class="space-post-format absolute"><i class="fas fa-play"></i></div>
											<?php } ?>
											<?php if ( has_post_format( 'image' )) { ?>
												<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
											<?php } ?>
											<?php if ( has_post_format( 'gallery' )) { ?>
												<div class="space-post-format absolute"><i class="fas fa-camera"></i></div>
											<?php } ?>
										</div>
									</a>

									<?php } ?>

									<div class="space-news-3-item-img-category <?php if ($widget_4_img) { ?>absolute<?php } ?>"><?php the_category(' '); ?></div>

								</div>
								<div class="space-news-3-item-title-box relative">
									<div class="space-news-3-item-title relative">
										<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
									</div>
									<div class="space-news-3-item-meta relative">
										<div class="space-news-3-item-meta-left absolute">
											<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'mercury' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span>
										</div>
										<div class="space-news-3-item-meta-right text-right absolute">
											<span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
										</div>
									</div>
								</div>
							</div>
						</div>

						<?php } else { ?>

						<div class="space-page-content-wrap relative">
							<div class="space-page-content page-template box-100 relative">
								<h4><?php esc_html_e( 'Posts not found', 'mercury' ); ?></h4>
								<p>
									<?php esc_html_e( 'Sorry, no other posts related this article.', 'mercury' ); ?>
								</p>
							</div>
						</div>

						<?php } wp_reset_postdata(); ?>

					</div>
				</div>
			</div>