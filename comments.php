<?php
	if ( post_password_required() ) {
		return;
	}
?>
				<div id="comments" class="space-comments box-100 relative">
					<div class="space-comments-ins case-15 white relative">
						<div class="space-comments-wrap space-page-content relative">

							<?php
							if ( have_comments() ) : ?>

								<h3 class="comment-first-title">
									<?php
										$comments_number = get_comments_number();
										if ( '1' === $comments_number ) {
											printf( _x( 'One Reply to &ldquo;%s&rdquo;', 'comments title', 'mercury' ), get_the_title() );
										} else {
											printf(
												_nx(
													'%1$s Reply to &ldquo;%2$s&rdquo;',
													'%1$s Replies to &ldquo;%2$s&rdquo;',
													$comments_number,
													'comments title',
													'mercury'
												),
												number_format_i18n( $comments_number ),
												get_the_title()
											);
										}
									?>
								</h3>
								<div class="space-comments-list relative">
								<ul class="comment-list">
									<?php
										wp_list_comments( array(
											'avatar_size' => 70,
											'style'       => 'ul',
											'short_ping'  => true,
											'callback'    => 'mercury_comment',
											'reply_text'  => esc_html__( 'Reply', 'mercury' ),
										) );
									?>
								</ul>
								</div>

								<?php the_comments_pagination( array(
									'prev_text' => '' . esc_html__( '&laquo;', 'mercury' ) . '',
									'next_text' => '' . esc_html__( '&raquo;', 'mercury' ) . '',
								) );

							endif;
							if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>

							<?php endif;
							$consent  = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';
							$comments_args = array(
								'fields' => array(
									'author' => '<p class="comment-form-author"><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" placeholder="'. esc_attr__( 'Name*', 'mercury' ) .'" /></p>',
									'email'  => '<p class="comment-form-email"><input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes" placeholder="'. esc_attr__( 'Email*', 'mercury' ) .'" /></p>',
									'url'    => '<p class="comment-form-url"><input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" placeholder="'. esc_attr__( 'Website', 'mercury' ) .'" /></p>',
								),
								'comment_field'        => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8"  aria-required="true" required="required" placeholder="'. esc_attr__( 'Comment*', 'mercury' ) .'"></textarea></p>',
								'cookies' => '<p class="comment-form-cookies-consent"><input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"' . $consent . ' />' .
					 			'<label for="wp-comment-cookies-consent">' . esc_html__( 'Save my name, email, and website in this browser for the next time I comment.', 'mercury' ) . '</label></p>',
								);
							comment_form( $comments_args ); ?>
						</div>
					</div>
				</div>