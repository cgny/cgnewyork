<?php
/**
 * The template for displaying comments
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="">

	<?php if ( have_comments() ) : ?>
		<h4 class="font-accident-one-light uppercase">
			<?php comments_number( false, esc_html__( 'One Comment', 'gridus' ) ); ?>
		</h4>

		<div class="dividewhite4"></div>

		<?php the_comments_navigation(); ?>

		<ul class="comment-list">
			<?php
			function gridus_comment( $comment, $args, $depth ) { ?>
				<li <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
					<div class="comment-avatar">
						<?php if ( $args['avatar_size'] != 0 ) {
							echo get_avatar( $comment, $args['avatar_size'] );
						} ?>
					</div>
					<div id="div-comment-<?php comment_ID() ?>" class="comment-body">

						<?php
						$author_name = null;
						if ( isset( $comment->user_id ) && is_numeric( $comment->user_id ) ) {
							$user = get_userdata( $comment->user_id );
							if ( $user ) {
								$author_name = $user->display_name;
							}
						}

						$author_name = $author_name ? $author_name : get_comment_author( $comment );
						?>
						<div class="comment-meta commentmetadata">
							<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
								<?php printf( '%1$s', get_comment_date( 'Y M, j' ) ); ?>
							</a>
							<?php edit_comment_link( esc_html__( '(Edit)', 'gridus' ), '  ', '' ); ?>
						</div>
						<div class="post-author"><?php echo esc_html($author_name) ?></div>
						<?php if ( $comment->comment_approved == '0' ) : ?>
							<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'gridus' ); ?></em>
							<br/>
						<?php endif; ?>

						<div>
							<?php comment_text(); ?>

							<div class="reply">
								<?php comment_reply_link( array_merge( $args, array(
									'add_below' => 'div-comment',
									'depth'     => $depth,
									'max_depth' => $args['max_depth']
								) ) ); ?>
							</div>
						</div>

					</div>
					<div style="clear: both"></div>

			<?php
			}

			function gridus_comment_reply_link( $link ) {
				$link = preg_replace( '/class=\'.[^\']*\'/', 'class=\'btn btn-gr btn-xs\'', $link );
				return $link;
			}

			add_filter('comment_reply_link', 'gridus_comment_reply_link');

			wp_list_comments( array(
				'style'       => 'ul',
				'short_ping'  => true,
				'avatar_size' => 64,
				'callback'    => 'gridus_comment'
			) );

			?>
		</ul><!-- .comment-list -->

		<?php the_comments_navigation(); ?>

		<div class="dividewhite2"></div>
		<hr>

	<?php endif; // Check for have_comments(). ?>

	<?php

	function gridus_comment_form_before() {
		echo '<div>';
	}

	add_action( 'comment_form_before', 'gridus_comment_form_before', 10 );

	function gridus_comment_form_after() {
		echo '</div>';
	}

	add_action( 'comment_form_after', 'gridus_comment_form_after', 10 );


	$comments_args = array(
		'comment_field'      => '<p><label>' . esc_html__( 'Message', 'gridus' ) . '</label><textarea name="comment" cols="60" rows="3" class="" aria-invalid="false"></textarea></p>',
		'title_reply'        => esc_html__( 'Leave a comment', 'gridus' ),
		'title_reply_before' => '<h4 class="font-accident-one-light uppercase">',
		'title_reply_after'  => '</h4>',
		'submit_button'      => '<button type="submit" id="%2$s" class="btn btn-lg btn-darker">%4$s</button>',
	);
	?>

	<?php comment_form( $comments_args ); ?>

</div>