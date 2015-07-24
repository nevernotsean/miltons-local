<?php 
require_once (dirname ( __FILE__ ) . '/../xmlparser.php');  

class UPS_Label{

	var $msg = array();

	var $confirm_url;
	var $accept_url;

	public function generate_label( $shipping_info ){

		if( $shipping_info['testmode'] != 'no'){
			$this->confirm_url = 'https://wwwcie.ups.com/ups.app/xml/ShipConfirm';
			$this->accept_url = 'https://wwwcie.ups.com/ups.app/xml/ShipAccept';
		}else{
			$this->confirm_url = 'https://onlinetools.ups.com/ups.app/xml/ShipConfirm';
			$this->accept_url = 'https://onlinetools.ups.com/ups.app/xml/ShipAccept';
		}


		$request = array();

		
		$request = $this->generate_package_comfirm_request( $shipping_info );

		$response = $this->post_request( $request, $this->confirm_url );

		$digest = $this->decode_comfirm_response( $response );

		if( !empty( $this->msg ) )
			return;

		$request = $this->generate_accept_request( $shipping_info, $digest );

		$response = $this->post_request( $request, $this->accept_url );

		$result = $this->decode_accept_response( $response );

		if( !empty( $this->msg ) )
			return;

		if( isset( $shipping_info['order'] ) && $shipping_info['order'] != '')
			update_post_meta( $shipping_info['order']->id, '_ups_label', $result);


		return $result;

	}

	public function get_error_msg(){

		return $this->msg;
	}

	public function decode_accept_response( $response ){
		if( strlen($response) == 0 ){
			$this->msg[] = 'cannot connect to server';
			return;
		}

		$result = HipperXMLParser::toArray( $response );

		if( $result['Response']['ResponseStatusCode'] == '1' ){

			$identificationNumber = $result['ShipmentResults']['ShipmentIdentificationNumber'];

			$save_path = plugin_dir_path ( __FILE__ ) . '../generated_labels';
			$save_url = plugin_dir_url( __FILE__ ) . '../generated_labels/'; 


			
			$image = base64_decode( $result['ShipmentResults']['PackageResults']['LabelImage']['GraphicImage'] );

			$file = $save_path . '/' . $identificationNumber . '.gif';

			$file = $save_path . '/' . $identificationNumber . '.gif';


			//check folder
			if( !is_dir( $save_path ) ){

				//create folder
				mkdir( $save_path );
			}


			$fp = @fopen( $file, 'wb');

			if( !$fp ){
				return 'can\'t open file';
			}
			$byte = fwrite($fp, $image); //Create PNG or PDF file

			fclose($fp);

		
			$label_link =  $save_url  . $identificationNumber . '.gif';  
			$data = array(
				'tracking_number' => $identificationNumber,
				'label_link' => $label_link,
				'shipped_date' => date("m/d/Y"),
			);

			echo '<pre>label_link ' . print_r( $data, true ) .'</pre>';
			return $data;
		}
	}

	public function generate_accept_request( $shipping_info, $digest ){

		$access = $shipping_info['sender']['access'];

		$request = array(
			"Request" => array(
				"RequestAction" => "ShipAccept",
				"RequestOption" => "1",
			),
			'ShipmentDigest' => $digest

		);

		$data = HipperXMLParser::toXML( $access, 'AccessRequest');
					
		$data .= HipperXMLParser::toXML($request, "ShipmentAcceptRequest");

		return $data;
	}


	public function decode_comfirm_response( $response ){


		if( strlen($response) == 0 ){
			$this->msg[] = 'cannot connect to server';
			return;
		}

		$result = HipperXMLParser::toArray( $response );

		if( $result['Response']['ResponseStatusCode'] != '1' ){
			$this->msg[] = $result['Response']['Error']['ErrorDescription'];
			return;
		}else{
			return $result['ShipmentDigest'];
		}

	}

	public function generate_package_comfirm_request( $shipping_info ){

		$access = $shipping_info['sender']['access'];

		$request = array(
			"Request" => array(
				"TransactionReference" => array(
					"CustomerContext" => "ExtensionWorks UPS label",
					"XpciVersion"     => "1.0001"
				),
				"RequestAction" => "ShipConfirm",
				"RequestOption" => "nonvalidate",
		    ),
			'LabelSpecification' => array(
				'LabelPrintMethod' => array(
					'Code' => 'GIF',
					'Description' => 'GIF file',
				),
				'HTTPUserAgent' => 'Mozilla/4.5',
				'LabelImageFormat'	=> array(
					'Code' => 'GIF',
					'Description' => 'GIF file',
				),	
			),
			
			"Shipment" => array(
				"Description" => "ExtensionWorks UPS packages",
				"Shipper" => array(
					'Name' => $shipping_info['sender']['contact_name'],
					'AttentionName' => $shipping_info['sender']['company'],
					'PhoneNumber' => $shipping_info['sender']['phone'],
					'ShipperNumber' => $shipping_info['sender']['shipper_number'],
					"Address"       => array(
						'AddressLine1' => $shipping_info['sender']['address1'],
						'City' => $shipping_info['sender']['city'],
						"StateProvinceCode" => $shipping_info['sender']['state'],
						"PostalCode"  => $shipping_info['sender']['postcode'],
						"CountryCode" => 'US'
				    )
				),
				"ShipTo" => array(
					'CompanyName' => $shipping_info['recipient']['company'],
					'AttentionName' => $shipping_info['recipient']['company'],
					'PhoneNumber' => $shipping_info['recipient']['phone'],
				    "Address" => array(
						'AddressLine1' => $shipping_info['recipient']['address1'],
						'City' => $shipping_info['recipient']['city'],
						"StateProvinceCode" => $shipping_info['recipient']['state'],
						"PostalCode"        => $shipping_info['recipient']['postcode'],
						"CountryCode"       => $shipping_info['recipient']['country_code'],
				    ),
				),
				"ShipFrom" => array(
				    'CompanyName' => $shipping_info['sender']['company'],
					'AttentionName' => $shipping_info['sender']['company'],
					'PhoneNumber' => $shipping_info['sender']['phone'],
					    "Address" => array(
							'AddressLine1' => $shipping_info['sender']['address1'],
							'City' => $shipping_info['sender']['city'],
							"StateProvinceCode" => $shipping_info['sender']['state'],
							"PostalCode"        => $shipping_info['sender']['postcode'],
							"CountryCode"       => 'US'
						),
				),
				'PaymentInformation' => array(
					'Prepaid' => array(
						'BillShipper' => array(
							'AccountNumber'=> $shipping_info['sender']['shipper_number']
						),
					),
											
				),
				"Service" => array(
				    "Code" => $shipping_info['recipient']['shipping_method'],
				),
		    )
			
		);

		
		$product_bucket = array();
		foreach ( $shipping_info['packages'] as $package ) {
			$package = $package['container'];
			$product = array(
			    "PackagingType" => array("Code" => "02"),
			    "PackageWeight" => array(
					"UnitOfMeasurement" => array("Code" => 'LBS'),
					"Weight"            => $package['gross_weight']
			    ),
			    'Dimensions' => array(
			    	"UnitOfMeasurement" => array("Code" => 'IN'),
					"Length" => ceil( $package['outer_length'] ),
					"Width"  => ceil ( $package['outer_width'] ),
					"Height" => ceil ( $package['outer_height'] ),
			    ),
			);

			array_push($product_bucket, $product);
		}

		$request['Shipment']['Package'] = $product_bucket;
		
		$data = HipperXMLParser::toXML( $access, 'AccessRequest');
		
		$data  .= HipperXMLParser::toXML($request, "ShipmentConfirmRequest");

		return $data;
	}

	


	public function post_request( $data, $url ){

		$ch = curl_init();    // initialize curl handle
		curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
		curl_setopt($ch, CURLOPT_TIMEOUT, 3); // times out after 4s
		curl_setopt($ch, CURLOPT_POST, 1); // set POST method

		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS,$data);
		$result = curl_exec($ch);
		curl_close($ch);

		return $result;
	}

}


?>