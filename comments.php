<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package _s
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

<div id="comments" class="comments-area">

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			<?php
				printf( _nx( 'hades已经收到小伙伴的1条评论', 'hades已经收到小伙伴的%1$s条评论', get_comments_number(), 'comments title', 'scrawl' ),
					number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h3>

		<ol class="comment-list">
			<?php $comments = array_reverse($comments) ?>
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => '60',
					'reply_text'  => __( '<h6>回应</h6>', 'scrawl' ),
				) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below" class="navigation comment-navigation clear" role="navigation">
			<h2 class="screen-reader-text"><?php _e( 'Comment navigation', 'scrawl' ); ?></h2>
			<div class="nav-links">

				<div class="nav-previous"><?php previous_comments_link( __( '以前的评论', 'scrawl' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( '较新的评论', 'scrawl' ) ); ?></div>

			</div><!-- .nav-links -->
		</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( '(。・`ω´・)评论已关闭', 'scrawl' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>

</div><!-- #comments -->