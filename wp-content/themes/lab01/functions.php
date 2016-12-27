<?php
/**
 * lab01 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package lab01
 */

 if( function_exists('acf_add_options_page') ) {

	acf_add_options_page(array(
		'page_title' 	=> 'Opzioni Tema',
		'menu_title'	=> 'Opzioni Tema',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Laboratorio',
		'menu_title'	=> 'Laboratorio',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Immagine fissa',
		'menu_title'	=> 'Immagine fissa',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Slide',
		'menu_title'	=> 'Slide',
		'parent_slug'	=> 'theme-general-settings',
	));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Frasi',
        'menu_title'	=> 'Frasi',
        'parent_slug'	=> 'theme-general-settings',
    ));

}

if ( ! function_exists( 'lab01_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function lab01_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on lab01, use a find and replace
	 * to change 'lab01' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'lab01', get_template_directory() . '/languages' );

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
     //aggiunte dimensioni delle immagini skills
    add_image_size('skill_image_size', 105,120,true );
    add_image_size('profilo-thumb', 150,150,true );
    add_image_size('profilo-home', 400,400,true );
    add_image_size('copertina-thumb', 1920,370,true );
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'lab01' ),
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
	add_theme_support( 'custom-background', apply_filters( 'lab01_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'lab01_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function lab01_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'lab01_content_width', 640 );
}
add_action( 'after_setup_theme', 'lab01_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function lab01_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'lab01' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'lab01' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'lab01_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function lab01_scripts() {
    //aggiunti stili del sito
    wp_enqueue_style('Style', get_template_directory_uri() . '/assets/css/styles.css');
    // wp_enqueue_style('OnePageStyle', get_template_directory_uri() . '/assets/css/onepage-scroll.css');
    //scripts
    wp_enqueue_script('jquery');
	wp_enqueue_script('core', get_template_directory_uri() . '/assets/js/core.js');
	wp_enqueue_script('cycle2', get_template_directory_uri() . '/assets/js/cycle2.js');


    //jurgen - questo step richiama l'uso di onepagescroll applicato al nostro html, TO CHECK
	// wp_enqueue_script('PageScrollApply', get_template_directory_uri() . '/assets/js/PageScroll.js');
    // wp_enqueue_script('onePageScroll', get_template_directory_uri() . '/assets/js/onepagescroll.js');


	// wp_enqueue_style( 'lab01-style', get_stylesheet_uri() );
    //
	// wp_enqueue_script( 'lab01-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
    //
	// wp_enqueue_script( 'lab01-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
    //
	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }
}
add_action( 'wp_enqueue_scripts', 'lab01_scripts' );

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
