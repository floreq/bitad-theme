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
		if (has_nav_menu('primary')) {
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
								'theme_location' => 'primary',
							)
						);
						$enable_registration_link = get_theme_mod('enable_registration_link', true);
						if (true === $enable_registration_link) {
						?>
							<li class="menu-item">
								<a href="<?php print(get_permalink(get_page_by_path('rejestracja')));  ?>" class="bitad-button">Rejestracja</a>
							</li>
						<?php
						}
						?>
					</ul>
				</div>

			</nav>
		<?php
		}
		?>
	</header>