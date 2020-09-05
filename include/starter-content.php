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
						'<!-- wp:group {"align":"wide"} -->',
						'<div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">' . __('The premier destination for modern art in Northern Sweden. Open from 10 AM to 6 PM every day during the summer months.', 'twentytwenty') . '</h2>',
						'<!-- /wp:heading --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:columns {"align":"wide"} -->',
						'<div class="wp-block-columns alignwide"><!-- wp:column -->',
						'<div class="wp-block-column"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:image {"align":"full","id":37,"sizeSlug":"full"} -->',
						'<figure class="wp-block-image alignfull size-full"><img src="' . get_theme_file_uri() . '/assets/images/2020-three-quarters-1.png" alt="" class="wp-image-37"/></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"level":3} -->',
						'<h3>' . __('Works and Days', 'twentytwenty') . '</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>' . __('August 1 -- December 1', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button {"className":"is-style-outline"} -->',
						'<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/">' . __('Read More', 'twentytwenty') . '</a></div>',
						'<!-- /wp:button --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:image {"align":"full","id":37,"sizeSlug":"full"} -->',
						'<figure class="wp-block-image alignfull size-full"><img src="' . get_theme_file_uri() . '/assets/images/2020-three-quarters-3.png" alt="" class="wp-image-37"/></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"level":3} -->',
						'<h3>' . __('Theatre of Operations', 'twentytwenty') . '</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>' . __('October 1 -- December 1', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button {"className":"is-style-outline"} -->',
						'<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/">' . __('Read More', 'twentytwenty') . '</a></div>',
						'<!-- /wp:button --></div></div>',
						'<!-- /wp:group --></div>',
						'<!-- /wp:column -->',
						'<!-- wp:column -->',
						'<div class="wp-block-column"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:image {"align":"full","id":37,"sizeSlug":"full"} -->',
						'<figure class="wp-block-image alignfull size-full"><img src="' . get_theme_file_uri() . '/assets/images/2020-three-quarters-2.png" alt="" class="wp-image-37"/></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"level":3} -->',
						'<h3>' . __('The Life I Deserve', 'twentytwenty') . '</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>' . __('August 1 -- December 1', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button {"className":"is-style-outline"} -->',
						'<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/">' . __('Read More', 'twentytwenty') . '</a></div>',
						'<!-- /wp:button --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container">',
						'<!-- wp:image {"align":"full","id":37,"sizeSlug":"full"} -->',
						'<figure class="wp-block-image alignfull size-full"><img src="' . get_theme_file_uri() . '/assets/images/2020-three-quarters-4.png" alt="" class="wp-image-37"/></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:heading {"level":3} -->',
						'<h3>' . __('From Signac to Matisse', 'twentytwenty') . '</h3>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph -->',
						'<p>' . __('October 1 -- December 1', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button {"className":"is-style-outline"} -->',
						'<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/">' . __('Read More', 'twentytwenty') . '</a></div>',
						'<!-- /wp:button --></div></div>',
						'<!-- /wp:group --></div>',
						'<!-- /wp:column --></div>',
						'<!-- /wp:columns -->',
						'<!-- wp:image {"align":"full","id":37,"sizeSlug":"full"} -->',
						'<figure class="wp-block-image alignfull size-full"><img src="' . get_theme_file_uri() . '/assets/images/2020-landscape-2.png" alt="" class="wp-image-37"/></figure>',
						'<!-- /wp:image -->',
						'<!-- wp:group {"align":"wide"} -->',
						'<div class="wp-block-group alignwide"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center","textColor":"accent"} -->',
						'<h2 class="has-accent-color has-text-align-center">' . __('&#8220;Cyborgs, as the philosopher Donna Haraway established, are not reverent. They do not remember the cosmos.&#8221;', 'twentytwenty') . '</h2>',
						'<!-- /wp:heading --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:paragraph {"dropCap":true} -->',
						'<p class="has-drop-cap">' . __('With seven floors of striking architecture, UMoMA shows exhibitions of international contemporary art, sometimes along with art historical retrospectives. Existential, political and philosophical issues are intrinsic to our programme. As visitor you are invited to guided tours artist talks, lectures, film screenings and other events with free admission', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p>' . __('The exhibitions are produced by UMoMA in collaboration with artists and museums around the world and they often attract international attention. UMoMA has received a Special Commendation from the European Museum of the Year, and was among the top candidates for the Swedish Museum of the Year Award as well as for the Council of Europe Museum Prize.', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:paragraph -->',
						'<p></p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:group {"customBackgroundColor":"#ffffff","align":"wide"} -->',
						'<div class="wp-block-group alignwide has-background" style="background-color:#ffffff"><div class="wp-block-group__inner-container"><!-- wp:group -->',
						'<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:heading {"align":"center"} -->',
						'<h2 class="has-text-align-center">' . __('Become a Member and Get Exclusive Offers!', 'twentytwenty') . '</h2>',
						'<!-- /wp:heading -->',
						'<!-- wp:paragraph {"align":"center"} -->',
						'<p class="has-text-align-center">' . __('Members get access to exclusive exhibits and sales. Our memberships cost $99.99 and are billed annually.', 'twentytwenty') . '</p>',
						'<!-- /wp:paragraph -->',
						'<!-- wp:button {"align":"center"} -->',
						'<div class="wp-block-button aligncenter"><a class="wp-block-button__link" href="https://make.wordpress.org/core/2019/09/27/block-editor-theme-related-updates-in-wordpress-5-3/">' . __('Join the Club', 'twentytwenty') . '</a></div>',
						'<!-- /wp:button --></div></div>',
						'<!-- /wp:group --></div></div>',
						'<!-- /wp:group -->',
						'<!-- wp:gallery {"ids":[39,38],"align":"wide"} -->',
						'<figure class="wp-block-gallery alignwide columns-2 is-cropped"><ul class="blocks-gallery-grid"><li class="blocks-gallery-item"><figure><img src="' . get_theme_file_uri() . '/assets/images/2020-square-2.png" alt="" data-id="39" data-full-url="' . get_theme_file_uri() . '/assets/images/2020-square-2.png" data-link="assets/images/2020-square-2/" class="wp-image-39"/></figure></li><li class="blocks-gallery-item"><figure><img src="' . get_theme_file_uri() . '/assets/images/2020-square-1.png" alt="" data-id="38" data-full-url="' . get_theme_file_uri() . '/assets/images/2020-square-1.png" data-link="' . get_theme_file_uri() . '/assets/images/2020-square-1/" class="wp-image-38"/></figure></li></ul></figure>',
						'<!-- /wp:gallery -->',
					)
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
