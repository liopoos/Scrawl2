<?php
/*
Template Name: rand
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
		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
                     
			<?php while ( have_posts() ) : the_post(); ?>
			 
				<?php $rand_post=get_posts('numberposts=1&orderby=rand'); foreach($rand_post as $post) : ?>
					<script> location="<?php the_permalink(); ?>";</script>
				<?php endforeach; ?>
             
			<?php endwhile; ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>