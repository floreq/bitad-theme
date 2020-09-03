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
			'sidebar-1' => array(
				'text_about',
			),
			// Place one core-defined widgets in the second footer widget area.
			'sidebar-2' => array(
				'text_business_info',
			),
		),
		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts'       => array(
			'conference' => array(
				'post_type'    => 'page',
				'post_title'   => __('O konferencji', 'bitad'),
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
				'name'  => __('Primary Menu', 'biad'),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
				),
			),
			// Assign a menu to the "social" location.
			'social'   => array(
				'name'  => __('Social Links Menu', 'bitad'),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
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
	// /**
	//  * Pre-configure and save a widget, designed for plugin and theme activation.
	//  * 
	//  * @link    http://wordpress.stackexchange.com/q/138242/1685
	//  *
	//  * @param   string  $sidebar    The database name of the sidebar to add the widget to.
	//  * @param   string  $name       The database name of the widget.
	//  * @param   mixed   $args       The widget arguments (optional).
	//  */

	// function set_widget($sidebar, $name, $args = array())
	// {
	// 	if (!$sidebars = get_option('sidebars_widgets'))
	// 		$sidebars = array();

	// 	// Create the sidebar if it doesn't exist.
	// 	if (!isset($sidebars[$sidebar]))
	// 		$sidebars[$sidebar] = array();

	// 	// Check for existing saved widgets.
	// 	if ($widget_opts = get_option("widget_$name")) {
	// 		// Get next insert id.
	// 		ksort($widget_opts);
	// 		end($widget_opts);
	// 		$insert_id = key($widget_opts);
	// 	} else {
	// 		// None existing, start fresh.
	// 		$widget_opts = array('_multiwidget' => 1);
	// 		$insert_id = 0;
	// 	}

	// 	// Add our settings to the stack.
	// 	$widget_opts[++$insert_id] = $args;
	// 	// Add our widget!
	// 	$sidebars[$sidebar][] = "$name-$insert_id";

	// 	update_option('sidebars_widgets', $sidebars);
	// 	update_option("widget_$name", $widget_opts);
	// }
	// set_widget(
	// 	'footer',
	// 	'text',
	// 	array(
	// 		'title' => 'Test2',
	// 		'text' => 'Test 2 Test',
	// 		'filter' => false,
	// 	)
	// );
}
