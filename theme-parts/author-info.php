<div class="space-page-content-meta box-100 relative">
	<div class="space-page-content-meta-avatar absolute">
		<?php echo get_avatar( get_the_author_meta('user_email'), 50 ); ?>
	</div>
	<div class="space-page-content-meta-ins relative">
		<div class="space-page-content-meta-author relative">
			<?php esc_html_e( 'by', 'mercury' ); ?> <?php the_author_posts_link(); ?>
		</div>
		<div class="space-page-content-meta-data relative">
			<div class="space-page-content-meta-data-ins relative">
				<span class="date"><i class="far fa-clock"></i> <?php if( get_theme_mod('mercury_time_ago_format') ){ ?><?php printf( esc_html_x( '%s ago', '%s = human-readable time difference', 'mercury' ), human_time_diff( get_the_time( 'U' ), current_time( 'timestamp' ) ) ); ?><?php } else { echo get_the_date(); } ?></span><span><i class="far fa-comment"></i> <?php comments_number( '0', '1', '%' ); ?></span><?php if(function_exists('spacethemes_set_post_views')) { ?><span><i class="fas fa-eye"></i> <?php echo esc_html(spacethemes_get_post_views(get_the_ID())); ?></span><?php } ?>
			</div>
		</div>
	</div>
</div>