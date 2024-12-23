<?php
/**
 * Enqueue scripts and styles.
 */
// Define a global variable to store the current language
global $cur_lan;
$cur_lan = apply_filters('wpml_current_language', NULL);

function houger_scripts()
{
    wp_enqueue_style('Yekan', get_template_directory_uri() . '/public/fonts/YekanBakh/fontface.css', array());
    wp_enqueue_style('avenir', get_template_directory_uri() . '/public/fonts/avenir/fontface.css', array());
    wp_enqueue_style('style', get_stylesheet_directory_uri() . '/public/css/style.css', array());
    wp_enqueue_style('custom', get_stylesheet_directory_uri() . '/public/css/custom.css', array());

    wp_enqueue_script('main-js', get_template_directory_uri() . '/public/js/app.js', array(), null, true);
    wp_enqueue_script('custom-js', get_template_directory_uri() . '/public/js/custom-js.js', array(), null, true);
    global $cur_lan;
    $cur_lan = apply_filters('wpml_current_language', NULL);
    // Localize directly in main-js
    wp_localize_script('main-js', 'currentLanguage', array(
        'language' => $cur_lan,
    ));
}

add_action( 'wp_enqueue_scripts', 'houger_scripts' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function baloochy_setup() {

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
	register_nav_menu( 'headerMenuLocation', 'منوی اصلی' );
	register_nav_menu( 'footerLocationOne', 'منوی اول فوتر' );
	register_nav_menu( 'footerLocationTwo', 'منوی دوم فوتر' );
}

add_action( 'after_setup_theme', 'baloochy_setup' );


if ( function_exists( 'acf_add_options_page' ) ) {

	acf_add_options_page( array(
		'page_title' => 'Theme Settings',
		'menu_title' => 'Theme Settings',
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'edit_posts',
		'redirect'   => false
	) );
}


function add_menu_link_class( $classes, $item, $args ) {
	if ( isset( $args->link_class ) ) {
		$classes['class'] = $args->link_class;
	}
	return $classes;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// helper function to find a menu item in an array of items
function wpd_get_menu_item( $field, $object_id, $items ) {
	foreach ( $items as $item ) {
		if ( $item->$field == $object_id ) {
			return $item;
		}
	}
	return false;
}


/**
 * Filter function used to remove the tinymce emoji plugin.
 *
 * @param array $plugins
 *
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce( $plugins ) {
	if ( is_array( $plugins ) ) {
		return array_diff( $plugins, array( 'wpemoji' ) );
	} else {
		return array();
	}
}

function custom_menu_item_classes($classes, $item, $args) {
    // Check if the current page is a product, category, or single product page
    if (is_product() || is_product_category() || is_singular('product')) {
        // Check if the menu item is the "Shop" page
        if ($item->title == 'Shop' or $item->title == 'Products' or  $item->title == 'محصولات') {
            // Add your custom class to the classes array
            $classes[] = 'current-menu-item';
        }
    }

    return $classes;
}

add_filter('nav_menu_css_class', 'custom_menu_item_classes', 10, 3);
function custom_post_type_args( $args, $post_type ) {
    // Change 'project' to the slug of your custom post type
   if ( 'solution' === $post_type ) {
        // Set the with_front parameter to false
        $args['rewrite']['with_front'] = false;
    }
    if ( 'project' === $post_type ) {
        // Set the with_front parameter to false
        $args['rewrite']['with_front'] = false;
    }
    return $args;
}
add_filter( 'register_post_type_args', 'custom_post_type_args', 10, 2 );

// Modify post type labels based on language
function modify_project_post_type_labels($args, $post_type)
{
    global $sitepress; // Access WPML's sitepress object

    // Check if WPML is active and the current language is English
    if ($sitepress && $sitepress->get_current_language() == 'en' && $post_type === 'project') {
        // Modify the post type labels for English language
        $args['labels']['name'] = 'Projects';
        $args['labels']['singular_name'] = 'Project';
        $args['labels']['add_new'] = 'Add New Project';
        $args['labels']['add_new_item'] = 'Add New Project';
        $args['labels']['edit_item'] = 'Edit Project';
        $args['labels']['all_items'] = 'All Projects';
        // You can modify other labels as needed
    }

    return $args;
}

add_filter('register_post_type_args', 'modify_project_post_type_labels', 10, 2);
require get_theme_file_path('/inc/search-route.php');
