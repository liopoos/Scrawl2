<?php
/**
 * Scrawl functions and definitions
 *
 * @package Scrawl
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 1000; /* pixels */
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Overwrites the parent theme's setup function
 */
function scrawl_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Scrawl, use a find and replace
	 * to change 'scrawl' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'scrawl', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	add_image_size( 'scrawl-featured-header', '2000', '1500', true );
	add_image_size( 'scrawl-site-logo', '300', '300' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'scrawl' ),
		'social'  => __( 'Social Links', 'scrawl' ),
	) );

	add_editor_style( array( 'editor-style.css', scrawl_fonts_url(), get_template_directory_uri() . '/genericons/genericons.css' ) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio', 'chat', 'status'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'scrawl_custom_background_args', array(
		'default-color' => 'fffdfd',
	) ) );
}
add_action( 'after_setup_theme', 'scrawl_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function scrawl_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Slide-Out Sidebar', 'scrawl' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'scrawl_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function scrawl_scripts() {
	wp_enqueue_style( 'scrawl-style', get_stylesheet_uri() );
	wp_enqueue_style( 'scrawl-fonts', scrawl_fonts_url(), array(), null );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/fonts/genericons.css', array(), '3.3' );

	wp_enqueue_script( 'scrawl-script', get_template_directory_uri() . '/js/scrawl.js', array( 'jquery' ), '20150309', true );

	wp_enqueue_script( 'scrawl-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'scrawl_scripts', 1 );

/**
 * Register Google Fonts
 */
function scrawl_fonts_url() {
    $fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Arbutus Slab, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$arbutusslab = _x( 'on', 'Arbutus Slab font: on or off', 'scrawl' );

	/* Translators: If there are characters in your language that are not
	 * supported by Merriweather, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$merriweather = _x( 'on', 'Merriweather font: on or off', 'scrawl' );

	if ( 'off' !== $arbutusslab && 'off' !== $merriweather ) {

		$font_families = array();

		if ( 'off' !== $arbutusslab  ) {

			$font_families[] = 'Lora:400,700';

		}

		if ( 'off' !== $merriweather  ) {

			$font_families[] = 'Merriweather:400italic,400,700,700italic';

		}
	}

	$query_args = array(
		'family' => implode( '|', $font_families ),
		'subset' => urlencode( 'latin,latin-ext' ),
	);

	$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );

	return $fonts_url;

}

/**
 * Enqueue Google Fonts for custom headers
 */
function scrawl_admin_scripts( $hook_suffix ) {

	wp_enqueue_style( 'scrawl-fonts', scrawl_fonts_url(), array(), null );

}
add_action( 'admin_enqueue_scripts', 'scrawl_admin_scripts' );

if ( ! function_exists( 'scrawl_featured_header' ) ) :
	function scrawl_featured_header() {
		if ( ! has_post_thumbnail() || ! is_single() ) {
			return;
		}

		$img = wp_get_attachment_image_src( get_post_thumbnail_id(), 'scrawl-featured-header' );
		?>
<style type="text/css" id="scrawl-featured-header">
.featured-header-image {
 background-image: url( <?php echo esc_url( $img[0] );
?> );
	background-size: cover;
	background-position: center;
	position: relative;
	width: 100%;
	height: 40%;
	z-index: 9999;

}
.entry-title {
	color: white;
	margin-top: 0;
	margin-bottom: 15%;
	padding: .75em 0;
	position: relative;
	left: 50%;
	top: 50%;
	bottom: 0;
	text-shadow: 0px 2px 5px rgba(0,0,0,0.5);
	-webkit-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	width: 90%;
	z-index: -1;
	text-align:center;
}
.featured-header-bg {
 	
	background-size: cover;
	background-position: center;
	position: relative;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background:rgba(0,0,0,0.5);
}



@media screen and ( min-width: 58em ) {
.entry-title {
	position: absolute;
	top: auto;
	bottom: .75em;
	-webkit-transform: translate(-50%, 0);
	transform: translate(-50%, 0);
	width: 20em;
}
.featured-header-image {
	height: 100%;

}
.single.has-thumbnail .entry-title a:after {
	content: "\f431";
	display: block;
	font-size: 60px;
	opacity: .75;
	transition: all .1s ease-in-out;
}
.single.has-thumbnail .entry-title:hover a:after {
	opacity: 1;
	transition: all .1s ease-in-out;
}
}
.single.has-thumbnail .entry-title a {
	color: white;
    font-size: 40px;
	text-align:center;
}
.site-header{
	position:absolute;
}
.featured-header-bg {
	height: 100%;
	background:rgba(0,0,0,0.5);
}

@keyframes fade-in {
    0% {transform: scale(1.1) }/*初始状态 透明度为0*/
    40% {transform: scale(1.1) }/*过渡状态 透明度为0*/
    100% {transform: scale(1) }/*结束状态 透明度为1*/
}
@-webkit-keyframes fade-in {/*针对webkit内核*/
     0% {transform: scale(1.1) }/*初始状态 透明度为0*/
    40% {transform: scale(1.1) }/*过渡状态 透明度为0*/
    100% {transform: scale(1) }/*结束状态 透明度为1*/
}
.featured-header-image {
    animation: fade-in;/*动画名称*/
    animation-duration: 1s;/*动画持续时间*/
    -webkit-animation:fade-in 1s;/*针对webkit内核*/
}
</style>
<?php
	}
endif;
add_action( 'wp_head', 'scrawl_featured_header', 999 );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';
/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';
/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function change_wp_emoji_baseurl($url){
return set_url_scheme('//twemoji.maxcdn.com/72x72/');
}
add_filter('emoji_url', 'change_wp_emoji_baseurl');


//邮件回复


function comment_mail_notify($comment_id) {
    $admin_email = get_bloginfo ('admin_email');
    $comment = get_comment($comment_id);
    $comment_author_email = trim($comment->comment_author_email);
    $parent_id = $comment->comment_parent ? $comment->comment_parent : '';
    $to = $parent_id ? trim(get_comment($parent_id)->comment_author_email) : '';
    $spam_confirmed = $comment->comment_approved;
    if (($parent_id != '') && ($spam_confirmed != 'spam') && ($to != $admin_email)) {
        $wp_email = 'no-reply@html.love';
        $subject = '
You commented on the [' . get_option("blogname") . '] have a new reply';
        $message = '<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
		<div style="-moz-border-radius: 5px;-webkit-border-radius: 5px;-khtml-border-radius: 5px;border-radius: 5px;background-color:white;border-top:2px solid #12ADDB;box-shadow:0 1px 3px #AAAAAA;line-height:180%;padding:0 15px 12px;width:500px;margin:50px auto;color:#555555;font-family:Century Gothic,Trebuchet MS,Hiragino Sans GB,微软雅黑,Microsoft Yahei,Tahoma,Helvetica,Arial,SimSun,sans-serif;font-size:12px;">
		<h2 style="border-bottom:1px solid #DDD;font-size:14px;font-weight:normal;padding:13px 0 10px 8px;"><span style="color: #12ADDB;font-weight: bold;">></span>You commented on <a style="text-decoration:none;color: #12ADDB;" href="' . get_option('home') . '" target="_blank">' . get_option('blogname') . '</a> on there Reply ah!</h2><div style="padding:0 12px 0 12px;margin-top:18px"><p>Dear ' . trim(get_comment($parent_id)->comment_author) . 'Hello! You have in the article "' . get_the_title($comment->comment_post_ID) . '" Comments on:</p>
		<p style="background-color: #f5f5f5;border: 0px solid #DDD;padding: 10px 15px;margin:18px 0">'. trim(get_comment($parent_id)->comment_content) . '</p><p>'. trim($comment->comment_author) .' to your reply as follows:</p><p style="background-color: #f5f5f5;border: 0px solid #DDD;padding: 10px 15px;margin:18px 0">' . trim($comment->comment_content) .'</p><p>You can click to <a href="' . htmlspecialchars(get_comment_link($parent_id, array('type' => 'comment'))) . '">view the full content Reply.</a>Welcome to <a href="' . get_option('home') . '">' . get_option('blogname') . 'again.</a></p>
		<p style="color: #000;background: #f5f5f5;font-size:11px;border: solid 1px #eee;padding: 2px 10px;">Note: This message is automatically sent by  <a href="' . get_option('home') . '">' . get_option('blogname') . '</a>. Don\'t reply directly.<br />If this message is not your request, please IGNORE and DELETE!</p></div></div>';
        $from = "From: \"" . get_option('blogname') . "\" <$wp_email>";
        $headers = "$from\nContent-Type: text/html; charset=utf-8\n" ;


        wp_mail( $to, $subject, $message, $headers );
    }
}
add_action('comment_post', 'comment_mail_notify');



//更改登录界面
	function custom_login() {
		echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />'."\n";
		echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/jquery.min.js"></script>'."\n";
	}
	add_action('login_head', 'custom_login');

	//Login Page Title
	function custom_headertitle ( $title ) {
		//return get_bloginfo('name');
	}
	add_filter('login_headertitle','custom_headertitle');

	//Login Page Link
	function custom_loginlogo_url($url) {
		return esc_url( home_url('/') );
	}
	add_filter( 'login_headerurl', 'custom_loginlogo_url' );

	//Login Page Footer
	function custom_html() {
		echo '<div class="footer">'."\n";
		echo '<p>Copyright &copy; '.date('Y').' All Rights | <a href="https://blog.mayuko.cn" target="_blank">Hades</a></p>'."\n";
		echo '</div>'."\n";
		echo '<script type="text/javascript" src="'.get_bloginfo('template_directory').'/js/resizeBg.js"></script>'."\n";
		echo '<script type="text/javascript">'."\n";
		echo 'jQuery("body").prepend("<div class=\"loading\"><img src=\"'.get_bloginfo('template_directory').'/images/login_loading.gif\" width=\"58\" height=\"10\"></div><div id=\"bg\"><img /></div>");'."\n";
		echo 'jQuery(\'#bg\').children(\'img\').attr(\'src\', \''.get_bloginfo('template_directory').'/images/bing.php\').load(function(){'."\n";
		echo '	resizeImage(\'bg\');'."\n";
		echo '	jQuery(window).bind("resize", function() { resizeImage(\'bg\'); });'."\n";
		echo '	jQuery(\'.loading\').fadeOut();'."\n";
		echo '});';
		echo '</script>'."\n";
	}
	add_action('login_footer', 'custom_html');
//链接管理器
add_filter( 'pre_option_link_manager_enabled', '__return_true' );
//排除的指定分类id  
function exclude_category_home( $query ) {  
    if ( $query->is_home ) {//是否首页  
        $query->set( 'cat', '' );  
    }  
    return $query;  
}  
add_filter( 'pre_get_posts', 'exclude_category_home' );  

//新建尾巴功能 
add_action('init', 'my_custom_init');
function my_custom_init()
{ $labels = array( 'name' => '尾巴',
'singular_name' => '尾巴', 
'add_new' => '发表尾巴', 
'add_new_item' => '发表尾巴',
'edit_item' => '编辑尾巴', 
'new_item' => '新尾巴',
'view_item' => '查看尾巴',
'search_items' => '搜索尾巴', 
'not_found' => '暂无尾巴',
'not_found_in_trash' => '没有已遗弃的尾巴',
'parent_item_colon' => '', 'menu_name' => '尾巴' );
$args = array( 'labels' => $labels,
'public' => true, 
'publicly_queryable' => true,
'show_ui' => true,
'show_in_menu' => true, 
'exclude_from_search' =>true,
'query_var' => true, 
'rewrite' => true, 'capability_type' => 'post',
'has_archive' => false, 'hierarchical' => false, 
'menu_position' => null, 'supports' => array('editor','author','title', 'custom-fields') );
register_post_type('coda',$args); 
}
// 评论添加@，by Ludou
function ludou_comment_add_at( $comment_text, $comment = '') {
  if( $comment->comment_parent > 0) {
    $comment_text = '@<a href="#comment-' . $comment->comment_parent . '">'.get_comment_author( $comment->comment_parent ) . '：</a> ' . $comment_text;
  }

  return $comment_text;
}
add_filter( 'comment_text' , 'ludou_comment_add_at', 20, 2);
//禁用谷歌字体
function coolwp_remove_open_sans_from_wp_core() {
    wp_deregister_style( 'open-sans' );
    wp_register_style( 'open-sans', false );
    wp_enqueue_style('open-sans','');
}
add_action( 'init', 'coolwp_remove_open_sans_from_wp_core' );