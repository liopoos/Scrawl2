<?php
/*
Template Name: gallery
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>
<?php wp_title( '|', true, 'right' ); ?>
</title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/prism.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jquery.fatNav.min.css" type="text/css">
<link href="<?php bloginfo('template_url'); ?>/css/loading-header-while-scrolling.css" rel="stylesheet" type="text/css" />
<script src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/jquery.fatNav.min.js"></script>
<script src="<?php bloginfo('template_url'); ?>/js/nav.js"></script>
</head>

<body <?php body_class(); ?>>
<?php if ( is_active_sidebar( 'sidebar-1' ) || has_nav_menu( 'primary' ) || has_nav_menu ( 'social' ) ) : ?>
<div class="slide-menu">
  <?php if ( function_exists( 'jetpack_the_site_logo' ) && has_site_logo() ) {
				jetpack_the_site_logo();
			} elseif ( '' !== get_theme_mod( 'scrawl_gravatar_email', '' ) ) {
				scrawl_get_gravatar();
			} 
		?>
  <?php if ( has_nav_menu ( 'social' ) ) : ?>
  <?php wp_nav_menu( array( 'theme_location' => 'social', 'depth' => 1, 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'social-links', ) ); ?>
  <?php endif; ?>
  <?php if ( has_nav_menu( 'primary' ) ) : ?>
  <nav id="site-navigation" class="main-navigation" role="navigation">
    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
  </nav>
  <!-- #site-navigation -->
  <?php endif; ?>
  <?php if ( is_active_sidebar( 'sidebar-1' ) ) {
			get_sidebar();
		} ?>
</div>
<!-- .slide-menu -->
<?php endif; ?>
<div id="page" class="hfeed site">
<a class="skip-link screen-reader-text" href="#content">
<?php _e( 'Skip to content', 'scrawl' ); ?>
</a>
<div id="loading"> </div>
<div class="site-header-image" style="top:-20px;">
<header id="masthead" class="site-header" role="banner">
<div id="site-text"><p><a href="http://img.istack.cc/hades" rel="home"><br>探索更多</a></p></div>
  <div class="fat-nav">
    <div class="fat-nav__wrapper">
      <ul>
        <li>
          <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </li>
      </ul>
    </div>
  </div>
  </div>
  </div>
</header>
<!-- #masthead -->

<?php if ( get_header_image() ) : ?>
<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"> <img class="custom-header" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""> </a>
<?php endif;  // End header image check. ?>
<script>
(function() {
    
    $.fatNav();
    
}());
</script>
<div id="content" class="site-content">
  <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="tools/waterfall/css/normalize.css" />
  <link rel="stylesheet" type="text/css" href="tools/waterfall/css/styles.css">
  </head>
  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
      
      <body>
      <div class="site-info">
      </div>
      <?php
			$i=0;
			include 'img.php';
			echo '<article class="htmleaf-container">';
 			echo '<div class="wall">';
 			      for($i=$all;$i>=0;$i--){
  			      echo'<div class="article" > <img src="'.$img[$i][0].'?imageMogr2/thumbnail/500x" />';
   			      echo'<h2>'.$img[$i][1].'</h2>';
    			      echo'</div>';
 			      }

 			echo '</div>';
			echo '</article>';
 			?>
      <script src="tools/waterfall/js/jquery-2.1.1.min.js" type="text/javascript"></script> 
      <script>window.jQuery || document.write('<script src="tools/waterfall/js/jquery-2.1.1.min.js"><\/script>')</script> 
      <script type="text/javascript" src="tools/waterfall/js/jaliswall.js"></script> 
      <script type="text/javascript">
			    $(function(){
				$('.wall').jaliswall({ item: '.article' });
			    });
			</script> 
    </main>
    <!-- #main --> 
  </div>
  <!-- #primary --> 
</div>
<!-- #content --> 

<!-- footer--> 

<a href="#0" class="cd-top">Top</a>
<div class="site-info"><br>
  <img src="https://blog.mayuko.cn/wp-content/uploads/2016/06/gallery-1.jpg"  style="vertical-align:middle;"/></div>
</div>
<!-- #page -->

<?php wp_footer(); ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/example1.js"></script> 
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/more.js"></script> 
<a>
<div id="backtotop"></div>
</a> 
<script type="text/javascript">var isie6 = window.XMLHttpRequest ? false : true; function newtoponload() { var c = document.getElementById("backtotop"); function b() { var a = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop; if (a > 0) { if (isie6) { c.style.display = "none"; clearTimeout(window.show); window.show = setTimeout(function () { var d = document.documentElement.scrollTop || window.pageYOffset || document.body.scrollTop; if (d > 0) { c.style.display = "block"; c.style.top = (400 + d) + "px" } }, 300) } else { c.style.display = "block" } } else { c.style.display = "none" } } if (isie6) { c.style.position = "absolute" } window.onscroll = b; b() } if (window.attachEvent) { window.attachEvent("onload", newtoponload) } else { window.addEventListener("load", newtoponload, false) } document.getElementById("backtotop").onclick = function () { window.scrollTo(0, 0) };</script>
</body>
</html>