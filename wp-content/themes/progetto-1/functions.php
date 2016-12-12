<?php
/**
 * Progetto 1 functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Progetto_1
 */

if ( ! function_exists( 'progetto_1_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function progetto_1_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Progetto 1, use a find and replace
	 * to change 'progetto-1' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'progetto-1', get_template_directory() . '/languages' );

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

	//POSSO AGGIUNGERE UN RITAGLIO PERSONALIZZATO DELLE MINIATURE. CON TRUE RITAGLIO SENZA RISPETTARE LE PROPORZIONI
	add_image_size('homepage-thumb', 220, 180, true);
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'progetto-1' ),
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
	add_theme_support( 'custom-background', apply_filters( 'progetto_1_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'progetto_1_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function progetto_1_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'progetto_1_content_width', 640 );
}
add_action( 'after_setup_theme', 'progetto_1_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function progetto_1_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'progetto-1' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'progetto-1' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'progetto_1_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function progetto_1_scripts() {
	/*
	metodo migliore per caricare fogli di stile rispetto all'header.php
	il primo parametro è un nome che sarà l'id del tag <link>, il secondo è il percorso del file css
	*/
	wp_enqueue_style( 'progetto-1-style', get_template_directory_uri(). '/assets/css/main.css' );

	/*
	questo metodo serve per gestire jQuery. Wordpress lo gestisce autonomamente con la cartella wp-includes che aggiorna con gli aggiornamenti di Wordpress
	*/
	wp_enqueue_script( 'jquery');

	//caricare altri file JS presenti nel tema
	wp_enqueue_script( 'skel', get_template_directory_uri().'/assets/js/skel.min.js' );
	wp_enqueue_script( 'util', get_template_directory_uri().'/assets/js/util.js' );
	wp_enqueue_script( 'main', get_template_directory_uri().'/assets/js/main.js' );


	wp_enqueue_style( 'progetto-1-style', get_stylesheet_uri() );

	wp_enqueue_script( 'progetto-1-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'progetto-1-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'progetto_1_scripts' );

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


/*function new_excerpt_more( $more ) {
return '<ul class=\"actions\"><li><a href=\"".get_permalink()."\" class=\"button\">More</a></li>
</ul>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );*/
