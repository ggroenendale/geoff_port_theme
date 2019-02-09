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
<div id="content">
    <p>Some content</p>
<?php
if (have_posts()) {
	while (have_posts()) {
		the_post();
		get_template_part('template-parts/content/content');
	}
}
else {
	get_template_part('template-parts/content/content', 'none');
}
$args = array(
    'post_type' => 'port_gallery'
);
$query = new WP_Query($args);

if($query->have_posts()){
    echo '<ul>';
    while($query->have_posts()){
        $query->the_post();
        ?>
        <li>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>">
                <?php the_title();?>
            </a>
        </li>
        <?php
    }
    echo '</ul>';
}
wp_reset_postdata();
?>
</div>
<?php get_footer(); ?>
</div>
</body>
</html>
