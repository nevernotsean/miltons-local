<?php
/*
Plugin Name: Store Locator Plus
Plugin URI: https://www.storelocatorplus.com/
Description: Add a location finder or directory to your site in minutes. Extensive add-on library available!
Author: Store Locator Plus
Author URI: https://www.storelocatorplus.com
License: GPL3
Tested up to: 4.4.01
Version: 4.4.17

Text Domain: store-locator-le
Domain Path: /languages/

Copyright 2012 - 2015  Charleston Software Associates (info@storelocatorplus.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
if ( defined( 'SLPLUS_VERSION'   ) === false ) { define( 'SLPLUS_VERSION'    , '4.4.17'                             ); } // Current plugin version.

$min_wp_version  = '3.8';
$min_php_version = '5.2.4';
$slp_plugin_name = __( 'Store Locator Plus' , 'store-locator-le' );

// Check WP Version
//
global $wp_version;
if ( version_compare( $wp_version, $min_wp_version, '<' ) ) {
    add_action(
        'admin_notices',
        create_function(
            '',
            "echo '<div class=\"error\"><p>".
            sprintf(
                __( '%s requires PHP %s to function properly. ' , 'store-locator-le' ) ,
                $slp_plugin_name,
                $min_php_version
            ).
            __( 'This plugin has been deactivated.'                                     , 'store-locator-le' ) .
            __( 'Please upgrade PHP.'                                                   , 'store-locator-le' ) .
            "</p></div>';"
        )
    );
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    deactivate_plugins( plugin_basename( __FILE__ ) );
    return;
}


// Check PHP Version
//
// min: 5.2 path_info() with path_parts['filename']  @see  http://php.net/manual/en/function.pathinfo.php
//
if ( version_compare( PHP_VERSION , $min_php_version , '<' ) ) {
    add_action(
        'admin_notices',
        create_function(
            '',
            "echo '<div class=\"error\"><p>".
            sprintf(
                __( '%s requires PHP %s to function properly. ' , 'store-locator-le' ) ,
                $slp_plugin_name,
                $min_php_version
            ).
            __( 'This plugin has been deactivated.'                                     , 'store-locator-le' ) .
            __( 'Please upgrade PHP.'                                                   , 'store-locator-le' ) .
            "</p></div>';"
        )
    );
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    deactivate_plugins( plugin_basename( __FILE__ ) );
    return;
}

//====================================================================
// Main Plugin Configuration
//====================================================================

if ( defined( 'SLPLUS_NAME'      ) === false ) { define( 'SLPLUS_NAME'       , __('Store Locator Plus','store-locator-le')); } // Plugin name via gettext.
if ( defined( 'SLPLUS_PREFIX'    ) === false ) { define( 'SLPLUS_PREFIX'     , 'csl-slplus'                         ); } // The shorthand prefix to various option settings, etc.
if ( defined( 'SLP_ADMIN_PAGEPRE') === false ) { define( 'SLP_ADMIN_PAGEPRE' , 'store-locator-plus_page_'           ); } // Admin Page Slug Prefix

if ( defined( 'SLPLUS_FILE'      ) === false ) { define( 'SLPLUS_FILE'       , __FILE__                             ); } // Pointer to this file.
if ( defined( 'SLPLUS_PLUGINDIR' ) === false ) { define( 'SLPLUS_PLUGINDIR'  , plugin_dir_path( __FILE__ )          ); } // Fully qualified path to this install directory.
if ( defined( 'SLPLUS_ICONDIR'   ) === false ) { define( 'SLPLUS_ICONDIR'    , SLPLUS_PLUGINDIR . 'images/icons/'   ); } // Path to the icon images
if ( defined( 'SLPLUS_PLUGINURL' ) === false ) { define( 'SLPLUS_PLUGINURL'  , plugins_url( '' , __FILE__ )         ); } // Fully qualified URL to this plugin directory.
if ( defined( 'SLPLUS_ICONURL'   ) === false ) { define( 'SLPLUS_ICONURL'    , SLPLUS_PLUGINURL . '/images/icons/'  ); } // Fully qualified URL to the icon images.
if ( defined( 'SLPLUS_BASENAME'  ) === false ) { define( 'SLPLUS_BASENAME'   , plugin_basename( __FILE__ )          ); } // The relative path from the plugins directory

// SLP Uploads Dir
//
if (defined('SLPLUS_UPLOADDIR') === false) {
    $upload_dir = wp_upload_dir('slp');
    $error = $upload_dir['error'];
    if (empty($error)) {
        define('SLPLUS_UPLOADDIR', $upload_dir['path']);
        define('SLPLUS_UPLOADURL', $upload_dir['url']);
    } else {
        $error = preg_replace(
                '/Unable to create directory /',
                'Unable to create directory ' . ABSPATH ,
                $error
                );
        define('SLPLUS_UPLOADDIR', SLPLUS_PLUGINDIR);
        define('SLPLUS_UPLOADURL', SLPLUS_PLUGINURL);
    }
}

define( 'SLPLUS_COREURL'    , SLPLUS_PLUGINURL );

//====================================================================
// Main Plugin Configuration
//====================================================================

/**
 * @var SLPlus $slplus_plugin
 */
global $slplus_plugin;
if ( defined('SLPLUS_PLUGINDIR') && ! is_a( $slplus_plugin , 'SLPlus' ) ) {
    if ( class_exists( 'SLPlus' ) == false ) {
        require_once(SLPLUS_PLUGINDIR.'include/class.slplus.php');
    }
    $slplus_plugin = new SLPlus();
	$slplus_plugin->initialize();
}

// Errors?
//
if ($error != '') {
    $slplus_plugin->notifications->add_notice(4,$error);
}

//====================================================================
// Add Required Libraries
//====================================================================

// General WP Action Interface
//
require_once(SLPLUS_PLUGINDIR . 'include/class.actions.php');
$slplus_plugin->Actions = new SLPlus_Actions( array( 'uses_slplus' => true ) );

require_once(SLPLUS_PLUGINDIR . 'include/class.activation.php');

require_once(SLPLUS_PLUGINDIR . 'include/class.ui.php');
$slplus_plugin->UI = new SLPlus_UI(array('slplus'=>$slplus_plugin));

add_action( 'plugins_loaded' , array( $slplus_plugin , 'activate_or_update_slplus' ) );

//====================================================================
// WordPress Shortcodes and Text Filters
//====================================================================

// Short Codes
//
add_shortcode( 'STORE-LOCATOR'  , array( $slplus_plugin->UI , 'render_shortcode' ) );
add_shortcode( 'SLPLUS'         , array( $slplus_plugin->UI , 'render_shortcode' ) );
add_shortcode( 'slplus'         , array( $slplus_plugin->UI , 'render_shortcode' ) );
