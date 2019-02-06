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

if(! function_exists('port_posted_on')):
	function port_posted_on(){
		if('post' === get_post_type()){
			//get the dates
			$time_string = '<p class="entry-info">Published On</p><time class="entry-date published updated" datetime="%1$s">%2$s</time><p class="entry-info">Updated On</p><time class="updated" datetime="%3$s">%4$s</time>';
			if (get_the_time('U')!== get_the_modified_time('U')){
				$time_string = '<p class="entry-info">Published On</p><time class="entry-date published" datetime="%1$s">%2$s</time><p class="entry-info">Updated On</p><time class="updated" datetime="%3$s">%4$s</time>';
			}
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		printf(
			'<span class="entry-dates">%1$s</span>',
			$time_string
		);
	}
endif;

if (! function_exists('port_posted_by')):
	function port_posted_by(){
		printf(
			'<span class="entry-info entry-author">Written By<span class="post-author"><a href="%1$s">%2$s</a></span></span>',
			esc_url( get_author_posts_url(get_the_author_meta('ID'))),
			esc_html(get_the_author())
		);
	}
endif;

if (! function_exists('port_entry_footer')):
	function port_entry_footer() {
		port_posted_on();

		port_posted_by();
	}
endif;

?>
