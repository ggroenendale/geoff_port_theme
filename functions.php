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

