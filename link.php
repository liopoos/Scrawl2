<?php
/*
Template Name: link
*/
?>

<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Scrawl
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( ! has_post_thumbnail() ) : ?>
		
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'scrawl' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
					<h5>关于hades：</h5>
                       <?php
                              $bookmarks = get_bookmarks('title_li=&category=57&orderby=rand');
                              if ( !empty($bookmarks) ){
                              echo '<ul class="link-content clearfix">';
                              foreach ($bookmarks as $bookmark) {
                              echo '<li style="list-style-type:none;">
                              <img src="https://blog.mayuko.cn/favicons.php?url='.$bookmark->link_url.'" alt="  "></img>
                              <a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '"  target="_blank">'. $bookmark->link_name .'</a>
                              </li>';
                              }
                              echo '</ul>';
                              echo '<br>';}
                          ?>
					<h5>小伙伴们：</h5>
                       <?php
                              $bookmarks = get_bookmarks('title_li=&category=55&orderby=rand');
                              if ( !empty($bookmarks) ){
                              echo '<ul class="link-content clearfix">';
                              foreach ($bookmarks as $bookmark) {
                              echo '<li style="list-style-type:none;">
                              <img src="https://blog.mayuko.cn/favicons.php?url='.$bookmark->link_url.'" alt="  "></img>
                              <a href="' . $bookmark->link_url . '" title="' . $bookmark->link_description . '"  target="_blank">'. $bookmark->link_name .'</a>
                              </li>';
                              }
                              echo '</ul>';
                              echo '<br>';}
                          ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>