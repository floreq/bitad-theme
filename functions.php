<?php

/**
 * Bitad functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

// require_once __DIR__ . '/includes/acf-fields.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bitad_theme_support()
{
	/**
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support('title-tag');

	/**
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'script',
			'style',
		)
	);

	/** 
	 * Add theme support for selective refresh for widgets.
	 * Available blue pen (edit on page) when in Customize Mode.
	 */
	add_theme_support('customize-selective-refresh-widgets');

	// Add support for responsive embeds.
	add_theme_support('responsive-embeds');

	/**
	 * Adds starter content to highlight the theme on fresh sites.
	 * This is done conditionally to avoid loading the starter content on every
	 * page load, as it is a one-off operation only needed once in the customizer.
	 */
	if (is_customize_preview()) {
		require get_template_directory() . '/include/starter-content.php';
		add_theme_support('starter-content', bitad_get_starter_content());
	}

	/**
	 * Add support for core custom logo.
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 43,
			'width'       => 109,
			'flex-width'  => false,
			'flex-height' => false,
		)
	);
}
add_action('after_setup_theme', 'bitad_theme_support');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bitad_setup()
{
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'primary' => __('Primary Menu', 'bitad'),
			'footer' => __('Footer Menu', 'bitad'),
			'social' => __('Social Links Menu', 'bitad'),
		)
	);

	/**
	 * Add Extra Settings to Customizer Sections
	 *
	 * @link https://wordpress.stackexchange.com/questions/136106/adding-checkbox-to-theme-customizer
	 */
	function bitad_customize($wp_customize)
	{
		$wp_customize->add_section(
			'theme_options',
			array(
				'title' => 'Theme Options',
			)
		);

		$wp_customize->add_setting(
			'enable_registration_link',
			array(
				'default'	=> true,
				'transport'	=> 'postMessage'
			)
		);

		$wp_customize->add_control(
			'enable_registration_link',
			array(
				'section'	=> 'theme_options',
				'label'   	=> 'Show Registration Link',
				'type'      => 'checkbox'
			)
		);
	}
	add_action('customize_register', 'bitad_customize');
}
add_action('after_setup_theme', 'bitad_setup');

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bitad_sidebar_registration()
{
	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h4>',
		'after_title'   => '</h4>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __('Footer', 'bitad'),
				'id'          => 'footer',
				'description' => __('Widgets in this area will be displayed in the first column in the footer.', 'bitad'),
			)
		)
	);
}

add_action('widgets_init', 'bitad_sidebar_registration');

/**
 * Register and Enqueue Styles.
 */
function bitad_register_styles()
{

	$theme_version = wp_get_theme()->get('Version');
	wp_enqueue_style('style', get_stylesheet_uri(), array(), $theme_version);

	// wp_enqueue_style( 'style-name', get_stylesheet_uri() );
	wp_enqueue_style('style', get_template_directory_uri(), array(), $theme_version, 'all');
	wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css', null, $theme_version, 'all');
	wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css', null, $theme_version, 'all');
	wp_enqueue_style('typography', get_template_directory_uri() . '/assets/css/typography.css', null, $theme_version, 'all');
}
add_action('wp_enqueue_scripts', 'bitad_register_styles');

/**
 * Enqueue supplemental block editor styles.
 */
function bitad_block_editor_styles()
{

	// Enqueue the editor styles.
	wp_enqueue_style('bitad-block-editor-styles', get_theme_file_uri('/assets/css/editor-style-block.css'), array(), wp_get_theme()->get('Version'), 'all');
}

add_action('enqueue_block_editor_assets', 'bitad_block_editor_styles', 1, 1);

function bitad_register_block_patterns()
{

	if (class_exists('WP_Block_Patterns_Registry')) {
		// Register custom category
		register_block_pattern_category(
			'bitad_paterns',
			array('label' => __('Bitad Paterns', 'bitad'))
		);
		// Registe custom patterns
		register_block_pattern(
			'bitad/main_hero',
			array(
				'title'       	=> __('Main Hero', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  	=> array('bitad_paterns'),
				'content'		=> "<!-- wp:group {\"className\":\"bitad-hero\"} -->\n<div class=\"wp-block-group bitad-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":717,\"height\":333,\"className\":\"bitad-hero-image\"} -->\n<div class=\"wp-block-image bitad-hero-image\"><figure class=\"aligncenter is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.svg" . "\" alt=\"Bitad Logo\" width=\"717\" height=\"333\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"bitad-hero-subtitle\"} -->\n<p class=\"has-text-align-center bitad-hero-subtitle\">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":1} -->\n<h1 class=\"has-text-align-center\">Konferencja Informatyczna</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":16,\"style\":{\"color\":{\"text\":\"#4093cd\"}},\"className\":\"bitad-hero-button is-style-outline\"} -->\n<div class=\"wp-block-button bitad-hero-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" href=\"" . get_site_url() . "/rejestracja" . "\" style=\"border-radius:16px;color:#4093cd\"><strong>Zapisz się już teraz!</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons -->\n\n</div></div>\n<!-- /wp:group -->"
				// 'content'		=> "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image -->\n<figure class=\"wp-block-image\"><img src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.svg" . "\" alt=\"Bitad Logo\"/></figure>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":1} -->\n<h1 class=\"has-text-align-center\">Konferencja Informatyczna</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":16,\"className\":\"is-style-outline\"} -->\n<div class=\"wp-block-button is-style-outline\"><a class=\"wp-block-button__link\" href=\"" . get_site_url() . "/rejestracja" . "\" style=\"border-radius:16px\">Zapisz się już teraz!</a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/text_&_image',
			array(
				'title'       	=> __('Text & Image', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Spotykamy się już<br>kolejny, 10 raz</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter\"><img src=\"" . get_theme_file_uri() . "/assets/images/lecture.jpg" . "\" alt=\"Lecture\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-section\"} -->\n<div class=\"wp-block-group bitad-section\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"className\":\"bitad-container\"} -->\n<div class=\"wp-block-columns bitad-container\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Spotykamy się już<br>kolejny, 10 raz</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image is-style-rounded\"><img src=\"" . get_theme_file_uri() . "/assets/images/lecture.jpg" . "\" alt=\"Lecture\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/elements',
			array(
				'title'       	=> __('Elements'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'	=> array('bitad_paterns'),
				'content'		=> "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Możesz się u nas spodziewać*</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>*Oczywiście również o wiele, wiele więcej.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":47,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gift.svg\" alt=\"Gift\" width=\"47\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Powitalnej paczki</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Dlatego każdy z Was zaraz po potwierdzeniu swojej obecności na konferencji będzie czekała powitalna paczka.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"http://localhost:8000/rejestracja/\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":82,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"http://localhost:8000/wp-content/themes/bitad-theme/assets/images/keyboard.svg\" alt=\"Keyboard\" width=\"82\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Warsztatów</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Warsztaty mają na celu zaprezentowanie podstaw tematów będących na czasie w praktyce.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"http://localhost:8000/rejestracja/\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":90,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gamepad.svg\" alt=\"Gamepad\" width=\"90\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Gry QR Code</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Baw się z nami i zdobywaj punkty podczas udziału w prelekcjach i warsztatach.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"http://localhost:8000/rejestracja/\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/center',
			array(
				'title'       	=> __('Center'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  => array('bitad_paterns'),
				'content'		=> "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Ciągle rozwijamy się dla Ciebie</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter\"><img src=\"" . get_theme_file_uri() . "/assets/images/workshop.jpg" . "\" alt=\"Workshop\"/></figure></div>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/sponsors',
			array(
				'title'       	=> __('Sponsors'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  => array('bitad_paterns'),
				'content'		=> "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":4} -->\n<h4>Diamentowi sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"columns\":0,\"imageCrop\":false,\"sizeSlug\":\"full\"} -->\n<figure class=\"wp-block-gallery columns-0\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Złoci sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"imageCrop\":false} -->\n<figure class=\"wp-block-gallery columns-0\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Srebrni sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery -->\n<figure class=\"wp-block-gallery columns-0 is-cropped\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":2} -->\n<h2>Konferencja jest<br>możliwa dzięki Nim!</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
			)
		);
		register_block_pattern(
			'bitad/organizers',
			array(
				'title'       	=> __('Organizers', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  => array('bitad_paterns'),
				'content'		=> "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":150,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalski</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":150,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalski</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":150,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalski</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
			)
		);
		register_block_pattern(
			'bitad/agenda',
			array(
				'title'       	=> __('Agenda', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  => array('bitad_paterns'),
				'content'		=> "<!-- wp:html -->\n<script src=\"" . get_theme_file_uri() . "/assets/js/timeline.js" . "\"></script>\n<div class=\"bitad-hero\">123</div>\n<!-- /wp:html -->",
			)
		);
	}
}
add_action('init', 'bitad_register_block_patterns');


// <img src="' . get_theme_file_uri() . '/assets/images/2020-three-quarters-3.png"
// echo "src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.png\"";
// echo get_site_url();
