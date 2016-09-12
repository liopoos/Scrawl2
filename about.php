<?php
/*
Template Name: about
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


get_header(); ?><head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./tools/aboutme/css/normalize.css" />
	<link rel='stylesheet prefetch' href='./tools/aboutme/fonts/font-awesome-4.3.0/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="./tools/aboutme/css/styles.css">

</head>

	
<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="entry-content">
		<div class="htmleaf-container">
		<header class="htmleaf-header">
		<div class="fresh-ui-wrap">
		  	<div class="fresh-ui">
		  		<div class="header">
		  			<div class="photo">
		  				<img src="./tools/aboutme/img/user.jpg">
		  			</div>
		  			<div class="social">
		  				<div class="list">
		  					<a href="http://facebook.com/mayuko2012" data-title="Facebook" target= "_blank"><i class="fa fa-facebook"></i></a>
		  					<a href="http://twitter.com/mayuko2012" data-title="Twitter" target= "_blank"><i class="fa fa-twitter"></i></a>
		  					<a href="http://github.com/mayuko2012" data-title="Github" target= "_blank"><i class="fa fa-github"></i></a>
		  					<a href="http://weibo.com/mayuko2012" data-title="Weibo" target= "_blank"><i class="fa fa-pinterest"></i></a>
		  					<a href="http://blog.csdn.net/mayuko2012" data-title="CSDN" target= "_blank"><i class="fa fa-codepen"></i></a>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="content">
		  			<div class="name">Hades</div>
		  			<div class="job-title">student</div>
		  			<p class="text">你好，我是<a href="http://im.mayuko.cn" target="_blank">hades</a>，目前在烟台读书。</p>
		  			<div class="list clearfix">
		  				<a href="#"><i class="fa fa-qq"></i> 315576249</a>
		  				<a href="mailto:i@mayuko.cn"><i class="fa fa-envelope-square"></i> i@mayuko.cn</a>
		  				<a href="http://mayuko.cn"><i class="fa fa-globe"></i> mayuko.cn</a><br>

		  			</div>
		  		</div>
		  	</div>
		</div>
	</div>
		
	</div><!-- .entry-content -->
</article><!-- #post-## -->


			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>