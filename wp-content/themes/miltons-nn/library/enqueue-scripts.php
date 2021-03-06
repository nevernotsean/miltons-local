<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

if ( ! function_exists( 'foundationpress_scripts' ) ) :
	function foundationpress_scripts() {

	// // Enqueue the main Stylesheet. DISABLED TO CACHE BUST IN THE HEADER!
	// wp_enqueue_style( 'main-stylesheet',  get_template_directory_uri() . '/css/foundation.css', array(), filemtime( get_template_directory() . '/css/foundation.css'), 'screen' );

	wp_enqueue_style( 'shame',  get_template_directory_uri() . '/css/shame.css');

	// Deregister the jquery version bundled with WordPress.
	wp_deregister_script( 'jquery' );

	// Modernizr is used for polyfills and feature detection. Must be placed in header. (Not required).
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/vendor/modernizr.js', array(), '2.8.3', false );

	// Fastclick removes the 300ms delay on click events in mobile environments. Must be placed in header. (Not required).
	wp_register_script( 'fastclick', get_template_directory_uri() . '/js/vendor/fastclick.js', array(), '1.0.0', false );

	// CDN hosted jQuery placed in the header, as some plugins require that jQuery is loaded in the header.
	// wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), '2.1.0', false );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery.js', array(), '2.1.0', false );

	// If you'd like to cherry-pick the foundation components you need in your project, head over to Gruntfile.js and see lines 67-88.
	// It's a good idea to do this, performance-wise. No need to load everything if you're just going to use the grid anyway, you know :)
	wp_register_script( 'foundation', get_template_directory_uri() . '/js/foundation.js', array('jquery'), '5.5.2', true );

	// Custom scripts
	wp_register_script( 'app', get_template_directory_uri() . '/js/app.js', array('jquery'), '1.0.0', true );

	// Google Maps
	wp_register_script( 'gmaps', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyA4_o8c3lrtbyR1T972pwzvFlFlAWFRUCM', array(), '1.0.0', true );

	// Enqueue all registered scripts.
	wp_enqueue_script( 'modernizr' );
	wp_enqueue_script( 'fastclick' );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'foundation' );
	wp_enqueue_script( 'gmaps' );
	wp_enqueue_script( 'app' );
	}

	add_action( 'wp_enqueue_scripts', 'foundationpress_scripts' );
endif;

?>
