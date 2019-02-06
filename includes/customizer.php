<?php
/**
 * Geoff Portfolio Customizer Modifications
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
  * This function moves the Header Image into the theme panel
  */
 if (! function_exists('port_customize_register')):
 	/**
 	 * [sbre_customize_register description]
 	 * @param  [type] $wp_customize [description]
 	 * @return [type]               [description]
 	 */
 	function port_customize_register($wp_customize) {
 		// $wp_customize->get_section('header_image')->panel = 'sbre_main_options';
 		// $wp_customize->get_section('header_image')->title = 'Home page image';
 	}
 	add_action('customize_register', 'port_customize_register');
 endif;
