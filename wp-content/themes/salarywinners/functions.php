<?php
/**
 * Salary Winners functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Salary_Winners
 */
show_admin_bar(false);
require get_template_directory() . '/class/mail.php';

global $mail;
$mail = new mail();

if ( !class_exists( 'ReduxFramework' ) && file_exists( dirname( __FILE__ ) . '/inc/vendor/ReduxFramework/ReduxCore/framework.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/vendor/ReduxFramework/ReduxCore/framework.php' );
}
if ( !isset( $redux_demo ) && file_exists( dirname( __FILE__ ) . '/inc/theme-options.php' ) ) {
    require_once( dirname( __FILE__ ) . '/inc/theme-options.php' );
}

// WP_Session by Eric https://github.com/ericmann/wp-session-manager
require get_template_directory() . '/inc/vendor/wp-session-manager/wp-session-manager.php';
global $wp_session;
$wp_session = WP_Session::get_instance(); //now $wp_session can be used anywhere

if ( ! function_exists( 'salarywinners_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function salarywinners_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Salary Winners, use a find and replace
	 * to change 'salarywinners' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'salarywinners', get_template_directory() . '/languages' );

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
		'primary' => esc_html__( 'Primary', 'salarywinners' ),
                'footer' => esc_html__( 'Footer', 'salarywinners' ),
	) );
        // Add a custom user role
 
        $result = add_role( 'provider', __(
        'Provider' ),
        array( ) );
        $result = add_role( 'customer', __(
        'Customer' ),
        array( ) );
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

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'salarywinners_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'salarywinners_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function salarywinners_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'salarywinners_content_width', 640 );
}
add_action( 'after_setup_theme', 'salarywinners_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function salarywinners_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'salarywinners' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'salarywinners' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'salarywinners_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function salarywinners_scripts() {
        global $wp_session;
        wp_enqueue_style('salarywinners-style-bootstrap', get_template_directory_uri().'/css/bootstrap.css');
        wp_enqueue_style('salarywinners-style-fontawesome', get_template_directory_uri().'/css/font-awesome.css');
        wp_enqueue_style('salarywinners-style-notifyBar', get_template_directory_uri().'/css/jquery.notifyBar.css');
        wp_enqueue_style('salarywinners-style-theme', get_template_directory_uri().'/css/theme.css');
	wp_enqueue_style( 'salarywinners-style', get_stylesheet_uri() );
        
        wp_enqueue_script('jquery');
        wp_enqueue_script('salarywinners-script-bootstrap', get_template_directory_uri().'/js/bootstrap.min.js', 'jquery', '20160428', true);
        wp_enqueue_script('salarywinners-script-notifyBar', get_template_directory_uri().'/js/jquery.notifyBar.js', 'jquery', '20160428', true);
        wp_enqueue_script('salarywinners-script-bootstrap-validator', get_template_directory_uri().'/js/validator.js', 'jquery', '20160428', true);
	//wp_enqueue_script( 'salarywinners-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	//wp_enqueue_script( 'salarywinners-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
        
        wp_enqueue_script('salarywinners-script', get_template_directory_uri().'/js/script.js', array(
            'jquery',
            'salarywinners-script-bootstrap',
            'salarywinners-script-notifyBar',
            'salarywinners-script-bootstrap-validator',
            ), '20160428', true);
        
        $notify = '';
        try {
            if(is_object($wp_session['notify'])){
                $notify = $wp_session['notify']->toArray();
                $wp_session['notify'] = ''; // clear notification
            }
        } catch (Exception $ex) {

        }
        
        wp_localize_script('salarywinners-script','sw',array('notify'=>$notify));
        
}
add_action( 'wp_enqueue_scripts', 'salarywinners_scripts' );

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
require get_template_directory() . '/inc/metabox.php';
