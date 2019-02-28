<!DOCTYPE html>
<html <?php language_attributes();?> >

<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 *
 * @package Geoff_Portfolio
 * @subpackage Geoff_Portfolio_Theme
 * @since Geoff Portfolio 1.0
 */
?>
<?php get_head('head');?>
<body <?php body_class();?>>
<div id="left">
<?php get_header();?>
<?php get_sidebar(); ?>
</div>
<div id="wrapper">
<p>Home Page</p>
<div id="content">
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
		get_template_part('template-parts/content/content', 'home');
	}
}
else {
	get_template_part('template-parts/content/content', 'none');
}
?>
</div>
<?php get_footer(); ?>
</div>
</body>
</html>
