<?php
/*
  Plugin Name: WooCommerce UPS
  Description: Realtime shipping rates from UPS
  Version: 1.5.5
  Author: Extension Works
  Author URI: http://www.extensionworks.com/
  Copyright: © Extension Works.
  
 */

add_action('plugins_loaded', 'woocommerce_ups_init');

function woocommerce_ups_init() {

	
	include_once 'extensionworks-includes/extensionworks-functions.php';

	if( !check_plugin_dependency() )
		return;
	
	/**
	 * Plugin updates
	 */
	extensionworks_queue_update( plugin_basename( __FILE__ ), '8dae58502913bac0fbcdcaba515ea998', 'woo-ups' );

	/**
	 * Shipping method class
	 * */
	class WC_Shipping_UPS extends EW_Shipper {

		var $id                 = 'WC_Shipping_UPS';
		var $method_title       = 'UPS';
		var $carrier            = "UPS";
		var $method_description = "The <strong>UPS</strong> extension obtains rates dynamically from the UPS API during cart/checkout.";
		var $endpoint           = "https://www.ups.com/ups.app/xml/Rate";
		// $test_url = "https://wwwcie.ups.com/ups.app/xml/Rate";
		
		var $dimension_unit     = 'IN';
		var $weight_unit        = 'LBS';
		
		var $allowed_currencies = array('USD');

		var $carrier_boxes = array(
			array(
				'label'        => 'UPS Express Box Large',
				'outer_height' => 3,
				'inner_height' => 3,
				'outer_width'  => 13,
				'inner_width'  => 13,
				'outer_length' => 18,
				'inner_length' => 18,
				'box_weight'   => 0,
				'max_weight'   => 0,
				'is_letter'    => false,
            ),
            array(
				'label'        => 'UPS Express Box Medium',
				'outer_height' => 3,
				'inner_height' => 3,
				'outer_width'  => 11,
				'inner_width'  => 11,
				'outer_length' => 15,
				'inner_length' => 15,
				'box_weight'   => 0,
				'max_weight'   => 0,
				'is_letter'    => false
            ),
            array(
				'label'        => 'UPS Express Box Small',
				'outer_height' => 2,
				'inner_height' => 2,
				'outer_width'  => 11,
				'inner_width'  => 11,
				'outer_length' => 13,
				'inner_length' => 13,
				'box_weight'   => 0,
				'max_weight'   => 0,
				'is_letter'    => false
            ),
            array(
				'label'        => 'UPS Express Tube',
				'outer_height' => 6,
				'inner_height' => 6,
				'outer_width'  => 6,
				'inner_width'  => 6,
				'outer_length' => 38,
				'inner_length' => 38,
				'box_weight'   => 0,
				'max_weight'   => 0,
				'is_letter'    => false
            ),
            array(
				'label'        => 'UPS World Ease Document Box',
				'outer_height' => 12.5,
				'inner_height' => 12.5,
				'outer_width'  => 3,
				'inner_width'  => 3,
				'outer_length' => 17.5,
				'inner_length' => 17.5,
				'box_weight'   => 0,
				'max_weight'   => 0,
				'is_letter'    => false
            ),
            array(
				'label'        => 'UPS 10KG Box',
				'outer_width'  => 13.25,
				'inner_width'  => 13.25,
				'outer_height' => 10.75,
				'inner_height' => 10.75,
				'outer_length' => 16.5,
				'inner_length' => 16.5,
				'max_weight'   => 22,
				'box_weight'   => 0,
				'is_letter'    => false
            ),
            array(
				'label'        => 'UPS 25KG Box',
				'outer_width'  => 17.375,
				'inner_width'  => 17.375,
				'outer_height' => 14,
				'inner_height' => 14,
				'outer_length' => 19.375,
				'inner_length' => 19.375,
				'max_weight'   => 55,
				'box_weight'   => 0,
				'is_letter'    => false
            ),
			array(
				'label'        => 'UPS Express Reusable Envelope',
				'outer_height' => 1,
				'inner_height' => 1,
				'outer_width'  => 9.5,
				'inner_width'  => 9.5,
				'outer_length' => 12.5,
				'inner_length' => 12.5,
				'max_weight'   => 0.5,
				'box_weight'   => 0,
				'is_letter'    => true
            ),
            array(
				'label'        => 'UPS Express Envelope',
				'outer_height' => 1,
				'inner_height' => 1,
				'outer_width'  => 9.5,
				'inner_width'  => 9.5,
				'outer_length' => 12.5,
				'inner_length' => 12.5,
				'max_weight'   => 0.5,
				'box_weight'   => 0,
				'is_letter'    => true
            ),
            array(
				'label'        => 'UPS Legal Express Reusable Envelope',
				'outer_height' => 1,
				'inner_height' => 1,
				'outer_width'  => 9.5,
				'inner_width'  => 9.5,
				'outer_length' => 15,
				'inner_length' => 15,
				'max_weight'   => 0.5,
				'box_weight'   => 0,
				'is_letter'    => true
            ),
            array(
				'label'        => 'UPS Legal Window Envelope',
				'outer_height' => 1,
				'inner_height' => 1,
				'outer_width'  => 9.5,
				'inner_width'  => 9.5,
				'outer_length' => 15,
				'inner_length' => 15,
				'max_weight'   => 0.5,
				'box_weight'   => 0,
				'is_letter'    => true
            ),
            array(
				'label'        => 'UPS Window Envelope',
				'outer_height' => 1,
				'inner_height' => 1,
				'outer_width'  => 9.5,
				'inner_width'  => 9.5,
				'outer_length' => 12.5,
				'inner_length' => 12.5,
				'max_weight'   => 0.5,
				'box_weight'   => 0,
				'is_letter'    => true
            ),
        );

		var $services= array(
		    "01" => array( 'name' => "UPS Next Day Air"),
		    "02" => array( 'name' => "UPS Second Day Air"),
		    "03" => array( 'name' => "UPS Ground"),
		    "07" => array( 'name' => "UPS Worldwide Express"),
		    "08" => array( 'name' => "UPS Worldwide Expedited"),
		    "11" => array( 'name' => "UPS Standard"),
		    "12" => array( 'name' => "UPS Three-Day Select"),
		    "13" => array( 'name' => "UPS Next Day Air Saver"),
		    "14" => array( 'name' => "UPS Next Day Air Early A.M."),
		    "54" => array( 'name' => "UPS Worldwide Express Plus"),
		    "59" => array( 'name' => "UPS Second Day Air A.M."),
		    "65" => array( 'name' => "UPS Saver"),
		    "82" => array( 'name' => "UPS Today Standard"),
		    "83" => array( 'name' => "UPS Today Dedicated Courrier"),
		    "84" => array( 'name' => "UPS Today Intercity"),
		    "85" => array( 'name' => "UPS Today Express"),
		    "86" => array( 'name' => "UPS Today Express Saver"),
		);
		
		var $worldwide = array("07", "08", "11", "54", "65");

		var $services_location = array(
		    "US" => array("01", "02", "03", "07", "08", "11", "12", "13", "14", "54", "59", "65"),
		    "PR" => array("01", "02", "03", "07", "08", "14", "54", "65"),
		    "CA" => array("01", "02", "07", "08", "11", "12", "13", "14", "54", "65"),
		    "MX" => array("07", "08", "11", "54", "65"),
		    "PL" => array("07", "08", "11", "54", "65", "82", "83", "84", "85", "86"));
		

		var $available_methods = array();

		var $packages;

		public function __construct(){

			parent::__construct();

			$this->plugin = plugin_basename( __FILE__ );
		}

		/**
		 * Initialise Gateway Settings Form Fields
		 */
		function add_form_fields() {	

			$form_fields = array(
			 
			    'user_id' => array(
					'title'       => __('User Name', 'extensionworks'),
					'type'        => 'text',
					'description' => __('Your UPS user name', 'extensionworks'),
					'default'     => ''
			    ),
			    'password' => array(
					'title'       => __('Password', 'extensionworks'),
					'type'        => 'text',
					'description' => __('Your UPS password', 'extensionworks'),
					'default'     => ''
			    ),
			    'access_code' => array(
					'title'       => __('License Number', 'extensionworks'),
					'type'        => 'text',
					'description' => __('UPS Access License Number', 'extensionworks'),
					'default'     => ''
			    ),
			    'ship_number' => array(
					'title'       => __('Shipper Number', 'extensionworks'),
					'type'        => 'text',
					'description' => __('UPS Shipper Number', 'extensionworks'),
					'default'     => ''
			    ),
			    'origin_state' => array(
					'title'       => __('State Province Code', 'extensionworks'),
					'type'        => 'text',
					'description' => __('The origin state/province code, like CA in USA', 'extensionworks'),
					'default'     => ''
			    ),
			    'pickup' => array(
					'title'   => __('Pick Up Option', 'extensionworks'),
					'type'    => 'select',
					'default' => '01',
					'options' => array(
						'01' => 'Daily Pickup',
						'03' => 'Customer Counter',
						'06' => 'One Time Pickup',
						'07' => 'On Call Air',
						'11' => 'Suggested Retail Rates',
						'19' => 'Letter Center',
						'20' => 'Air Service Center'
					)
			    ),	 
			    'residential_address' => array(
					'title'       => __('Residential address', 'extensionworks'),
					'type'        => 'checkbox',
					'label'       => __('Ship to residential address', 'extensionworks'),
					'description' => __('Turn on this option will assume you will ship to residential address always.
					UPS usually adds some surcharge to ship to residential address.', 'extensionworks'),
					'default' => 'no'
			    ), 
			
			);

			$this->form_fields = apply_filters( 'shipping_ups_field', array_merge($this->form_fields, $form_fields ) );
		}



		function get_available_services( $methods ){

			global $woocommerce;

			$country = $woocommerce->countries->get_base_country();

			$codes = '';

			if ( array_key_exists( $country, $this->services_location )) 
				$codes = $this->services_location[ $country ];
			else
				$codes = $this->worldwide;

			foreach ($methods as $code) {
				if ( in_array( $code, $codes )) {
						$available_methods[] = $code ;
				}
			}

			return $available_methods;
		}


		/**
        * Get rates for each package with certain methods
        */
        function get_package_rates( $packages, $methods = array() ) {

        	$this->packages = $packages;

        	$rates = array();

        	$methods = $this->get_available_services( $methods );

        	foreach ($methods as  $code) {
        		$rates[] = $this->get_shipping_response( $code );
        	}

        	if ( !empty($rates) ) {
        		foreach ($rates as $key => $rate) {
        			if(empty( $rate ))
        				unset($rates[ $key ]);
        		}
              return $rates;
            }  	

        }


		/**
		 * Where we actually calculation shipping quotes and return response
		 * by using encode and decode
		 */
		function get_shipping_response( $method_code ) {
			global $woocommerce;

			$debug_response = '';

			$request = $this->encode( $method_code );

			$this->add_debug_message( $request, "UPS post request, method:$method_code");

			if ($request) {

				$response = wp_remote_post($this->endpoint, array(
				    'method' => 'POST',
				    'body' => $request,
				    'timeout' => 70,
				    'sslverify' => 0
					));
				if (!is_wp_error($response)) {

					$result = $response['body'];
					
					$this->add_debug_message( $result, 'UPS post response');

					if ($result) {
						$rate = $this->decode( $result );
						if ( is_array( $rate ) ){
							return $rate;
						}
					} 
				}
			}

		}

		/**
		 * Encode the request
		 */
		function encode($service_code ) {

			global $woocommerce;

			$customer = $woocommerce->customer;

			$encode = '';
			
			/**
			 * encode xml, the request allows max 200 packages, we still keep track of the package count and create request batch
			 */
			
			$access = array(
				"AccessLicenseNumber" => $this->access_code,
				"UserId"              => $this->user_id,
				"Password"            => $this->password,
			);

			$request = array(
			    "Request" => array(
					"TransactionReference" => array(
						"CustomerContext" => "WooCommerce UPS packages",
						"XpciVersion"     => "1.0"
					),
					"RequestAction" => "Rate",
					"RequestOption" => "Rate",
			    ),
			    "PickupType" => array(
					"Code" => $this->pickup
			    ),
			    "Shipment" => array(
					"Description" => "WooCommerce UPS packages",
					"Shipper"     => array(
						"ShipperNumber" => $this->ship_number,
						"Address"       => array(
						"PostalCode"  => $this->origin,
						"CountryCode" => $this->origin_country
					    )
					),
					"ShipTo" => array(
					    "Address" => array(
							"StateProvinceCode" => $customer->get_shipping_state(),
							"PostalCode"        => $customer->get_shipping_postcode(),
							"CountryCode"       => $customer->get_shipping_country()
					    ),
					),
					"ShipFrom" => array(
					    "Address" => array(
							"PostalCode"  => $this->origin,
							"CountryCode" => $this->origin_country
					    )
					),
					"Service" => array(
					    "Code" => $service_code
					),
			    )
			);

			if ( $this->origin_state != ''){
				$request['Shipment']['ShipFrom']['Address']['StateProvinceCode']    = $this->origin_state;
				$request['Shipment']['RateInformation']['NegotiatedRatesIndicator'] = '';
			}
				
	
			if($this->residential_address == 'yes'){
				$request['Shipment']['ShipTo']['Address']['ResidentialAddressIndicator'] = '';
			}
		
			$request["Shipment"]["Package"] = $this->encode_packages();
			
			$access_xml  = HipperXMLParser::toXML($access, "AccessRequest");
			$request_xml = HipperXMLParser::toXML($request, "RatingServiceSelectionRequest");
			$encode = $access_xml . $request_xml;
			return $encode;
		}

		function encode_packages( ){

			//make sure no package weight exceed 20kgs or don't calculate the shipping
			$product_bucket = array();
			foreach ( $this->packages as $package ) {
				$package = $package['container'];
				$product = array(
				    "PackagingType" => array("Code" => "02"),
				    "PackageWeight" => array(
						"UnitOfMeasurement" => array("Code" => 'LBS'),
						"Weight"            => $package->get_weight('gross')
				    ),
				    'Dimensions' => array(
				    	"UnitOfMeasurement" => array("Code" => 'IN'),
						"Length" => ceil( $package->get_width('outer') ),
						"Width"  => ceil ( $package->get_length('outer') ),
						"Height" => ceil ($package->get_height('outer')),
				    ),
				);

				array_push($product_bucket, $product);
			}

			return $product_bucket;
		}

		/**
		 * Decode the result
		 */
		function decode($response) {
			global $woocommerce;
			$rate = array();
			$response = HipperXMLParser::toArray($response);

			if (!is_array($response))
				return false;
			
			if ($response['Response']['ResponseStatusCode'] == "1") {

				$rate_response = $response['RatedShipment'];
				
				$rate['id']    = $rate_response['Service']['Code'];
				// $rate['label'] = $this->package_shipping_methods[$rate_response['Service']['Code']];
				$rate['cost'] = $rate_response['TotalCharges']['MonetaryValue'];

				if( isset($rate_response['NegotiatedRates']) )
					$rate['cost'] = $rate_response['NegotiatedRates']['NetSummaryCharges']['GrandTotal']['MonetaryValue'];
				return $rate;
			}elseif ( $response['Response']['ResponseStatusCode'] == 0 ){
				$debugResponse = $response['Response']['Error']['ErrorDescription'];
				return $debugResponse;
			}
			return false;
		}
		
	}

	/**
	 * Add usps to woo extension pool
	 */
	function add_ups_method( $methods ) {
		$methods[] = 'WC_Shipping_UPS';
		return $methods;
	}

	add_filter('woocommerce_shipping_methods', 'add_ups_method');

	function wc_shipping_ups_plugin_links( $links ) {

		$setting_url = admin_url( 'admin.php?page=woocommerce_settings&tab=shipping&section=WC_Shipping_UPS' );

        if ( check_woo_version('2.1') ){
            $setting_url = admin_url( 'admin.php?page=wc-settings&tab=shipping&section=wc_shipping_ups' );
        }

        $plugin_links = array(
            '<a href="' . $setting_url . '">' . __( 'Settings', 'extensionworks' ) . '</a>',
            '<a href="http://help.extensionworks.com/hc/en-us/requests/new">' . __( 'Support', 'extensionworks' ) . '</a>',
            '<a href="http://help.extensionworks.com/hc/en-us/categories/200037578-WooCommerce-UPS">' . __( 'Docs', 'extensionworks' ) . '</a>',
        );

        return array_merge( $plugin_links, $links );
    }

    add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wc_shipping_ups_plugin_links' );
}
