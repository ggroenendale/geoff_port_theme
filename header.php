<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package Geoff_Portfolio
 * @subpackage Geoff_Portfolio_Theme
 * @since Geoff Portfolio 1.0
 */
?>
<header>
	<div id="logo">

		<?php
			$logo_src = wp_get_attachment_image_url(get_theme_mod('port_logo'), 'full');
			if (!empty($logo_src)) {
				echo '<a class="logo-a" href="' . esc_url(home_url('/')) . '"><img id="logo" src="' . $logo_src . '"></a>';
			}
			else {
				echo '<a class="logo-a" href="' . esc_url(home_url('/')) . '">' . $logo_src . '<img src="https://via.placeholder.com/100x100?text=LogoPH"></a>';
			}
		?>
	</div>
	<nav>
        <?php wp_nav_menu(array('theme_location' => 'main-menu')); ?>
    </nav>
</header>
