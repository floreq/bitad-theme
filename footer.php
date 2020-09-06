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
	</div>
	<?php wp_footer(); ?>
</footer>
</body>
</html>