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
		'widgets'     => array(
			// Place one core-defined widgets in the first footer widget area.
			'footer' => array(
				'text_about0'         => array(
					'nav_menu',
					array(
						'title'  => _x( 'Reset', 'bitad' ),
						'text'   => _x( '', 'bitad' ),
					),
					'filter' => true,
					'visual' => true,
				),
				'text_about1'         => array(
					'media_gallery',
					array(
						'title'  => _x( 'Patroni', 'bitad' ),
						'text'   => _x( '', 'bitad' ),
					),
					'filter' => true,
					'visual' => true,
				),
				'text_about2' => array(
					'text',
					array(
						'title'  => _x( 'Dane kontaktowe', 'bitad' ),
						'text'   => join(
							'',
							array(
								_x( 'Reset,', 'bitad' ) . "\n" . _x( 'Willowa 2,', 'bitad' ) . "\n" . _x( 'Bielsko-Biała 43-300', 'bitad' ) . "\n\n",
								'<a class="mail" href="mailto:reset@ath.bielsko.pl">' . _x( 'reset@ath.bielsko.pl', 'bitad' ) . '</a>',
							)
						),
						'filter' => true,
						'visual' => true,
					),
				),
				'text_about3'         => array(
					'text',
					array(
						'title'  => _x( 'Dołącz do nas', 'bitad' ),
						'text'   => join(
							'',
							array(
								_x( 'Zarejestruj się i zostań uczestnikiem konferencji Beskid IT Academic Day już teraz. Nie zwlekaj, miejsca są ograniczone.', 'bitad' ) . "\n\n",
								'<a class="bitad-button" href="' . get_site_url() . '/rejestracja">' . _x( 'Rejestracja', 'bitad' ) . '</a>',
							)
						),
						'filter' => true,
						'visual' => true,
					),
				),
				'text_about4'         => array(
					'text',
					array(
						'title'  => _x( 'Poznaj nas bliżej!', 'bitad' ),
						'text'   => _x( 'Znajdziesz nas również w mediach społecznościowych.', 'bitad' ),
						'filter' => true,
						'visual' => true,
					),
				),
			)
		),
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
						'<div class="wp-block-image bitad-hero-image"><figure class="aligncenter is-resized"><img src="'. get_theme_file_uri() . '/assets/images/bitad-logo.svg" alt="Bitad Logo" width="717" height="333"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:paragraph {"align":"center","className":"bitad-hero-subtitle"} -->',
						'<p class="has-text-align-center bitad-hero-subtitle">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:heading {"align":"center","level":1} -->',
						'<h1 class="has-text-align-center">Konferencja Informatyczna</h1>',
						'<!-- /wp:heading -->',
						'<!-- wp:buttons {"align":"center"} -->',
						'<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":16,"style":{"color":{"text":"#4093cd"}},"className":"bitad-hero-button is-style-outline"} -->',
						'<div class="wp-block-button bitad-hero-button is-style-outline"><a class="wp-block-button__link has-text-color" href="'. get_site_url() .'/rejestracja" style="border-radius:16px;color:#4093cd"><strong>Zapisz się już teraz!</strong></a></div>',
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
						'<div class="wp-block-image is-style-default bitad-image-indicator bitad-image-shadow"><figure class="aligncenter"><img src="'. get_theme_file_uri() .'/assets/images/lecture.jpg" alt=""/></figure></div>',
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
						'<div class="wp-block-image is-style-default"><figure class="aligncenter is-resized"><img src="'. get_theme_file_uri() .'/assets/images/gift.svg" alt="Gift" width="47" height="44"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":3} -->',
						'<h3 class="has-text-align-center">Powitalnej paczki</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Dlatego każdy z Was zaraz po potwierdzeniu swojej obecności na konferencji będzie czekała powitalna paczka.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="'. get_site_url() .'/szczegoly">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"className":"bitad-element bitad-shadow"} -->',
						'<div class="wp-block-column bitad-element bitad-shadow"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":82,"height":44,"className":"is-style-default"} -->',
						'<div class="wp-block-image is-style-default"><figure class="aligncenter is-resized"><img src="'. get_theme_file_uri() .'/assets/images/gift.svg" alt="Keyboard" width="82" height="44"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":3} -->',
						'<h3 class="has-text-align-center">Warsztatów</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Warsztaty mają na celu zaprezentowanie podstaw tematów będących na czasie w praktyce.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="'. get_site_url() .'/szczegoly">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"className":"bitad-element bitad-shadow"} -->',
						'<div class="wp-block-column bitad-element bitad-shadow"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:image {"align":"center","width":90,"height":44,"className":"is-style-default"} -->',
						'<div class="wp-block-image is-style-default"><figure class="aligncenter is-resized"><img src="'. get_theme_file_uri() .'/assets/images/gift.svg" alt="Gamepad" width="90" height="44"/></figure></div>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"align":"center","level":3} -->',
						'<h3 class="has-text-align-center">Gry QR Code</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">Baw się z nami i zdobywaj punkty podczas udziału w prelekcjach i warsztatach.</p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="'. get_site_url() .'/szczegoly">Dowiedz się więcej</a></p>',
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
						'<div class="wp-block-image"><figure class="aligncenter"><img src="'. get_theme_file_uri() .'/assets/images/workshop.jpg" alt="Workshop"/></figure></div>',
						'<!-- /wp:image --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-section half-neutral"} -->',
						'<div id="sponsorzy" class="wp-block-group bitad-section half-neutral"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-reverse"} -->',
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
						'<div class="wp-block-image is-style-rounded"><figure class="alignright size-large is-resized"><img src="'. get_theme_file_uri() .'/assets/images/default-profile-photo.png" alt="" width="68" height="68"/></figure></div>',
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
						'<div class="wp-block-image is-style-rounded"><figure class="alignright size-large is-resized"><img src="'. get_theme_file_uri() .'/assets/images/default-profile-photo.png" alt="" width="68" height="68"/></figure></div>',
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
						'<div class="wp-block-image is-style-rounded"><figure class="alignright size-large is-resized"><img src="'. get_theme_file_uri() .'/assets/images/default-profile-photo.png" alt="" width="68" height="68"/></figure></div>',
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
			'primary-menu'  => array(
				'name'  => __('Primary Menu', 'bitad'),
				'items' => array(
					'link_home'	=> array(
						'type'  => 'custom',
						'title' => _x( 'O konferencji', 'bitad' ),
						'url'   => home_url( '/' ),
					),
					'anchor_sponsors'       => array(
						'type'  => 'custom',
						'title' => _x( 'Sponsorzy', 'bitad' ),
						'url'   => get_site_url() . "/#sponsorzy",
					),
					'page_agenda'	=> array(
						'type'  => 'custom',
						'title' 	=> _x( 'Agenda', 'bitad' ),
						'url'   	=> get_site_url() . "/agenda",
					),
					'page_registration' => array(
						'type'  => 'custom',
						'title' 		=> _x( 'Rejestracja', 'bitad' ),
						'url'   		=> get_site_url() . "/rejestracja",
						'classes' 		=> 'bitad-button',
					),
				),
			),
			'footer-menu'  => array(
				'name'  => __('Footer Menu', 'bitad'),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
				),
			),
		),
	);

	// Change permalink setting
	// https://www.isitwp.com/set-permalink-settings-from-functions-php/
	function set_permalink(){
		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure('/%postname%/');
	}
	add_action('init', 'set_permalink');

	/**
	 * Filters Bitad array of starter content.
	 *
	 * @since Bitad 1.0
	 *
	 * @param array $starter_content Array of starter content.
	 */
	return apply_filters('bitad_starter_content', $starter_content);
}
