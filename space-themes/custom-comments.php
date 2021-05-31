<?php

function mercury_comment($comment, $args, $depth) {

	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li ';
		$add_below = 'div-comment';
	}
?>

<<?php echo esc_attr($tag); ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">

<?php 

	if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="space-comments-list-item-ins relative"><?php
	} ?>

			<div class="space-comments-list-item-avatar absolute">
				<?php 
					if ( $args['avatar_size'] != 0 ) {
						echo get_avatar( $comment, $args['avatar_size'] ); 
					}
				?>
			</div>
			<div class="space-comments-list-item-data relative">
				<div class="space-comments-list-item-author relative">
					<?php printf( esc_html__( '%s says:', 'mercury' ), get_comment_author_link() ); ?>
				</div>
				<div class="space-comments-list-item-text space-page-content relative">
					<?php  if ( $comment->comment_approved == '0' ) { ?>
						<p><em><?php esc_html_e( 'Your comment is awaiting moderation.', 'mercury' ); ?></em></p>
					<?php } ?>
					<?php comment_text(); ?>
				</div>
				<div class="space-comments-list-item-date relative">
					<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>"><?php
						printf( 
							esc_html__('%1$s at %2$s', 'mercury'), 
							get_comment_date(),  
							get_comment_time() 
						); ?>
					</a>
					<?php edit_comment_link( esc_html__( '(Edit)', 'mercury'), '  ', '' ); ?>
					<?php comment_reply_link(
							array_merge( 
								$args, 
								array( 
									'add_below' => $add_below, 
									'depth'     => $depth, 
									'max_depth' => $args['max_depth'] 
								) 
							) 
						); ?>
				</div>
			</div>

	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
<?php
endif;
}