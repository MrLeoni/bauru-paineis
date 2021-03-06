<?php
/**
 * Bauru Painéis functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Bauru_Painéis
 */

if ( ! function_exists( 'bauru_paineis_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bauru_paineis_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Bauru Painéis, use a find and replace
	 * to change 'bauru-paineis' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'bauru-paineis', get_template_directory() . '/languages' );

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
		'header' => esc_html__( 'Topo', 'bauru-paineis' ),
		'footer' => esc_html__( 'Roda Pé', 'bauru-paineis' ),
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
	add_theme_support( 'custom-background', apply_filters( 'bauru_paineis_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'bauru_paineis_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bauru_paineis_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bauru_paineis_content_width', 640 );
}
add_action( 'after_setup_theme', 'bauru_paineis_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bauru_paineis_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bauru-paineis' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Adicione widgets aqui', 'bauru-paineis' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'bauru_paineis_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bauru_paineis_scripts() {
	
	// Styles
	
	wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.css' );
	
	wp_enqueue_style( 'bauru-paineis-style', get_stylesheet_uri(), array('bootstrap-grid', 'font-awesome') );
	
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css' );
	
	wp_enqueue_style( 'bxSliderStyle', get_template_directory_uri() . '/assets/css/jquery.bxslider.css' );
	
	wp_enqueue_style( 'magnific-popup-css', get_template_directory_uri() . '/assets/css/magnific-popup.css' );
	
	// Scripts
	
	wp_enqueue_script( 'bauru-paineis-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bauru-paineis-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	
	wp_enqueue_script( 'bxSliderScript', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array('jquery'), '4.1.2', true );
	
	wp_enqueue_script( 'magnific-popup-script', get_template_directory_uri() . '/js/jquery.magnific-popup.min.js', array('jquery'), '1.1.0', true );
	
	wp_enqueue_script( 'bauru-paineis-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
}
add_action( 'wp_enqueue_scripts', 'bauru_paineis_scripts' );

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

/**
 * Register custom post type
 * 
 * clientes post type
 */
add_action("init", "clientesPostType");
function clientesPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Clientes",
		"singular_name" => "Cliente",
		
	);	
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "thumbnail"),
		"menu_position" => 5,
		"menu_icon" => "dashicons-format-gallery",
		"public"	=> true,
		"publicly_queryable" => true,
		"show_in_menu"	=> true,
	);
	register_post_type("clientes", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array(
		"name" => "Categorias de Clientes",
		"singular_name" => "Categoria de Cliente",
	);
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("cliente-categorias", "clientes", $args_taxonomy);
	
}

/**
 * locais custom post type
 */
add_action("init", "locaisPostType");
function locaisPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Locais",
		"singular_name" => "Local",
		
	);	
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "thumbnail"),
		"menu_position" => 6,
		"menu_icon" => "dashicons-location-alt",
		"public"	=> true,
		"publicly_queryable" => true,
		"show_in_menu"	=> true,
	);
	register_post_type("locais", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array(
		"name" => "Categorias de Locais",
		"singular_name" => "Categoria de Local",
	);
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("locais-categorias", "locais", $args_taxonomy);
	
}

/**
 * banner custom post type
 */
add_action("init", "bannerPostType");
function bannerPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Banners",
		"singular_name" => "Banner",
		
	);	
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "thumbnail"),
		"menu_position" => 7,
		"menu_icon" => "dashicons-images-alt",
		"public"	=> true,
		"publicly_queryable" => true,
		"show_in_menu"	=> true,
	);
	register_post_type("banner", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array(
		"name" => "Categorias de Banner",
		"singular_name" => "Categoria de Banner",
	);
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("banner-categorias", "banner", $args_taxonomy);
	
}

/**
 * complementos custom post type
 */
add_action("init", "complementosPostType");
function complementosPostType() {
	
	// Registering new Custom Post Type
	$labels_post = array( 
		"name" => "Complementos",
		"singular_name" => "Complemento",
		
	);	
	$args_post = array(
		"labels" => $labels_post,
		"supports" => array("title", "editor", "thumbnail"),
		"menu_position" => 20,
		"menu_icon" => "dashicons-plus",
		"public"	=> true,
		"publicly_queryable" => true,
		"show_in_menu"	=> true,
	);
	register_post_type("complementos", $args_post);
	
	// Registering new Taxonomy
	$labels_taxonomy = array(
		"name" => "Categorias de Complementos",
		"singular_name" => "Categoria de Complemento",
	);
	$args_taxonomy = array(
		"labels"	=> $labels_taxonomy,
		"show_ui"	=> true,
		"show_in_menu"	=> true,
		"show_tagcloud"	=> false,
		'show_admin_column' => true,
		"hierarchical"	=> true,
		"capabilities"	=> array("manage_terms", "edit_terms", "delete_terms", "assign_terms"),
	);
	register_taxonomy("complementos-categorias", "complementos", $args_taxonomy);
	
}




