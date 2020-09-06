<?php

/**
 * Header file for the Bitad theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<header>
		<?php
		if (has_nav_menu('primary-menu')) {
		?>
			<nav class="bitad-nav">
				<div class="bitad-container">
					<?php the_custom_logo(); ?>
					<ul class="bitad-nav-links">
						<?php
						wp_nav_menu(
							array(
								'container'  => '',
								'items_wrap' => '%3$s',
								'theme_location' => 'primary-menu',
							)
						);
						?>
					</ul>
					<div id="bitad-hamburger">
						<div class="bitad-hamburger-inner"></div>
					</div>
				</div>
			</nav>
		<?php
		}
		?>
	</header>