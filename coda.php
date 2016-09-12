<?php /*
Template Name: coda
*/
 
get_header(); ?> 
<link href="<?php bloginfo('template_url'); ?>/css/coda.css" rel="stylesheet" type="text/css" />
<div class="ssbody">
<div class="coda">
<ul class="archives-monthlisting">
<?php query_posts("post_type=coda&post_status=publish&posts_per_page=-1");if (have_posts()) : while (have_posts()) : the_post(); ?>
<li>
<div class="coda-content"><?php the_content(); ?><br/><div class="coda-meta">by <?php the_author() ?> <span class="tt"><?php the_time('Y.n.j'); ?></span></div></div><?php endwhile;endif; ?></li>
</ul>
</div> 
</div>
<?php get_footer('simple');?>