<?php

/**
 * Bitad Starter Content
 *
 * @link https://make.wordpress.org/core/2016/11/30/starter-content-for-themes-in-4-7/
 * 
 * @since Bitad 1.0
 */

/**
 * Function to return the array of starter content for the theme.
 *
 * Passes it through the `bitad_starter_content` filter before returning.
 *
 * @since Bitad 1.0
 *
 * @return array A filtered array of args for the starter_content.
 */
function bitad_get_starter_content()
{
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'conference' => array(
				'post_type'    => 'page',
				'post_title'   => __('O konferencji', 'bitad'),
				'post_content' => join(
					'',
					array(
						'<!-- wp:group {"className":"bitad-hero"} -->',
						'<div class="wp-block-group bitad-hero"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":717,"height":333,"className":"bitad-hero-image"} -->',
						'<div class="wp-block-image bitad-hero-image"><figure class="aligncenter is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/bitad-logo.svg" alt="Bitad Logo" width="717" height="333"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:paragraph {"align":"center","className":"bitad-hero-subtitle"} -->',
						'<p class="has-text-align-center bitad-hero-subtitle">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading {"align":"center","level":1} -->',
						'<h1 class="has-text-align-center">Konferencja Informatyczna</h1>',
						'<!-- /wp:heading -->',
						'<!-- wp:buttons {"align":"center"} -->',
						'<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":16,"style":{"color":{"text":"#4093cd"}},"className":"bitad-hero-button is-style-outline"} -->',
						'<div class="wp-block-button bitad-hero-button is-style-outline"><a class="wp-block-button__link has-text-color" href="http://localhost:8000/rejestracja" style="border-radius:16px;color:#4093cd"><strong>Zapisz się już teraz!</strong></a></div>',
						'<!-- /wp:button --></div>',
						'<!-- /wp:buttons --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-section"} -->',
						'<div class="wp-block-group bitad-section"><div class="wp-block-group__inner-container"><!-- wp:columns -->',
						'<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"top"} -->',
						'<div class="wp-block-column is-vertically-aligned-top"><!-- wp:heading -->',
						'<h2>Spotykamy się już<br>kolejny, 10 raz</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column"><!-- wp:image {"align":"center","className":"is-style-default bitad-image-indicator bitad-image-shadow"} -->',
						'<div class="wp-block-image is-style-default bitad-image-indicator bitad-image-shadow"><figure class="aligncenter"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/lecture.jpg" alt=""/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-section half-gray"} -->',
						'<div class="wp-block-group bitad-section half-gray"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">Możesz się u nas spodziewać*</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center","className":"half-right"} -->',
						'<p class="has-text-align-center half-right">*Oczywiście również o wiele, wiele więcej.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-elements"} -->',
						'<div class="wp-block-columns bitad-elements"><!-- wp:column {"className":"bitad-element bitad-shadow"} -->',
						'<div class="wp-block-column bitad-element bitad-shadow"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":47,"height":44,"className":"is-style-default"} -->',
						'<div class="wp-block-image is-style-default"><figure class="aligncenter is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gift.svg" alt="Gift" width="47" height="44"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":3} -->',
						'<h3 class="has-text-align-center">Powitalnej paczki</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Dlatego każdy z Was zaraz po potwierdzeniu swojej obecności na konferencji będzie czekała powitalna paczka.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/szczegoly" data-type="page" data-id="7">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"className":"bitad-element bitad-shadow"} -->',
						'<div class="wp-block-column bitad-element bitad-shadow"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":82,"height":44,"className":"is-style-default"} -->',
						'<div class="wp-block-image is-style-default"><figure class="aligncenter is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gift.svg" alt="Keyboard" width="82" height="44"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":3} -->',
						'<h3 class="has-text-align-center">Warsztatów</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Warsztaty mają na celu zaprezentowanie podstaw tematów będących na czasie w praktyce.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/szczegoly" data-type="page" data-id="7">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"className":"bitad-element bitad-shadow"} -->',
						'<div class="wp-block-column bitad-element bitad-shadow"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":90,"height":44,"className":"is-style-default"} -->',
						'<div class="wp-block-image is-style-default"><figure class="aligncenter is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gift.svg" alt="Gamepad" width="90" height="44"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":3} -->',
						'<h3 class="has-text-align-center">Gry QR Code</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Baw się z nami i zdobywaj punkty podczas udziału w prelekcjach i warsztatach.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/szczegoly" data-type="page" data-id="7">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-section bitad-center"} -->',
						'<div class="wp-block-group bitad-section bitad-center"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">Ciągle rozwijamy się dla Ciebie</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:image {"align":"center"} -->',
						'<div class="wp-block-image"><figure class="aligncenter"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/workshop.jpg" alt="Workshop"/></figure></div>',
						'<!-- /wp:image --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-section half-neutral"} -->',
						'<div id="sponsors" class="wp-block-group bitad-section half-neutral"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-reverse"} -->',
						'<div class="wp-block-columns bitad-reverse"><!-- wp:column -->',
						'<div class="wp-block-column"><!-- wp:heading {"level":4} -->',
						'<h4>Diamentowi sponsorzy</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:gallery {"ids":[],"columns":0,"imageCrop":false,"sizeSlug":"full","align":"center","className":"bitad-sponsors-gallery"} -->',
						'<figure class="wp-block-gallery aligncenter columns-0  bitad-sponsors-gallery"><ul class="blocks-gallery-grid"></ul></figure>',
						'<!-- /wp:gallery -->',
						'<!-- wp:heading {"level":4} -->',
						'<h4>Złoci sponsorzy</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:gallery {"ids":[],"columns":0,"imageCrop":false,"align":"center","className":"bitad-sponsors-gallery"} -->',
						'<figure class="wp-block-gallery aligncenter columns-0  bitad-sponsors-gallery"><ul class="blocks-gallery-grid"></ul></figure>',
						'<!-- /wp:gallery -->',
						'<!-- wp:heading {"level":4} -->',
						'<h4>Srebrni sponsorzy</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:gallery {"ids":[],"columns":0,"imageCrop":false,"sizeSlug":"full","align":"center","className":"bitad-sponsors-gallery"} -->',
						'<figure class="wp-block-gallery aligncenter columns-0  bitad-sponsors-gallery"><ul class="blocks-gallery-grid"></ul></figure>',
						'<!-- /wp:gallery --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column"><!-- wp:heading -->',
						'<h2>Konferencja jest<br>możliwa dzięki Nim!</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-section bitad-center"} -->',
						'<div class="wp-block-group bitad-section bitad-center"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">Organizatorzy</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-organizers"} -->',
						'<div class="wp-block-columns bitad-organizers"><!-- wp:column {"className":"bitad-organizer bitad-shadow"} -->',
						'<div class="wp-block-column bitad-organizer bitad-shadow"><!-- wp:columns {"verticalAlignment":"center","className":"bitad-organizer-profile"} -->',
						'<div class="wp-block-columns are-vertically-aligned-center bitad-organizer-profile"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"right","width":68,"height":68,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignright size-large is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/default-profile-photo.png" alt="" width="68" height="68"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>student</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading {"level":4} -->',
						'<h4>Monika Kowalska</h4>',
						'<!-- /wp:heading --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"className":"bitad-organizer bitad-shadow"} -->',
						'<div class="wp-block-column bitad-organizer bitad-shadow"><!-- wp:columns {"verticalAlignment":"center","className":"bitad-organizer-profile"} -->',
						'<div class="wp-block-columns are-vertically-aligned-center bitad-organizer-profile"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"right","width":68,"height":68,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignright size-large is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/default-profile-photo.png" alt="" width="68" height="68"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>student</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading {"level":4} -->',
						'<h4>Monika Kowalska</h4>',
						'<!-- /wp:heading --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"className":"bitad-organizer bitad-shadow"} -->',
						'<div class="wp-block-column bitad-organizer bitad-shadow"><!-- wp:columns {"verticalAlignment":"center","className":"bitad-organizer-profile"} -->',
						'<div class="wp-block-columns are-vertically-aligned-center bitad-organizer-profile"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"right","width":68,"height":68,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignright size-large is-resized"><img src="http://localhost:8000/wp-content/themes/bitad-theme/assets/images/default-profile-photo.png" alt="" width="68" height="68"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>student</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading {"level":4} -->',
						'<h4>Monika Kowalska</h4>',
						'<!-- /wp:heading --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns --></div></div>',
						'<!-- /wp:group -->',
					),
				),
			),
			'agenda' => array(
				'post_type'    => 'page',
				'post_title'   => __('Agenda', 'bitad'),
			),
			'registration' => array(
				'post_type'    => 'page',
				'post_title'   => __('Rejestracja', 'bitad'),
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options'     => array(
			'show_on_front'  => 'page',
			'page_on_front'  => '{{conference}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus'   => array(
			// Assign a menu to the "primary" location.
			'primary'  => array(
				'name'  => __('Primary Menu', 'bitad'),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
				),
			),
		),
	);

	/**
	 * Filters Bitad array of starter content.
	 *
	 * @since Bitad 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters('bitad_starter_content', $starter_content);
	/**
	 * Pre-configure and save a widget, designed for plugin and theme activation.
	 * 
	 * @link    http://wordpress.stackexchange.com/q/138242/1685
	 *
	 * @param   string  $sidebar    The database name of the sidebar to add the widget to.
	 * @param   string  $name       The database name of the widget.
	 * @param   mixed   $args       The widget arguments (optional).
	 */

	function set_widget($sidebar, $name, $args = array())
	{
		if (!$sidebars = get_option('sidebars_widgets'))
			$sidebars = array();

		// Create the sidebar if it doesn't exist.
		if (!isset($sidebars[$sidebar]))
			$sidebars[$sidebar] = array();

		// Check for existing saved widgets.
		if ($widget_opts = get_option("widget_$name")) {
			// Get next insert id.
			ksort($widget_opts);
			end($widget_opts);
			$insert_id = key($widget_opts);
		} else {
			// None existing, start fresh.
			$widget_opts = array('_multiwidget' => 1);
			$insert_id = 0;
		}

		// Add our settings to the stack.
		$widget_opts[++$insert_id] = $args;
		// Add our widget!
		$sidebars[$sidebar][] = "$name-$insert_id";

		update_option('sidebars_widgets', $sidebars);
		update_option("widget_$name", $widget_opts);
	}
	set_widget(
		'footer',
		'nav_menu',
		array(
			'title' => 'Reset',
			'filter' => false,
		)
	);
	set_widget(
		'footer',
		'media_gallery',
		array(
			'title' => 'Reset',
			'filter' => false,
		)
	);
	set_widget(
		'footer',
		'text',
		array(
			'title' => 'Dane kontaktowe',
			'text' => "Reset,\nWillowa 2,\nBielsko-Biała 43-300\n\n<a class=\"mail\" href=\"mailto:reset@ath.bielsko.pl\">reset@ath.bielsko.pl</a>",
			'filter' => false,
		)
	);
	set_widget(
		'footer',
		'text',
		array(
			'title' => 'Dołącz do nas',
			'text' => "Zarejestruj się i zostań uczestnikiem konferencji Beskid IT Academic Day już teraz. Nie zwlekaj, miejsca są ograniczone.\n\n<a class=\"bitad-button\" href=\"http://localhost:8000/rejestracja/\">Rejestracja</a>",
			'filter' => false,
		)
	);
	set_widget(
		'footer',
		'text',
		array(
			'title' => 'Poznaj nas bliżej!',
			'text' => "Znajdziesz nas również w mediach społecznościowych.",
			'filter' => false,
		)
	);
}
