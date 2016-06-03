<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Scrawl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'scrawl' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-meta clear">
		<div class="secondary-entry-meta">
			<?php edit_post_link( '<span class="screen-reader-text" title="' . __( 'Edit', 'scrawl' ) . '">' . __( 'Edit', 'scrawl' ) . '</span>', '<span class="edit-link">', '</span>' ); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->