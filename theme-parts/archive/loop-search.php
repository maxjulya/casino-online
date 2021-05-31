				<div class="space-archive-loop-item box-100 relative">
					<?php $archive_loop_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-450'); if ($archive_loop_img) { ?>
					<div class="space-archive-loop-item-img box-33 left relative">
						<div class="space-archive-loop-item-img-ins relative">
							<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
								<div class="space-archive-loop-item-img-link relative">
									<img src="<?php echo esc_url($archive_loop_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
									<div class="space-overlay absolute"></div>
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
						</div>
					</div>
					<div class="space-archive-loop-item-title-box box-66 left relative">
					<?php } else { ?>
					<div class="space-archive-loop-item-title-box box-100 no-image relative">
					<?php } ?>
						<div class="space-archive-loop-item-title-box-ins relative">
							<div class="space-archive-loop-item-meta relative">
								<span><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'mercury' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span><span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span>
							</div>
							<div class="space-archive-loop-item-title relative">
								<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php if ( is_sticky() ) { ?><i class="fas fa-paperclip"></i> <?php } ?><?php the_title(); ?></a>
							</div>
							<div class="space-archive-loop-item-excerpt relative">
								<?php echo esc_html(wp_trim_words( get_the_excerpt(), 18, ' ...' )); ?>
							</div>
							<div class="space-archive-loop-item-meta relative">
								<span class="read-more"><a href="<?php the_permalink() ?>" title="<?php esc_attr_e( 'Read more', 'mercury' ); ?>"><?php esc_html_e( 'Read more', 'mercury' ); ?> &raquo;</a></span>
							</div>
						</div>
					</div>
				</div>