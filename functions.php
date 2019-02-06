<?php
/**
 * Geoff Portfolio functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @package Geoff_Portfolio
 * @subpackage Geoff_Portfolio_Theme
 * @since Geoff Portfolio 1.0
 */

 /**
  * Debugging
  */
 // error_reporting(-1);
 // ini_set('display_errors', 1);

 /**
  * Production
  */
 error_reporting(0);
 ini_set('display_errors', 0);

 if (! function_exists('port_setup')):
 	function port_setup(){
 		/**
 		 * Load custom theme languages here to be used across the theme files
 		 * where like $language = __('Some string', 'port');
 		 */
 		load_theme_textdomain( 'port', get_template_directory() . '/languages' );


 		/**
 		 * Uncomment this code in order to add a theme Header Image in the customizer
 		 * section of the WordPress Dashboard
 		 */
 		// $theme_header = array(
 		// 	'default-image' => 'https://via.placeholder.com/1920x300?text=No+Header+Image+Please+Choose+One',
 		// 	'uploads' 		=> true,
 		// 	'header-text'	=> 'Header-image',
 		// 	'width' 		=> 1920,
 		// 	'height' 		=> 300,
 		// 	'flex-width' 	=> true,
 		// 	'flex-height' 	=> true
 		// );

 		// add_theme_support('custom-header', $theme_header);
 	}
 	add_action('after_setup_theme', 'port_setup');
 endif;

 /**
  * [enqueue_port_scripts description]
  *
  */
 if (! function_exists('enqueue_port_scripts')):
 	/**
 	 * [enqueue_port_scripts description]
 	 * @return [type] [description]
 	 */
 	function enqueue_port_scripts(){
 		//Get the theme stylesheet
 		wp_enqueue_style('style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));
 		//Get the theme javascript file
 		wp_enqueue_script('port_scripts', get_template_directory_uri() . '/includes/js/port_scripts.js', array(), null);
 	}
 	add_action('wp_enqueue_scripts', 'enqueue_port_scripts');

 endif;

/**
 * [enable_port_menus description]
 */
if (! function_exists('enable_port_menus')):
	/**
	 * [enable_port_menus description]
	 * @return [type] [description]
	 */
	function enable_port_menus(){
		register_nav_menus(
			array(
				'main-menu' =>__('Main-Nav Menu'),
				'footer-menu' => __('Footer Menu')
			)
		);
	}
	add_action('init', 'enable_port_menus');
endif;

/**
 * [get_head description]
 *
 */
if (! function_exists('get_head')):
	/**
	 * [get_head description]
	 * @param  [type] $name [description]
	 * @return [type]       [description]
	 */
	function get_head( $name = null )
	{
	    do_action( 'get_head', $name );
	    $templates = array();
	    $name = (string) $name;
	    if ( '' !== $name )
	    {
	        $templates[] = "head-{$name}.php";
	    }
	    $templates[] = 'head.php';
	    if ('' == locate_template($templates, true))
	    {
	        load_template( ABSPATH . WPINC . '/theme-compat/head.php');
	    }
	}
endif;

/**
 * [port_widget_init description]
 *
 */
if (! function_exists('port_widget_init')):
	/**
	 * [port_widget_init description]
	 * @return [type] [description]
	 */
	function port_widget_init(){
		register_sidebar(
			array(
				'name'			=>	__('Footer-Left', 'port'),
				'id'			=>	'footer-1',
				'description'	=>	__('Add widgets here to appear in the footer', 'port'),
				'before_widget'	=>	'<div class="foot-col" id="foot-col-1">',
				'after_widget'	=>	'</div>',
				'before_title'	=>	'<h2>',
				'after_title'	=>	'</h2>'
			)
		);
		register_sidebar(
			array(
				'name'			=>	__('Footer-Mid', 'port'),
				'id'			=>	'footer-2',
				'description'	=>	__('Add widgets here to appear in the footer', 'port'),
				'before_widget'	=>	'<div class="foot-col" id="foot-col-1">',
				'after_widget'	=>	'</div>',
				'before_title'	=>	'<h2>',
				'after_title'	=>	'</h2>'
			)
		);
		register_sidebar(
			array(
				'name'			=>	__('Footer-Right', 'port'),
				'id'			=>	'footer-3',
				'description'	=>	__('Add widgets here to appear in the footer', 'port'),
				'before_widget'	=>	'<div class="foot-col" id="foot-col-1">',
				'after_widget'	=>	'</div>',
				'before_title'	=>	'<h2>',
				'after_title'	=>	'</h2>'
			)
		);
	}
	add_action('widgets_init', 'port_widget_init');
endif;


/**
 * ====================== Require Files =============================
 */

/**
 * Include special IDX functions
 */
require get_template_directory() . '/includes/port_template_tags.php';

/**
 * Include port Custom options through Customizer API
 */
require get_template_directory() . '/includes/customizer.php';
