<?php

/**
 * Boni•Maddison Architects functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Boni•Maddison_Architects
 */

if (!function_exists('boni_maddison_architects_setup')) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function boni_maddison_architects_setup()
	{
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Boni•Maddison Architects, use a find and replace
		 * to change 'boni-maddison-architects' to the name of your theme in all the template files.
		 */
		load_theme_textdomain('boni-maddison-architects', get_template_directory() . '/languages');

		// Add default posts and comments RSS feed links to head.
		add_theme_support('automatic-feed-links');

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support('title-tag');

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support('post-thumbnails');

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'boni-maddison-architects'),
			'mobile-menu' => esc_html__('Mobile Menu', 'boni-maddison-architects'),
			'footer-menu' => esc_html__('Footer Menu', 'boni-maddison-architects'),
		));

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		// Set up the WordPress core custom background feature.
		add_theme_support('custom-background', apply_filters('boni_maddison_architects_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		// Add theme support for selective refresh for widgets.
		add_theme_support('customize-selective-refresh-widgets');

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support('custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		));
	}
endif;
add_action('after_setup_theme', 'boni_maddison_architects_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function boni_maddison_architects_content_width()
{
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters('boni_maddison_architects_content_width', 640);
}
add_action('after_setup_theme', 'boni_maddison_architects_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function boni_maddison_architects_widgets_init()
{
	register_sidebar(array(
		'name'          => esc_html__('Sidebar', 'boni-maddison-architects'),
		'id'            => 'sidebar-1',
		'description'   => esc_html__('Add widgets here.', 'boni-maddison-architects'),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	));
}
add_action('widgets_init', 'boni_maddison_architects_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function boni_maddison_architects_scripts()
{
	// Google Fonts
	wp_enqueue_style('bma-googlefonts-open-sans', "https://fonts.googleapis.com/css?family=Open+Sans&display=swap");
	wp_enqueue_style('bma-googlefonts-roboto', "https://fonts.googleapis.com/css?family=Roboto&display=swap");
	// Main CSS
	wp_enqueue_style('boni-maddison-architects-style', get_stylesheet_uri());
	// Slick Slider CSS
	wp_enqueue_style('bma-slicktheme', get_stylesheet_directory_uri() . '/slick-1.8.1/slick/slick-theme.css', true);
	wp_enqueue_style('bma-slick', get_stylesheet_directory_uri() . '/slick-1.8.1/slick/slick.css', true);
	// Navigation
	wp_enqueue_script('boni-maddison-architects-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);
	// Skip to Content
	wp_enqueue_script('boni-maddison-architects-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);
	// Accordion for projects list
	wp_enqueue_script('bma-accordion', get_template_directory_uri() . '/js/accordion.js', array(), '20190710', true);


	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}



	// Slick Slider
	wp_enqueue_script('bma-slickjs', get_stylesheet_directory_uri() . '/slick-1.8.1/slick/slick.min.js', array('jquery'), '1', true);
	wp_enqueue_script('bma-slicksettings', get_stylesheet_directory_uri() . '/js/slicksettings.js', array('bma-slickjs'), '1', false);

	// Font Awesome
	wp_enqueue_script('font-awesome', get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/js/all.js', array(), '20190110', true);
	// Jquery Enqueue
	wp_enqueue_script('jquery');
	// Navigation
	wp_enqueue_script('bma-navigation', get_template_directory_uri() . '/js/mobileNav.js', array(), '20190110', true);
	// Main Script
	// wp_enqueue_script( 'bma-script', get_template_directory_uri() . '/js/bma-main.js', array(), '20190113', true );
	// Waypoints
	wp_enqueue_script('waypoints', get_template_directory_uri() . '/node_modules/waypoints/lib/noframework.waypoints.min.js', array(), '20190709', true);
}
add_action('wp_enqueue_scripts', 'boni_maddison_architects_scripts');


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

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

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



/**
 * SVG Support
 */
function cc_mime_types($mimes)
{
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

/**
 * Footer Details - Copyright & Dev Info
 */
if (function_exists('acf_add_options_page')) {
	$args = array(
		'page_title' => 'Footer',
		'menu_title' => 'Footer',
		'menu_slug'  => 'footer',
		'icon_url' => 'dashicons-edit'
		//other args
	);
	acf_add_options_page($args);
}


/**
 * Custom Logo
 */
if (function_exists('acf_add_options_page')) {
	$args = array(
		'page_title' => 'Custom Logo',
		'menu_title' => 'Custom Logo',
		'menu_slug'  => 'custom_logo',
		'icon_url' => 'dashicons-format-image'
		//other args
	);
	acf_add_options_page($args);
}


/**
 * Project Section Gallery
 */

if (function_exists('acf_add_options_page')) {
	$args = array(
		'page_title' => 'Project Gallery',
		'menu_title' => 'Project Gallery',
		'menu_slug'  => 'project-gallery',
		'icon_url'   => 'dashicons-format-gallery'
		//other args
	);
	acf_add_options_page($args);
}


/**
 * BMA CPT - Projects ------
 */
function bma_register_custom_post_types()
{
	$labels = array(
		'name'               => _x('Projects', 'post type general name'),
		'singular_name'      => _x('Projects', 'post type singular name'),
		'menu_name'          => _x('Projects', 'admin menu'),
		'name_admin_bar'     => _x('Projects', 'add new on admin bar'),
		'add_new'            => _x('Add New', 'Projects'),
		'add_new_item'       => __('Add New Projects'),
		'new_item'           => __('New Projects'),
		'edit_item'          => __('Edit Projects'),
		'view_item'          => __('View Projects'),
		'all_items'          => __('All Projects'),
		'search_items'       => __('Search Projects'),
		'parent_item_colon'  => __('Parent Projects:'),
		'not_found'          => __('No Projects found.'),
		'not_found_in_trash' => __('No Projects found in Trash.'),
		'archives'           => __('Projects Archives'),
		'insert_into_item'   => __('Uploaded to this Projects'),
		'uploaded_to_this_item' => __('Projects Archives'),
		'filter_item_list'   => __('Filter Projects list'),
		'items_list_navigation' => __('Projects list navigation'),
		'items_list'         => __('Projects list'),
		'featured_image'     => __('Projects feature image'),
		'set_featured_image' => __('Set Projects feature image'),
		'remove_featured_image' => __('Remove Projects feature image'),
		'use_featured_image' => __('Use as feature image'),

	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_nav_menus'  => true,
		'show_in_admin_bar'  => true,
		'query_var'          => true,
		'rewrite'            => array('slug' => 'projects'),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
		'menu_icon'          => 'dashicons-migrate',
		'taxonomies'          => array('project_types'),
	);
	register_post_type('projects', $args);
}
add_action('init', 'bma_register_custom_post_types');


/* Flush */

function bma_rewrite_flush()
{
	bma_register_custom_post_types();
	flush_rewrite_rules();
}
register_activation_hook(__FILE__, 'bma_rewrite_flush');



/**
 * BMA Register Custom Taxonomy
 */
function project_types()
{

	$labels = array(
		'name'                       => _x('Project Types', 'Taxonomy General Name', 'text_domain'),
		'singular_name'              => _x('Project Type', 'Taxonomy Singular Name', 'text_domain'),
		'menu_name'                  => __('Project Type', 'text_domain'),
		'all_items'                  => __('All Project Types', 'text_domain'),
		'parent_item'                => __('Parent Project Type', 'text_domain'),
		'parent_item_colon'          => __('Parent Project Type', 'text_domain'),
		'new_item_name'              => __('New Project Type Name', 'text_domain'),
		'add_new_item'               => __('Add New Project Type', 'text_domain'),
		'edit_item'                  => __('Edit Project Type', 'text_domain'),
		'update_item'                => __('Update Project Type', 'text_domain'),
		'view_item'                  => __('View Project Type', 'text_domain'),
		'separate_items_with_commas' => __('Separate project type with commas', 'text_domain'),
		'add_or_remove_items'        => __('Add or remove Project Types', 'text_domain'),
		'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
		'popular_items'              => __('Popular Project Types', 'text_domain'),
		'search_items'               => __('Search Project Types', 'text_domain'),
		'not_found'                  => __('Not Found', 'text_domain'),
		'no_terms'                   => __('No Project Types', 'text_domain'),
		'items_list'                 => __('Project Types list', 'text_domain'),
		'items_list_navigation'      => __('Project Types list navigation', 'text_domain'),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy('project_types', array('projects'), $args);
}
add_action('init', 'project_types', 0);


/**
 * Function to make the custom tax/post display in correct order
 */

function set_the_terms_in_order($terms, $id, $taxonomy)
{
	$terms = wp_cache_get($id, "{$taxonomy}_relationships_sorted");
	if (false === $terms) {
		$terms = wp_get_object_terms($id, $taxonomy, array('orderby' => 'term_order'));
		wp_cache_add($id, $terms, $taxonomy . '_relationships_sorted');
	}
	return $terms;
}
add_filter('get_the_terms', 'set_the_terms_in_order', 10, 4);

function do_the_terms_in_order()
{
	global $wp_taxonomies;  //fixed missing semicolon
	// the following relates to tags, but you can add more lines like this for any taxonomy
	$wp_taxonomies['post_tag']->sort = true;
	$wp_taxonomies['post_tag']->args = array('orderby' => 'term_order');
}
add_action('init', 'do_the_terms_in_order');


// Excerpt Length
function bma_excerpt_length($length)
{
	return 20;
}
add_filter('excerpt_length', 'bma_excerpt_length', 999);


// Specific Page Scripts
function load_js_assets()
{
	// Front Page Script
	if (is_page(283)) {
		wp_enqueue_script('front-page', get_template_directory_uri() . '/js/frontPage.js', array('jquery'), '20190605', true);
	}
	// About Page Script
	if (is_page(80)) {
		wp_enqueue_script('about-page', get_template_directory_uri() . '/js/aboutPage.js', array('jquery'), '20190605', true);
	}
	// Contact Page Script
	if (is_page(8)) {
		wp_enqueue_script('contact-page', get_template_directory_uri() . '/js/contactPage.js', array('jquery'), '2020', true);
	}
	// Project Archive Page Script
	if (is_post_type_archive('projects')) {
		wp_enqueue_script('projects-page', get_template_directory_uri() . '/js/projectsIndex.js', array('jquery'), '20190605', true);
	}

	// Project Archive Page Script
	if (is_post_type_archive('index')) {
		wp_enqueue_script('index-page', get_template_directory_uri() . '/js/newsIndex.js', array('jquery'), '20190605', true);
	}
}

add_action('wp_enqueue_scripts', 'load_js_assets');