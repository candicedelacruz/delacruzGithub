<?php
/**
 * Delacruz functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Delacruz
 */

 
if ( ! function_exists( 'delacruz_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function delacruz_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Delacruz, use a find and replace
	 * to change 'delacruz' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'delacruz', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'delacruz' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'delacruz_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'delacruz_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function delacruz_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'delacruz_content_width', 640 );
}
add_action( 'after_setup_theme', 'delacruz_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function delacruz_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'delacruz' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'delacruz' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'delacruz_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function delacruz_scripts() {
	wp_enqueue_style( 'delacruz-style', get_stylesheet_uri() );

	wp_enqueue_script( 'delacruz-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'delacruz-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'delacruz_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/*----------------------------------
	edit more tag for each post
-----------------------------------*/

	function modify_read_more_link() 
	{
		return '<br /><br /><a class="more-link" href="' . get_permalink() . '">Learn More</a>';
	}
		add_filter( 'the_content_more_link', 'modify_read_more_link' );
		
		
/*----------------------------------
	apply flexslider to the theme
-----------------------------------*/

/*reference from https://woocommerce.com/flexslider/ and https://return-true.com/installing-woothemes-flexslider-into-your-wordpress-theme/  */
function my_add_styles() {
    wp_enqueue_style('flexslider', get_stylesheet_directory_uri().'/css/flexslider.css');
}
add_action('wp_enqueue_scripts', 'my_add_styles');
function my_add_scripts() {
    wp_enqueue_script('jquery');
    wp_enqueue_script('flexslider', get_stylesheet_directory_uri().'/js/jquery.flexslider-min.js', array('jquery'));
    wp_enqueue_script('flexslider-init', get_stylesheet_directory_uri().'/js/flexslider-init.js', array('jquery', 'flexslider'));
}
add_action('wp_enqueue_scripts', 'my_add_scripts');

/*add theme options page*/
require get_stylesheet_directory() . '/inc/options.php';

/* customize image size */

add_image_size( 'custom-size', 450, 280, true ); 

/* Remmove page-title prefix. Reference from: http://wordpress.stackexchange.com/questions/179585/remove-category-tag-author-from-the-archive-title */
add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});
