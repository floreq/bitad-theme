<?php

/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @since Bitad 1.0
 */
?>

<footer class="bitad-footer">
	<div class="bitad-container">
		<?php get_template_part('template-parts/footer-widgets'); ?>
		<div class="bitad-copyrights">
			<ul class="bitad-nav-links">
				<?php
				wp_nav_menu(
					array(
						'container'  => '',
						'items_wrap' => '%3$s',
						'theme_location' => 'footer-copyrights-menu',
					)
				);
				?>
			</ul>
			<?php
			/* translators: Copyright date format, see https://www.php.net/date */
			echo "© " . date_i18n(
				_x('Y', 'copyright date format', 'bitad')
			) . " " . get_theme_mod("company_name") . ". Wszelkie prawa zastrzeżone";
			?>

		</div>
	</div>

	<?php wp_footer(); ?>
</footer>
</body>

</html>