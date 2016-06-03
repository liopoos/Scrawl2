<?php
/**
 * @package Scrawl
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
                <div class="entry-meta clear">
			<?php scrawl_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php if ( 'link' == get_post_format() ) : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( scrawl_get_link_url() ) ), '</a></h1>' ); ?>
		<?php else : ?>
			<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<?php if ( is_search() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( '', 'scrawl' ) ); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'scrawl' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	<?php endif; ?>
	<?php if ( 'post' == get_post_type() ) : ?>		
	<?php endif; ?>
</article><!-- #post-## -->
