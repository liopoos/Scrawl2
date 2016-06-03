<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package Scrawl
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<div class="site-name404"><?php _e( '404', 'scrawl' ); ?></div>
				</header><!-- .page-header -->

				<div class="page-content">
					<p align="center"><?php _e( '永远相信美好的事情即将发生', 'scrawl' ); ?></p>
                                         <center><a href="/"  align="center"><input type="button" value="返回首页"></input></a></center>

					

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>