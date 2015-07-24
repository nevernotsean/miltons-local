<?php
/**
 * Functions used by plugins
 */

if ( !function_exists( 'is_framework_active' ) ) {
	function is_framework_active() {
		$plugin = 'Extensionworks-WC-Framework/extensionworks-framework.php';

		return is_active( $plugin )  ;
	}
}

if ( !function_exists( 'is_woo_active' ) ) {
	function is_woo_active() {
		$plugin = 'woocommerce/woocommerce.php';
		return is_active( $plugin );
	}
}

if ( !function_exists( 'is_active' ) ) {
	function is_active( $plugin ) {
		$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
		if ( in_array( $plugin, $active_plugins ) )
			return true;
		else
			return false;
	}
}

if ( !function_exists( 'is_shipper_active' ) ) {
	function is_shipper_active() {
		$plugin = 'WooCommerce-Shipper/extensionworks-shipping.php';
		return is_active( $plugin );
	}
}

if ( !function_exists( 'is_updater_active' ) ) {
	function is_updater_active() {
		$plugin = 'ExtensionWorks-updater/extensionworks-updater.php';
		return is_active( $plugin );
	}
}

/**
 * Queue updates for the ExtensionWorks
 */
if ( ! function_exists( 'extensionworks_queue_update' ) ) {
	function extensionworks_queue_update( $file, $file_id, $product_id ) {
		global $ew_queued_updates;

		if ( ! isset( $ew_queued_updates ) )
			$ew_queued_updates = array();

		$plugin             = new stdClass();
		$plugin->file       = $file;
		$plugin->file_id    = $file_id;
		$plugin->product_id = $product_id;

		$ew_queued_updates[] = $plugin;
	}

}


/**
 * Load installer for the ExtensionWorks Updater.
 *
 * @return $api Object
 */
if ( ! class_exists( 'ExtensionWork_Framework' ) && ! function_exists( 'ew_framework_install' ) ) {
	function ew_framework_install( $api, $action, $args ) {

		if ( 'plugin_information' != $action ||
			false !== $api ||
			! isset( $args->slug ) ||
			'extensionworks-framework' != $args->slug
		) return $api;


		$info = check_plugin_info( 'Extensionworks-WC-Framework/extensionworks-framework.php', '1.0', 'woo-framework', 'ae3c602b04914b313a39edb64cd0bbb6' );

		if ( $info ) {
			// echo "<pre>ew_updater_install info:" .print_r( $info , true) . "</pre>";
			return $info;
		}

		return $api;
	}

	add_filter( 'plugins_api', 'ew_framework_install', 10, 3 );
}


// if ( !function_exists( 'check_compatibility' ) ) {
//  function check_compatibility() {

//   $msg = '';
//   if ( is_shipper_active() ) {
//    $deactive_url = 'plugins.php?action=deactivate&plugin=' . urlencode( 'WooCommerce-Shipper/extensionworks-shipping.php' ) . '&plugin_status=all&paged=1&s&_wpnonce=' . urlencode( wp_create_nonce( 'deactivate-plugin_WooCommerce-Shipper/extensionworks-shipping.php' ) );
//    $msg .= '<p>Your Extension Works plugin requires updating of its dependencies to operate correctly. Once updated, please <a href="'. $deactive_url .'">deactive the Extension Works Shipper plugin</a></p>';
//   }

//   if ( is_updater_active() ) {
//    $deactive_url = 'plugins.php?action=deactivate&plugin=' . urlencode( 'ExtensionWorks-updater/extensionworks-updater.php' ) . '&plugin_status=all&paged=1&s&_wpnonce=' . urlencode( wp_create_nonce( 'deactivate-plugin_ExtensionWorks-updater/extensionworks-updater.php' ) );
//    $msg .= '<p>Your Extension Works plugin requires updating of its dependencies to operate correctly. Once updated, please <a href="'. $deactive_url .'">deactive the Extension Works Updater plugin</a></p>';
//   }

//   if ( $msg ) {
//    $msg .= '<p>For more information about the changes, please <a href="http://help.extensionworks.com/entries/23495476-New-changes-to-our-WooCommerce-Shipping-extensions">Visit Our FAQs</a></p>';
//    echo '<div class="error">' . $msg . '</div>';
//   }

//  }
// }
// add_action( 'admin_notices', 'check_compatibility' );

/**
 * ExtensionWorksUpdater Installation Prompts
 */
if ( ! class_exists( 'ExtensionWork_Framework' ) && ! function_exists( 'ew_framework_notice' ) ) {

	/**
	 * Display a notice if the "ExtensionWorks Updater" plugin hasn't been installed.
	 *
	 * @return void
	 */
	function ew_framework_notice() {
		$active_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );
		if ( in_array( 'Extensionworks-WC-Framework/extensionworks-framework.php', $active_plugins ) ) return;

		$slug = 'extensionworks-framework';
		$install_url = wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $slug ), 'install-plugin_' . $slug );
		$activate_url = 'plugins.php?action=activate&plugin=' . urlencode( 'Extensionworks-WC-Framework/extensionworks-framework.php' ) . '&plugin_status=all&paged=1&s&_wpnonce=' . urlencode( wp_create_nonce( 'activate-plugin_Extensionworks-WC-Framework/extensionworks-framework.php' ) );
		$message = '<a href="' . esc_url( $install_url ) . '">Install the Extension Works Framework plugin</a> to get updates for your Extension Works plugins.';
		$is_downloaded = false;
		$plugins = array_keys( get_plugins() );
		foreach ( $plugins as $plugin ) {
			if ( strpos( $plugin, 'extensionworks-framework.php' ) !== false ) {
				$is_downloaded = true;
				$message = '<a href="' . esc_url( admin_url( $activate_url ) ) . '">Activate the Extension Works Framework plugin</a> to get updates for your Extension Works plugins.';
			}
		}
		echo '<div class="updated fade"><p>' . $message . '</p></div>' . "\n";
	}

	add_action( 'admin_notices', 'ew_framework_notice' );
}

/**
 * Check plugin infromation
 */
if ( !function_exists( 'check_plugin_info' ) ) {
	function check_plugin_info( $plugin, $version, $product_id, $file_id ) {
		$request_url = 'http://www.extensionworks.com/?wc-api=extensionworks&';
		$args = array(
			'request'      => 'plugininformation',
			'plugin_name'  => $plugin,
			'version'      => $version,
			'product_id'   => $product_id,
			'file_id'      => $file_id,
			'url'          => esc_url( home_url( '/' ) )
		);

		$request = wp_remote_post( $request_url, array(
				'method'      => 'POST',
				'timeout'     => 45,
				'redirection' => 5,
				'httpversion' => '1.0',
				'blocking'    => true,
				'headers'     => array(),
				'body'        => $args,
				'cookies'     => array(),
				'sslverify'   => false
			) );

		if ( is_wp_error( $request ) || wp_remote_retrieve_response_code( $request ) != 200 ) {
			// Request failed
			return false;
		}
		// Read server response, which should be an object
		if ( $request != '' ) {
			$response = json_decode( wp_remote_retrieve_body( $request ) );
		} else {
			$response = false;
		}

		if ( is_object( $response ) ) {
			return $response;
		}else {
			// Unexpected response
			return false;
		}
	}
}


if ( !function_exists( 'check_plugin_dependency' ) ) {
	function check_plugin_dependency() {

		//check older version shipper.
		if ( is_shipper_active() ) {
			return false;
		}

		//check older version updater
		if ( is_updater_active() ) {
			return false;
		}

		if ( !is_woo_active() ) {
			return false;
		}

		if ( !is_framework_active() ) {
			return false;
		}

		if ( is_framework_active() && $GLOBALS['hippershipper']->version < '1.7.0' ) {
			return false;
		}

		return true;
	}
}



if ( !function_exists( 'dependency_notification' ) ) {
	function dependency_notification() {

		$msg = '';

		//check older version shipper.
		if ( is_shipper_active() ) {
			$deactive_url = 'plugins.php?action=deactivate&plugin=' . urlencode( 'WooCommerce-Shipper/extensionworks-shipping.php' ) . '&plugin_status=all&paged=1&s&_wpnonce=' . urlencode( wp_create_nonce( 'deactivate-plugin_WooCommerce-Shipper/extensionworks-shipping.php' ) );
			$msg .= '<p>Your Extension Works plugin requires updating of its dependencies to operate correctly. Once updated, please <a href="'. $deactive_url .'">deactive the Extension Works Shipper plugin</a></p>';
		}

		//check older version updater
		if ( is_updater_active() ) {
			$deactive_url = 'plugins.php?action=deactivate&plugin=' . urlencode( 'ExtensionWorks-updater/extensionworks-updater.php' ) . '&plugin_status=all&paged=1&s&_wpnonce=' . urlencode( wp_create_nonce( 'deactivate-plugin_ExtensionWorks-updater/extensionworks-updater.php' ) );
			$msg .= '<p>Your Extension Works plugin requires updating of its dependencies to operate correctly. Once updated, please <a href="'. $deactive_url .'">deactive the Extension Works Updater plugin</a></p>';
		}

		if ( !is_woo_active() ) {
			$msg .='<p>Your Extension Works plugin requires woocommerce, please active or install it</p>';
		}

		if ( !is_framework_active() ) {
			$msg .='<p>Your Extension Works plugin requires Framework, please active or install it</p>';
		}

		if ( is_framework_active() && isset( $GLOBALS['hippershipper']  ) && $GLOBALS['hippershipper']->version < '1.7.0' ) {
			$msg .= '<p>Your Extension Works plugin requires the version of Framework 1.7.0 or higher, please update your Framework to latest version.</p>';
		}

		if ( $msg ) {
			$msg .= '<p>For more information about the changes, please <a href="http://help.extensionworks.com/entries/23495476-New-changes-to-our-WooCommerce-Shipping-extensions">Visit Our FAQs</a></p>';
			echo '<div class="error">' . $msg . '</div>';
		}

	}

	add_action( 'admin_notices', 'dependency_notification' );
}

