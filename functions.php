<?php
/**
 * Theme's functions and definitions
 *
 * @package <theme>
 * @since 1994
 */
 

 
if ( ! function_exists( 'theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function theme_setup() {
 
    
 
    
 
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );

    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary_menu'   => __( 'Primary Menu', '<theme>' ),
        'footer_menu' => __('Footer Menu', '<theme>' )
    ) );

    add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
    ) );
    
    add_theme_support( 'custom-background', apply_filters( 'wpbp_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
 
    add_theme_support('menus');
    add_theme_support( 'custom-logo' );

    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}
endif; // prognomiq_setup
add_action( 'after_setup_theme', 'theme_setup' );

/**
     * REMOVE WEIRD WP INJECTED STYLES
     */
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

function theme_scripts() {

   /**
     * MAIN STYLE SHEET
     */
    wp_enqueue_style( 'styles', get_template_directory_uri() . '/style.css',false,'','all');

    	 /**
     * MAIN JS FILE
     */	
    
  wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true);

 
    

    

}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/**
     * ACF OPTIONS PAGE
     */
      if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Site Options',
		'menu_title'	=> 'Site Options',
		'menu_slug' 	=> 'site-options',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}



/**********************************************
 * GOOGLE FONTS
 *********************************************/
add_action( 'wp_enqueue_scripts', 'custom_add_google_fonts' );
function custom_add_google_fonts() {
    wp_enqueue_style( 'custom-google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap', false );
      
}


/**********************************************
 * CUSTOM BODY CLASSES
 *********************************************/

// add_filter( 'body_class', 'custom_class' );
// function custom_class( $classes ) {
//     if ( is_page( 'privacy-policy' ) || is_404() ) {
//         $classes[] = 'no-animation';
//     }
//     return $classes;
// }

/**********************************************
 * CUSTOM POST TYPE
 *********************************************/
// function cw_post_type_news() {
//     $supports = array(
//     'title', // post title
//     'editor', // post content
//     'author', // post author
//     'thumbnail', // featured images
//     'excerpt', // post excerpt
//     'custom-fields', // custom fields
//     'comments', // post comments
//     'revisions', // post revisions
//     'post-formats', // post formats
//     );
//     $labels = array(
//     'name' => _x('news', 'plural'),
//     'singular_name' => _x('news', 'singular'),
//     'menu_name' => _x('news', 'admin menu'),
//     'name_admin_bar' => _x('news', 'admin bar'),
//     'add_new' => _x('Add New', 'add new'),
//     'add_new_item' => __('Add New news'),
//     'new_item' => __('New news'),
//     'edit_item' => __('Edit news'),
//     'view_item' => __('View news'),
//     'all_items' => __('All news'),
//     'search_items' => __('Search news'),
//     'not_found' => __('No news found.'),
//     );
//     $args = array(
//     'supports' => $supports,
//     'labels' => $labels,
//     'public' => true,
//     'query_var' => true,
//     'rewrite' => array('slug' => 'news'),
//     'has_archive' => true,
//     'hierarchical' => false,
//     );
//     register_post_type('news', $args);
//     }
//     add_action('init', 'cw_post_type_news');
    /*Custom Post type end*/

    /**********************************************
 * ADD tinyMCE buttons
 */


function my_mce_buttons_2( $buttons ) {	
	/**
	 * Add in a core button that's disabled by default
	 */
	$buttons[] = 'superscript';
	$buttons[] = 'subscript';
    $buttons[] = 'underline';
    $buttons[] = 'removeformat';

	return $buttons;
}
add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );