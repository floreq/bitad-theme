<?php

/**
 * The template for displaying the 404 template in the Bitad theme.
 *
 * @since Bitad 1.0
 */

get_header();
?>

<main>
	<div class="wp-block-group bitad-404 bitad-center">
		<div class="wp-block-group__inner-container">
			<h1 class="has-text-align-center">Coś poszło nie tak...</h1>
			<p class="has-text-align-center bitad-hero-subtitle">Strona której szukasz nie istnieje. Sprawdź adres URL pod względem literówek. Jeśli nadal masz problem to spróbuj wrócić na stronę główną konferencji.</p>
			<div class="wp-block-buttons aligncenter">
				<div class="wp-block-button bitad-hero-button is-style-outline"><a class="wp-block-button__link has-text-color" href="/" style="border-radius:16px;color:#4093cd"><strong>Strona Główna</strong></a></div>
			</div>
		</div>
	</div>
</main>

<?php get_template_part('template-parts/footer-menus-widgets'); ?>

<?php
get_footer();
