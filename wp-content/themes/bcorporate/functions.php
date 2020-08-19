<?php
/**
 * Bcorporate functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bcorporate
 */

if ( ! function_exists( 'bcorporate_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function bcorporate_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Bcorporate, use a find and replace
		 * to change 'bcorporate' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'bcorporate', get_template_directory() . '/languages' );

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
			'header_menu' => esc_html__( 'Header Menu', 'bcorporate' ),
			'footer_menu' => esc_html__( 'footer Menu', 'bcorporate' ),
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
		add_theme_support( 'custom-background', apply_filters( 'bcorporate_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		/** custom image size bcorporate **/
		add_image_size('bcorporate_services', 39, 34, true);
		add_image_size('bcorporate_portfolio', 350, 250, true);

		/**
		 * Changing excerpt length for bcorporate theme
		 */
		function bcorporate_excerpt_length( $length ) {
			if ( ! is_admin() ) {
				return 24;
			} else {
				return $length;
			}
		}
		add_filter( 'excerpt_length', 'bcorporate_excerpt_length', 999 );
	}
endif;
add_action( 'after_setup_theme', 'bcorporate_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bcorporate_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bcorporate_content_width', 640 );
}
add_action( 'after_setup_theme', 'bcorporate_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bcorporate_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bcorporate' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bcorporate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer One', 'bcorporate' ),
		'id'            => 'bcorporate_footer_one',
		'description'   => esc_html__( 'Footer One Widget here', 'bcorporate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Two', 'bcorporate' ),
		'id'            => 'bcorporate_footer_two',
		'description'   => esc_html__( 'Footer Two Widget here', 'bcorporate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Three', 'bcorporate' ),
		'id'            => 'bcorporate_footer_three',
		'description'   => esc_html__( 'Footer Three Widget here', 'bcorporate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Shop sidebar', 'bcorporate' ),
		'id'            => 'bcorporate_shop_sidebar',
		'description'   => esc_html__( 'Shop Page Widget here', 'bcorporate' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bcorporate_widgets_init' );

add_filter( 'woocommerce_enqueue_styles', '__return_false' );

/**
 * Enqueue scripts and styles.
 */
function bcorporate_scripts() {

	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'bcorporate-fonts', bcorporate_fonts_url(), array(), null );

	wp_enqueue_style( 'bootstrap-css', get_stylesheet_directory_uri() . '/inc/bootstrap/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/inc/font-awesome/fontawesome-all.min.css', false, '5.0.12' );
	wp_enqueue_style( 'lightslider-css', get_stylesheet_directory_uri() . '/inc/lightslider/lightslider.css', array(), '1.1.3' );

	wp_enqueue_style( 'aos-css', get_stylesheet_directory_uri() . '/inc/animation/aos-master.css', array(), '2.2.0' );


	wp_enqueue_style( 'bcorporate-style', get_stylesheet_uri() );

	wp_enqueue_script( 'bcorporate-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );



	wp_enqueue_script( 'bcorporate-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/inc/bootstrap/js/bootstrap.min.js', array('jquery'), '4.0.0', true );
	wp_enqueue_script( 'lightslider-js', get_template_directory_uri() . '/inc/lightslider/lightslider.js', array('jquery'), '1.1.3', true );
	wp_enqueue_script( 'aos-js', get_stylesheet_directory_uri() . '/inc/animation/aos-script.js', array('jquery'), '2.2.0', true );

	wp_enqueue_script( 'bcorporate-main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bcorporate_scripts' );

/**
 * Register custom fonts.
 */
function bcorporate_fonts_url() {
	$fonts_url = '';

	$bcorporate_roboto_font = _x( 'on', 'Roboto: on or off', 'bcorporate' );
	$bcorporate_sacramento = _x( 'on', 'Sacramento: on or off', 'bcorporate' );


	if ( 'off' !== $bcorporate_roboto_font || 'off' !== $bcorporate_sacramento ) {

		$font_families = array();

		if ( 'off' !== $bcorporate_roboto_font ) {
				$font_families[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
		}

		if ( 'off' !== $bcorporate_sacramento ) {
				$font_families[] = 'Sacramento';
		}
		
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/*include category dropdown*/
require get_template_directory() . '/inc/library/category-dropdown.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Load TGM Plgin to recommended plugins 
 */
require get_template_directory() . '/inc/tgm-plugin-activation/bcorporate-plugin-activation.php';

/**
 * Load class for upsells links
 */
require get_template_directory(). '/inc/blaze-upsells/blaze-pro-btn/class-customize.php';
