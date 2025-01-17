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
			'primary-menu' 				=> __('Primary Menu', 'bitad'),
			'footer-menu' 				=> __('Footer Menu', 'bitad'),
			'footer-copyrights-menu' 	=> __('Footer Copyrights Menu', 'bitad'),
		)
	);
}
add_action('after_setup_theme', 'bitad_setup');

/**
 * Add Extra Settings to Customizer Sections
 *
 * @link https://wordpress.stackexchange.com/questions/309981/adding-a-custom-field-to-the-site-identity-menu
 */
function bitad_customize_register($wp_customize)
{

	$wp_customize->add_setting('company_name', array(
		'default' 		=> '',
		'type' 			=> 'theme_mod',
		'capability' 	=> 'edit_theme_options'
	));
	$wp_customize->add_control(new WP_Customize_Control(
		$wp_customize,
		'company_control',
		array(
			'label'      	=> __('Company Name', 'birad'),
			'description'	=> __('Displayed on Footer Copyrights', 'bitad'),
			'section'   	=> 'title_tagline',
			'settings'   	=> 'company_name',
			'default'  		=> 'Reset',
			'priority'   	=> 10,
		)
	));
}
add_action('customize_register', 'bitad_customize_register');

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

	wp_enqueue_style('style', get_stylesheet_uri(), array(), $theme_version, 'all');
	wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css', null, $theme_version, 'all');
	wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css', null, $theme_version, 'all');
	wp_enqueue_style('typography', get_template_directory_uri() . '/assets/css/typography.css', null, $theme_version, 'all');
}
add_action('wp_enqueue_scripts', 'bitad_register_styles');

/**
 * Register and Enqueue Scripts.
 */
function bitad_footer_register_scripts()
{

	$theme_version = wp_get_theme()->get('Version');

	wp_enqueue_script('hamburger-menu', get_template_directory_uri() . '/assets/js/hamburger-menu.js', array(), $theme_version, false);
}

add_action('wp_footer', 'bitad_footer_register_scripts');

/**
 * Enqueue supplemental block editor styles.
 */
function bitad_block_editor_styles()
{
	// Enqueue the editor styles.
	wp_enqueue_style('bitad-block-editor-styles', get_theme_file_uri('/assets/css/editor-style-block.css'), array(), wp_get_theme()->get('Version'), 'all');
	// wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/css/fonts.css', null, $theme_version, 'all');
	// wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css', null, $theme_version, 'all');
	// wp_enqueue_style('typography', get_template_directory_uri() . '/assets/css/typography.css', null, $theme_version, 'all');
}

add_action('enqueue_block_editor_assets', 'bitad_block_editor_styles', 1, 1);

// Helpful tool https://onlinestringtools.com/escape-string
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
				'content'		=> "<!-- wp:group {\"className\":\"bitad-hero\"} -->\n<div class=\"wp-block-group bitad-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":379,\"height\":333,\"className\":\"bitad-hero-image\"} -->\n<div class=\"wp-block-image bitad-hero-image\"><figure class=\"aligncenter is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.svg" . "\" alt=\"Bitad Logo\" width=\"379\" height=\"333\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"bitad-hero-subtitle\"} -->\n<p class=\"has-text-align-center bitad-hero-subtitle\">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":1} -->\n<h1 class=\"has-text-align-center\">Konferencja Informatyczna</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"center\"} -->\n<div class=\"wp-block-buttons aligncenter\"><!-- wp:button {\"borderRadius\":16,\"style\":{\"color\":{\"text\":\"#4093cd\"}},\"className\":\"bitad-hero-button is-style-outline\"} -->\n<div class=\"wp-block-button bitad-hero-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" href=\"" . get_site_url() . "/rejestracja" . "\" style=\"border-radius:16px;color:#4093cd\"><strong>Zapisz się już teraz!</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div></div>\n<!-- /wp:group -->\n",
			)
		);
		register_block_pattern(
			'bitad/small_hero',
			array(
				'title'       	=> __('Small Hero', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:group {\"className\":\"bitad-small-hero\"} -->\n<div class=\"wp-block-group bitad-small-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"className\":\"bitad-two-columns bitad-reverse\"} -->\n<div class=\"wp-block-columns bitad-two-columns bitad-reverse\"><!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:paragraph {\"className\":\"bitad-hero-subtitle\"} -->\n<p class=\"bitad-hero-subtitle\">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":1} -->\n<h1>Konferencja Informatyczna</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"left\"} -->\n<div class=\"wp-block-buttons alignleft\"><!-- wp:button {\"borderRadius\":16,\"style\":{\"color\":{\"text\":\"#4093cd\"}},\"className\":\"bitad-hero-button is-style-outline\"} -->\n<div class=\"wp-block-button bitad-hero-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" href=\"" . get_site_url() . "/rejestracja" . "\" style=\"border-radius:16px;color:#4093cd\"><strong>Zapisz się już teraz</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:image {\"align\":\"right\",\"width\":379,\"height\":333,\"sizeSlug\":\"large\",\"className\":\"bitad-hero-image is-style-default\"} -->\n<div class=\"wp-block-image bitad-hero-image is-style-default\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.svg" . "\" alt=\"Bitad Logo\" width=\"379\" height=\"333\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-small-hero\"} -->\n<div class=\"wp-block-group bitad-small-hero\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"className\":\"bitad-two-columns bitad-reverse\"} -->\n<div class=\"wp-block-columns bitad-two-columns bitad-reverse\"><!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:paragraph {\"className\":\"bitad-hero-subtitle\"} -->\n<p class=\"bitad-hero-subtitle\">20 marca 2020, na terenie uczelni ATH w Bielsku-Białej</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":1} -->\n<h1>Konferencja Informatyczna</h1>\n<!-- /wp:heading -->\n\n<!-- wp:buttons {\"align\":\"left\"} -->\n<div class=\"wp-block-buttons alignleft\"><!-- wp:button {\"borderRadius\":16,\"style\":{\"color\":{\"text\":\"#4093cd\"}},\"className\":\"bitad-hero-button is-style-outline\"} -->\n<div class=\"wp-block-button bitad-hero-button is-style-outline\"><a class=\"wp-block-button__link has-text-color\" href=\"" . get_site_url() . "/rejestracja" . "\" style=\"border-radius:16px;color:#4093cd\"><strong>Zapisz się już teraz</strong></a></div>\n<!-- /wp:button --></div>\n<!-- /wp:buttons --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:image {\"align\":\"right\",\"width\":379,\"height\":333,\"sizeSlug\":\"large\",\"className\":\"bitad-hero-image is-style-default\"} -->\n<div class=\"wp-block-image bitad-hero-image is-style-default\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.svg" . "\" alt=\"Bitad Logo\" width=\"379\" height=\"333\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/text_&_image',
			array(
				'title'       	=> __('Text & Image', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Spotykamy się już<br>kolejny, 10 raz</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter\"><img src=\"" . get_theme_file_uri() . "/assets/images/lecture.jpg" . "\" alt=\"Lecture\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-section\"} -->\n<div class=\"wp-block-group bitad-section\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column {\"verticalAlignment\":\"top\"} -->\n<div class=\"wp-block-column is-vertically-aligned-top\"><!-- wp:heading -->\n<h2>Spotykamy się już<br>kolejny, 10 raz</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"className\":\"is-style-default bitad-image-indicator bitad-image-shadow\"} -->\n<div class=\"wp-block-image is-style-default bitad-image-indicator bitad-image-shadow\"><figure class=\"aligncenter\"><img src=\"" . get_theme_file_uri() . "/assets/images/lecture.jpg" . "\" alt=\"\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				// 'content'		=> "<!-- wp:group {\"className\":\"bitad-section\"} -->\n<div class=\"wp-block-group bitad-section\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"className\":\"bitad-container\"} -->\n<div class=\"wp-block-columns bitad-container\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Spotykamy się już<br>kolejny, 10 raz</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"className\":\"is-style-rounded\"} -->\n<figure class=\"wp-block-image is-style-rounded\"><img src=\"" . get_theme_file_uri() . "/assets/images/lecture.jpg" . "\" alt=\"Lecture\"/></figure>\n<!-- /wp:image --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/elements',
			array(
				'title'       	=> __('Elements'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Możesz się u nas spodziewać*</h2>\n<!-- /wp:heading -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:paragraph -->\n<p>*Oczywiście również o wiele, wiele więcej.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":47,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gift.svg\" alt=\"Gift\" width=\"47\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Powitalnej paczki</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Dlatego każdy z Was zaraz po potwierdzeniu swojej obecności na konferencji będzie czekała powitalna paczka.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"http://localhost:8000/rejestracja/\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":82,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"http://localhost:8000/wp-content/themes/bitad-theme/assets/images/keyboard.svg\" alt=\"Keyboard\" width=\"82\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Warsztatów</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Warsztaty mają na celu zaprezentowanie podstaw tematów będących na czasie w praktyce.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"http://localhost:8000/rejestracja/\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":90,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"http://localhost:8000/wp-content/themes/bitad-theme/assets/images/gamepad.svg\" alt=\"Gamepad\" width=\"90\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Gry QR Code</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Baw się z nami i zdobywaj punkty podczas udziału w prelekcjach i warsztatach.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"http://localhost:8000/rejestracja/\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-section half-gray\"} -->\n<div class=\"wp-block-group bitad-section half-gray\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Możesz się u nas spodziewać*</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\",\"className\":\"half-right\"} -->\n<p class=\"has-text-align-center half-right\">*Oczywiście również o wiele, wiele więcej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"bitad-elements\"} -->\n<div class=\"wp-block-columns bitad-elements\"><!-- wp:column {\"className\":\"bitad-element bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-element bitad-shadow\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":47,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/gift.svg" . "\" alt=\"Gift\" width=\"47\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Powitalnej paczki</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Dlatego każdy z Was zaraz po potwierdzeniu swojej obecności na konferencji będzie czekała powitalna paczka.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"" . get_site_url() . "/szczegoly" . "\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-element bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-element bitad-shadow\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":82,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/gift.svg" . "\" alt=\"Keyboard\" width=\"82\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Warsztatów</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Warsztaty mają na celu zaprezentowanie podstaw tematów będących na czasie w praktyce.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"" . get_site_url() . "/szczegoly" . "\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-element bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-element bitad-shadow\"><!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:image {\"align\":\"center\",\"width\":90,\"height\":44,\"className\":\"is-style-default\"} -->\n<div class=\"wp-block-image is-style-default\"><figure class=\"aligncenter is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/gift.svg" . "\" alt=\"Gamepad\" width=\"90\" height=\"44\"/></figure></div>\n<!-- /wp:image -->\n\n<!-- wp:heading {\"align\":\"center\",\"level\":3} -->\n<h3 class=\"has-text-align-center\">Gry QR Code</h3>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Baw się z nami i zdobywaj punkty podczas udziału w prelekcjach i warsztatach.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\"><a href=\"" . get_site_url() . "/szczegoly" . "\" data-type=\"page\" data-id=\"7\">Dowiedz się więcej</a></p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/center',
			array(
				'title'       	=> __('Center'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:group -->\n<div class=\"wp-block-group\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Ciągle rozwijamy się dla Ciebie</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter\"><img src=\"" . get_theme_file_uri() . "/assets/images/workshop.jpg" . "\" alt=\"Workshop\"/></figure></div>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-section bitad-center\"} -->\n<div class=\"wp-block-group bitad-section bitad-center\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Ciągle rozwijamy się dla Ciebie</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:image {\"align\":\"center\"} -->\n<div class=\"wp-block-image\"><figure class=\"aligncenter\"><img src=\"" . get_theme_file_uri() . "/assets/images/workshop.jpg" . "\" alt=\"Workshop\"/></figure></div>\n<!-- /wp:image --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/sponsors',
			array(
				'title'       	=> __('Sponsors'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'  	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":4} -->\n<h4>Diamentowi sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"columns\":0,\"imageCrop\":false,\"sizeSlug\":\"full\"} -->\n<figure class=\"wp-block-gallery columns-0\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Złoci sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"imageCrop\":false} -->\n<figure class=\"wp-block-gallery columns-0\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Srebrni sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery -->\n<figure class=\"wp-block-gallery columns-0 is-cropped\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":2} -->\n<h2>Konferencja jest<br>możliwa dzięki Nim!</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-section half-neutral\"} -->\n<div id=\"sponsorzy\" class=\"wp-block-group bitad-section half-neutral\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"className\":\"bitad-reverse\"} -->\n<div class=\"wp-block-columns bitad-reverse\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading {\"level\":4} -->\n<h4>Diamentowi sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"columns\":0,\"imageCrop\":false,\"sizeSlug\":\"full\",\"align\":\"center\",\"className\":\"bitad-sponsors-gallery\"} -->\n<figure class=\"wp-block-gallery aligncenter columns-0  bitad-sponsors-gallery\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Złoci sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"columns\":0,\"imageCrop\":false,\"align\":\"center\",\"className\":\"bitad-sponsors-gallery\"} -->\n<figure class=\"wp-block-gallery aligncenter columns-0  bitad-sponsors-gallery\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Srebrni sponsorzy</h4>\n<!-- /wp:heading -->\n\n<!-- wp:gallery {\"ids\":[],\"columns\":0,\"imageCrop\":false,\"sizeSlug\":\"full\",\"align\":\"center\",\"className\":\"bitad-sponsors-gallery\"} -->\n<figure class=\"wp-block-gallery aligncenter columns-0  bitad-sponsors-gallery\"><ul class=\"blocks-gallery-grid\"></ul></figure>\n<!-- /wp:gallery --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:heading -->\n<h2>Konferencja jest<br>możliwa dzięki Nim!</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph -->\n<p>Podjęliśmy się organizacji konferencji Beskid IT Academic Day na Akademii Techniczno-Humanistycznej w Bielsku-Białej.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Nieustannie staramy się rozwijać nasz event, jednocześnie dbając o to, aby uczestnicy, zarówno profesjonaliści, jak i amatorzy, wynieśli z tego dnia ogromne pokłady wiedzy.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:paragraph -->\n<p>Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/organizers',
			array(
				'title'       	=> __('Organizers', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'	=> array('bitad_paterns'),
				// 'content'		=> "<!-- wp:columns -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":150,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalski</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":150,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalski</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:columns {\"verticalAlignment\":null} -->\n<div class=\"wp-block-columns\"><!-- wp:column -->\n<div class=\"wp-block-column\"><!-- wp:image {\"align\":\"center\",\"id\":150,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"aligncenter size-large\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalski</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->",
				// 'content'		=> "<!-- wp:group {\"className\":\"bitad-section bitad-center\"} -->\n<div class=\"wp-block-group bitad-section bitad-center\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Organizatorzy</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"bitad-organizers\"} -->\n<div class=\"wp-block-columns bitad-organizers\"><!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"id\":150,\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"id\":150,\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				// 'content'		=> "<!-- wp:group {\"className\":\"bitad-section bitad-center\"} -->\n<div class=\"wp-block-group bitad-section bitad-center\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Organizatorzy</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"bitad-organizers\"} -->\n<div class=\"wp-block-columns bitad-organizers\"><!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" class=\"wp-image-150\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"id\":150,\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"id\":150,\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"http://localhost:8000/wp-content/uploads/2020/09/default-profile-photo.png\" alt=\"\" class=\"wp-image-150\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				// 'content'		=> "<!-- wp:group {\"className\":\"bitad-section bitad-center\"} -->\n<div class=\"wp-block-group bitad-section bitad-center\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Organizatorzy</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:columns {\"className\":\"bitad-organizers\"} -->\n<div class=\"wp-block-columns bitad-organizers\"><!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-column bitad-organizer bitad-shadow\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns --></div></div>\n<!-- /wp:group -->",
				'content'		=> "<!-- wp:group {\"className\":\"bitad-section bitad-center\"} -->\n<div class=\"wp-block-group bitad-section bitad-center\"><div class=\"wp-block-group__inner-container\"><!-- wp:heading {\"align\":\"center\"} -->\n<h2 class=\"has-text-align-center\">Organizatorzy</h2>\n<!-- /wp:heading -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Jak i motywacji do jej dalszego poszerzania. Dodatkowo dbamy o to, aby to piątkowe spotkanie było przede wszystkim. Mile spędzonym czasem, dlatego wzbogaciliśmy konferencję o dodatkowe atrakcje.</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:group {\"className\":\"bitad-organizers\"} -->\n<div class=\"wp-block-group bitad-organizers\"><div class=\"wp-block-group__inner-container\"><!-- wp:group {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-group bitad-organizer bitad-shadow\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --><!-- wp:group {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-group bitad-organizer bitad-shadow\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --><!-- wp:group {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-group bitad-organizer bitad-shadow\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --><!-- wp:group {\"className\":\"bitad-organizer bitad-shadow\"} -->\n<div class=\"wp-block-group bitad-organizer bitad-shadow\"><div class=\"wp-block-group__inner-container\"><!-- wp:columns {\"verticalAlignment\":\"center\",\"className\":\"bitad-organizer-profile\"} -->\n<div class=\"wp-block-columns are-vertically-aligned-center bitad-organizer-profile\"><!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:image {\"align\":\"right\",\"width\":68,\"height\":68,\"sizeSlug\":\"large\",\"className\":\"is-style-rounded\"} -->\n<div class=\"wp-block-image is-style-rounded\"><figure class=\"alignright size-large is-resized\"><img src=\"" . get_theme_file_uri() . "/assets/images/default-profile-photo.png" . "\" alt=\"\" width=\"68\" height=\"68\"/></figure></div>\n<!-- /wp:image --></div>\n<!-- /wp:column -->\n\n<!-- wp:column {\"verticalAlignment\":\"center\"} -->\n<div class=\"wp-block-column is-vertically-aligned-center\"><!-- wp:paragraph -->\n<p>student</p>\n<!-- /wp:paragraph -->\n\n<!-- wp:heading {\"level\":4} -->\n<h4>Monika Kowalska</h4>\n<!-- /wp:heading --></div>\n<!-- /wp:column --></div>\n<!-- /wp:columns -->\n\n<!-- wp:paragraph {\"align\":\"center\"} -->\n<p class=\"has-text-align-center\">Opiekun koła Reset oraz prelegent w lokalnej bibliotece.</p>\n<!-- /wp:paragraph --></div></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:group --></div></div>\n<!-- /wp:group -->",
			)
		);
		register_block_pattern(
			'bitad/timeline',
			array(
				'title'       	=> __('Linia czasu', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'	=> array('bitad_paterns'),
				'content'		=> "<!-- wp:html -->\n<script src=\"" . get_theme_file_uri() . "/assets/js/timeline.js" . "\"></script>\n<div class=\"bitad-hero\">123</div>\n<!-- /wp:html -->",
			)
		);
		register_block_pattern(
			'bitad/agenda',
			array(
				'title'       	=> __('Wykłady', 'bitad'),
				'description'	=> _x('???', 'Block pattern description', 'bitad'),
				'categories'	=> array('bitad_paterns'),
				'content'		=> join(
					'',
					array(
						'<!-- wp:group {"className":"bitad-section"} -->',
						'<div class="wp-block-group bitad-section"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center" id="linia-czasu">Agenda</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:group {"className":"bitad-timelines"} -->',
						'<div class="wp-block-group bitad-timelines"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":4} -->',
						'<h4>Wykłady</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:html -->',
						'<div id="lectures-timeline" class="bitad-timeline"><div class="bitad-timeline-scroll"></div><script src="' . get_template_directory_uri() . '/assets/js/timeline.js"></script></div>',
						'<!-- /wp:html -->',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":4} -->',
						'<h4>Warsztaty</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:html -->',
						'<div id="workshops-timeline" class="bitad-timeline"><div class="bitad-timeline-scroll"></div></div>',
						'<!-- /wp:html --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group -->',
						'<div id="lectures" class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":4} -->',
						'<h4>Wykłady</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:group {"className":"bitad-events"} -->',
						'<div class="wp-block-group bitad-events"><div class="wp-block-group__inner-container"><!-- wp:group {"className":"bitad-event bitad-shadow"} -->',
						'<div class="wp-block-group bitad-event bitad-shadow"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-event-coordinate"} -->',
						'<div class="wp-block-columns bitad-event-coordinate"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>Sala</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>L103</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left"} -->',
						'<p class="has-text-align-left">8:00-9:00</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px"><strong>Rejestracja</strong></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-event-credentials bitad-light-green"} -->',
						'<div class="wp-block-columns bitad-event-credentials bitad-light-green"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","width":44,"height":44,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignleft size-large is-resized"><img src="' . get_theme_file_uri() . '/assets/images/default-profile-photo.png" alt="" width="44" height="44"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px">Jan Kowalski</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Organizatorzy</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/rejestracja">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-event bitad-shadow"} -->',
						'<div class="wp-block-group bitad-event bitad-shadow"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-event-coordinate"} -->',
						'<div class="wp-block-columns bitad-event-coordinate"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>Sala</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>L103</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left"} -->',
						'<p class="has-text-align-left">9:00-9:20</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px"><strong>Oficjalne rozpoczęcie</strong></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-event-credentials bitad-light-purple"} -->',
						'<div class="wp-block-columns bitad-event-credentials bitad-light-purple"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","width":44,"height":44,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignleft size-large is-resized"><img src="' . get_theme_file_uri() . '/assets/images/default-profile-photo.png" alt="" width="44" height="44"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px">Jan Kowalski</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Organizatorzy</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/rejestracja">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-event bitad-shadow"} -->',
						'<div class="wp-block-group bitad-event bitad-shadow"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-event-coordinate"} -->',
						'<div class="wp-block-columns bitad-event-coordinate"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>Sala</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>L103</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left"} -->',
						'<p class="has-text-align-left">9:20-10:20</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px"><strong>Panel dyskusyjny</strong></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-event-credentials bitad-light-pink"} -->',
						'<div class="wp-block-columns bitad-event-credentials bitad-light-pink"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","width":44,"height":44,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignleft size-large is-resized"><img src="' . get_theme_file_uri() . '/assets/images/default-profile-photo.png" alt="" width="44" height="44"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px">Jan Kowalski</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Organizatorzy</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/rejestracja">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:html -->',
						'<script>timeline("#lectures")</script>',
						'<!-- /wp:html --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group -->',
						'<div id="workshops" class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading {"level":4} -->',
						'<h4>Wykłady</h4>',
						'<!-- /wp:heading -->',
						'<!-- wp:group {"className":"bitad-events"} -->',
						'<div class="wp-block-group bitad-events"><div class="wp-block-group__inner-container"><!-- wp:group {"className":"bitad-event bitad-shadow"} -->',
						'<div class="wp-block-group bitad-event bitad-shadow"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-event-coordinate"} -->',
						'<div class="wp-block-columns bitad-event-coordinate"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>Sala</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>L103</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left"} -->',
						'<p class="has-text-align-left">8:00-9:00</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px"><strong>Rejestracja</strong></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-event-credentials bitad-light-green"} -->',
						'<div class="wp-block-columns bitad-event-credentials bitad-light-green"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","width":44,"height":44,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignleft size-large is-resized"><img src="' . get_theme_file_uri() . '/assets/images/default-profile-photo.png" alt="" width="44" height="44"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px">Jan Kowalski</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Organizatorzy</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/rejestracja">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-event bitad-shadow"} -->',
						'<div class="wp-block-group bitad-event bitad-shadow"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-event-coordinate"} -->',
						'<div class="wp-block-columns bitad-event-coordinate"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>Sala</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>L103</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left"} -->',
						'<p class="has-text-align-left">9:00-9:20</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px"><strong>Oficjalne rozpoczęcie</strong></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-event-credentials bitad-light-purple"} -->',
						'<div class="wp-block-columns bitad-event-credentials bitad-light-purple"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","width":44,"height":44,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignleft size-large is-resized"><img src="' . get_theme_file_uri() . '/assets/images/default-profile-photo.png" alt="" width="44" height="44"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px">Jan Kowalski</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Organizatorzy</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/rejestracja">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group {"className":"bitad-event bitad-shadow"} -->',
						'<div class="wp-block-group bitad-event bitad-shadow"><div class="wp-block-group__inner-container"><!-- wp:columns {"className":"bitad-event-coordinate"} -->',
						'<div class="wp-block-columns bitad-event-coordinate"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph -->',
						'<p>Sala</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>L103</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"align":"left"} -->',
						'<p class="has-text-align-left">9:20-10:20</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px"><strong>Panel dyskusyjny</strong></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:columns {"className":"bitad-event-credentials bitad-light-pink"} -->',
						'<div class="wp-block-columns bitad-event-credentials bitad-light-pink"><!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"align":"left","width":44,"height":44,"sizeSlug":"large","className":"is-style-rounded"} -->',
						'<div class="wp-block-image is-style-rounded"><figure class="alignleft size-large is-resized"><img src="' . get_theme_file_uri() . '/assets/images/default-profile-photo.png" alt="" width="44" height="44"/></figure></div>',
						'<!-- /wp:image --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column {"verticalAlignment":"center"} -->',
						'<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"style":{"typography":{"fontSize":18}}} -->',
						'<p style="font-size:18px">Jan Kowalski</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>Organizatorzy</p>',
						'<!-- /wp:paragraph --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center"><a href="http://localhost:8000/rejestracja">Dowiedz się więcej</a></p>',
						'<!-- /wp:paragraph --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:html -->',
						'<script>timeline("#workshops")</script>',
						'<!-- /wp:html --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
					),
				),
			)
		);
	}
}
add_action('init', 'bitad_register_block_patterns');


// <img src="' . get_theme_file_uri() . '/assets/images/2020-three-quarters-3.png"
// echo "src=\"" . get_theme_file_uri() . "/assets/images/bitad-logo.png\"";
// echo get_site_url();