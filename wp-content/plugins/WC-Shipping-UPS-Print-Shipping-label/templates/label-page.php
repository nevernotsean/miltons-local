<?php

wp_enqueue_style( 'bootstrapcss' );
$country =array(
	'AF' => __( 'Afghanistan', 'woocommerce' ),
	'AX' => __( '&#197;land Islands', 'woocommerce' ),
	'AL' => __( 'Albania', 'woocommerce' ),
	'DZ' => __( 'Algeria', 'woocommerce' ),
	'AD' => __( 'Andorra', 'woocommerce' ),
	'AO' => __( 'Angola', 'woocommerce' ),
	'AI' => __( 'Anguilla', 'woocommerce' ),
	'AQ' => __( 'Antarctica', 'woocommerce' ),
	'AG' => __( 'Antigua and Barbuda', 'woocommerce' ),
	'AR' => __( 'Argentina', 'woocommerce' ),
	'AM' => __( 'Armenia', 'woocommerce' ),
	'AW' => __( 'Aruba', 'woocommerce' ),
	'AU' => __( 'Australia', 'woocommerce' ),
	'AT' => __( 'Austria', 'woocommerce' ),
	'AZ' => __( 'Azerbaijan', 'woocommerce' ),
	'BS' => __( 'Bahamas', 'woocommerce' ),
	'BH' => __( 'Bahrain', 'woocommerce' ),
	'BD' => __( 'Bangladesh', 'woocommerce' ),
	'BB' => __( 'Barbados', 'woocommerce' ),
	'BY' => __( 'Belarus', 'woocommerce' ),
	'BE' => __( 'Belgium', 'woocommerce' ),
	'PW' => __( 'Belau', 'woocommerce' ),
	'BZ' => __( 'Belize', 'woocommerce' ),
	'BJ' => __( 'Benin', 'woocommerce' ),
	'BM' => __( 'Bermuda', 'woocommerce' ),
	'BT' => __( 'Bhutan', 'woocommerce' ),
	'BO' => __( 'Bolivia', 'woocommerce' ),
	'BQ' => __( 'Bonaire, Saint Eustatius and Saba', 'woocommerce' ),
	'BA' => __( 'Bosnia and Herzegovina', 'woocommerce' ),
	'BW' => __( 'Botswana', 'woocommerce' ),
	'BV' => __( 'Bouvet Island', 'woocommerce' ),
	'BR' => __( 'Brazil', 'woocommerce' ),
	'IO' => __( 'British Indian Ocean Territory', 'woocommerce' ),
	'VG' => __( 'British Virgin Islands', 'woocommerce' ),
	'BN' => __( 'Brunei', 'woocommerce' ),
	'BG' => __( 'Bulgaria', 'woocommerce' ),
	'BF' => __( 'Burkina Faso', 'woocommerce' ),
	'BI' => __( 'Burundi', 'woocommerce' ),
	'KH' => __( 'Cambodia', 'woocommerce' ),
	'CM' => __( 'Cameroon', 'woocommerce' ),
	'CA' => __( 'Canada', 'woocommerce' ),
	'CV' => __( 'Cape Verde', 'woocommerce' ),
	'KY' => __( 'Cayman Islands', 'woocommerce' ),
	'CF' => __( 'Central African Republic', 'woocommerce' ),
	'TD' => __( 'Chad', 'woocommerce' ),
	'CL' => __( 'Chile', 'woocommerce' ),
	'CN' => __( 'China', 'woocommerce' ),
	'CX' => __( 'Christmas Island', 'woocommerce' ),
	'CC' => __( 'Cocos (Keeling) Islands', 'woocommerce' ),
	'CO' => __( 'Colombia', 'woocommerce' ),
	'KM' => __( 'Comoros', 'woocommerce' ),
	'CG' => __( 'Congo (Brazzaville)', 'woocommerce' ),
	'CD' => __( 'Congo (Kinshasa)', 'woocommerce' ),
	'CK' => __( 'Cook Islands', 'woocommerce' ),
	'CR' => __( 'Costa Rica', 'woocommerce' ),
	'HR' => __( 'Croatia', 'woocommerce' ),
	'CU' => __( 'Cuba', 'woocommerce' ),
	'CW' => __( 'Cura&Ccedil;ao', 'woocommerce' ),
	'CY' => __( 'Cyprus', 'woocommerce' ),
	'CZ' => __( 'Czech Republic', 'woocommerce' ),
	'DK' => __( 'Denmark', 'woocommerce' ),
	'DJ' => __( 'Djibouti', 'woocommerce' ),
	'DM' => __( 'Dominica', 'woocommerce' ),
	'DO' => __( 'Dominican Republic', 'woocommerce' ),
	'EC' => __( 'Ecuador', 'woocommerce' ),
	'EG' => __( 'Egypt', 'woocommerce' ),
	'SV' => __( 'El Salvador', 'woocommerce' ),
	'GQ' => __( 'Equatorial Guinea', 'woocommerce' ),
	'ER' => __( 'Eritrea', 'woocommerce' ),
	'EE' => __( 'Estonia', 'woocommerce' ),
	'ET' => __( 'Ethiopia', 'woocommerce' ),
	'FK' => __( 'Falkland Islands', 'woocommerce' ),
	'FO' => __( 'Faroe Islands', 'woocommerce' ),
	'FJ' => __( 'Fiji', 'woocommerce' ),
	'FI' => __( 'Finland', 'woocommerce' ),
	'FR' => __( 'France', 'woocommerce' ),
	'GF' => __( 'French Guiana', 'woocommerce' ),
	'PF' => __( 'French Polynesia', 'woocommerce' ),
	'TF' => __( 'French Southern Territories', 'woocommerce' ),
	'GA' => __( 'Gabon', 'woocommerce' ),
	'GM' => __( 'Gambia', 'woocommerce' ),
	'GE' => __( 'Georgia', 'woocommerce' ),
	'DE' => __( 'Germany', 'woocommerce' ),
	'GH' => __( 'Ghana', 'woocommerce' ),
	'GI' => __( 'Gibraltar', 'woocommerce' ),
	'GR' => __( 'Greece', 'woocommerce' ),
	'GL' => __( 'Greenland', 'woocommerce' ),
	'GD' => __( 'Grenada', 'woocommerce' ),
	'GP' => __( 'Guadeloupe', 'woocommerce' ),
	'GT' => __( 'Guatemala', 'woocommerce' ),
	'GG' => __( 'Guernsey', 'woocommerce' ),
	'GN' => __( 'Guinea', 'woocommerce' ),
	'GW' => __( 'Guinea-Bissau', 'woocommerce' ),
	'GY' => __( 'Guyana', 'woocommerce' ),
	'HT' => __( 'Haiti', 'woocommerce' ),
	'HM' => __( 'Heard Island and McDonald Islands', 'woocommerce' ),
	'HN' => __( 'Honduras', 'woocommerce' ),
	'HK' => __( 'Hong Kong', 'woocommerce' ),
	'HU' => __( 'Hungary', 'woocommerce' ),
	'IS' => __( 'Iceland', 'woocommerce' ),
	'IN' => __( 'India', 'woocommerce' ),
	'ID' => __( 'Indonesia', 'woocommerce' ),
	'IR' => __( 'Iran', 'woocommerce' ),
	'IQ' => __( 'Iraq', 'woocommerce' ),
	'IE' => __( 'Republic of Ireland', 'woocommerce' ),
	'IM' => __( 'Isle of Man', 'woocommerce' ),
	'IL' => __( 'Israel', 'woocommerce' ),
	'IT' => __( 'Italy', 'woocommerce' ),
	'CI' => __( 'Ivory Coast', 'woocommerce' ),
	'JM' => __( 'Jamaica', 'woocommerce' ),
	'JP' => __( 'Japan', 'woocommerce' ),
	'JE' => __( 'Jersey', 'woocommerce' ),
	'JO' => __( 'Jordan', 'woocommerce' ),
	'KZ' => __( 'Kazakhstan', 'woocommerce' ),
	'KE' => __( 'Kenya', 'woocommerce' ),
	'KI' => __( 'Kiribati', 'woocommerce' ),
	'KW' => __( 'Kuwait', 'woocommerce' ),
	'KG' => __( 'Kyrgyzstan', 'woocommerce' ),
	'LA' => __( 'Laos', 'woocommerce' ),
	'LV' => __( 'Latvia', 'woocommerce' ),
	'LB' => __( 'Lebanon', 'woocommerce' ),
	'LS' => __( 'Lesotho', 'woocommerce' ),
	'LR' => __( 'Liberia', 'woocommerce' ),
	'LY' => __( 'Libya', 'woocommerce' ),
	'LI' => __( 'Liechtenstein', 'woocommerce' ),
	'LT' => __( 'Lithuania', 'woocommerce' ),
	'LU' => __( 'Luxembourg', 'woocommerce' ),
	'MO' => __( 'Macao S.A.R., China', 'woocommerce' ),
	'MK' => __( 'Macedonia', 'woocommerce' ),
	'MG' => __( 'Madagascar', 'woocommerce' ),
	'MW' => __( 'Malawi', 'woocommerce' ),
	'MY' => __( 'Malaysia', 'woocommerce' ),
	'MV' => __( 'Maldives', 'woocommerce' ),
	'ML' => __( 'Mali', 'woocommerce' ),
	'MT' => __( 'Malta', 'woocommerce' ),
	'MH' => __( 'Marshall Islands', 'woocommerce' ),
	'MQ' => __( 'Martinique', 'woocommerce' ),
	'MR' => __( 'Mauritania', 'woocommerce' ),
	'MU' => __( 'Mauritius', 'woocommerce' ),
	'YT' => __( 'Mayotte', 'woocommerce' ),
	'MX' => __( 'Mexico', 'woocommerce' ),
	'FM' => __( 'Micronesia', 'woocommerce' ),
	'MD' => __( 'Moldova', 'woocommerce' ),
	'MC' => __( 'Monaco', 'woocommerce' ),
	'MN' => __( 'Mongolia', 'woocommerce' ),
	'ME' => __( 'Montenegro', 'woocommerce' ),
	'MS' => __( 'Montserrat', 'woocommerce' ),
	'MA' => __( 'Morocco', 'woocommerce' ),
	'MZ' => __( 'Mozambique', 'woocommerce' ),
	'MM' => __( 'Myanmar', 'woocommerce' ),
	'NA' => __( 'Namibia', 'woocommerce' ),
	'NR' => __( 'Nauru', 'woocommerce' ),
	'NP' => __( 'Nepal', 'woocommerce' ),
	'NL' => __( 'Netherlands', 'woocommerce' ),
	'AN' => __( 'Netherlands Antilles', 'woocommerce' ),
	'NC' => __( 'New Caledonia', 'woocommerce' ),
	'NZ' => __( 'New Zealand', 'woocommerce' ),
	'NI' => __( 'Nicaragua', 'woocommerce' ),
	'NE' => __( 'Niger', 'woocommerce' ),
	'NG' => __( 'Nigeria', 'woocommerce' ),
	'NU' => __( 'Niue', 'woocommerce' ),
	'NF' => __( 'Norfolk Island', 'woocommerce' ),
	'KP' => __( 'North Korea', 'woocommerce' ),
	'NO' => __( 'Norway', 'woocommerce' ),
	'OM' => __( 'Oman', 'woocommerce' ),
	'PK' => __( 'Pakistan', 'woocommerce' ),
	'PS' => __( 'Palestinian Territory', 'woocommerce' ),
	'PA' => __( 'Panama', 'woocommerce' ),
	'PG' => __( 'Papua New Guinea', 'woocommerce' ),
	'PY' => __( 'Paraguay', 'woocommerce' ),
	'PE' => __( 'Peru', 'woocommerce' ),
	'PH' => __( 'Philippines', 'woocommerce' ),
	'PN' => __( 'Pitcairn', 'woocommerce' ),
	'PL' => __( 'Poland', 'woocommerce' ),
	'PT' => __( 'Portugal', 'woocommerce' ),
	'QA' => __( 'Qatar', 'woocommerce' ),
	'RE' => __( 'Reunion', 'woocommerce' ),
	'RO' => __( 'Romania', 'woocommerce' ),
	'RU' => __( 'Russia', 'woocommerce' ),
	'RW' => __( 'Rwanda', 'woocommerce' ),
	'BL' => __( 'Saint Barth&eacute;lemy', 'woocommerce' ),
	'SH' => __( 'Saint Helena', 'woocommerce' ),
	'KN' => __( 'Saint Kitts and Nevis', 'woocommerce' ),
	'LC' => __( 'Saint Lucia', 'woocommerce' ),
	'MF' => __( 'Saint Martin (French part)', 'woocommerce' ),
	'SX' => __( 'Saint Martin (Dutch part)', 'woocommerce' ),
	'PM' => __( 'Saint Pierre and Miquelon', 'woocommerce' ),
	'VC' => __( 'Saint Vincent and the Grenadines', 'woocommerce' ),
	'SM' => __( 'San Marino', 'woocommerce' ),
	'ST' => __( 'S&atilde;o Tom&eacute; and Pr&iacute;ncipe', 'woocommerce' ),
	'SA' => __( 'Saudi Arabia', 'woocommerce' ),
	'SN' => __( 'Senegal', 'woocommerce' ),
	'RS' => __( 'Serbia', 'woocommerce' ),
	'SC' => __( 'Seychelles', 'woocommerce' ),
	'SL' => __( 'Sierra Leone', 'woocommerce' ),
	'SG' => __( 'Singapore', 'woocommerce' ),
	'SK' => __( 'Slovakia', 'woocommerce' ),
	'SI' => __( 'Slovenia', 'woocommerce' ),
	'SB' => __( 'Solomon Islands', 'woocommerce' ),
	'SO' => __( 'Somalia', 'woocommerce' ),
	'ZA' => __( 'South Africa', 'woocommerce' ),
	'GS' => __( 'South Georgia/Sandwich Islands', 'woocommerce' ),
	'KR' => __( 'South Korea', 'woocommerce' ),
	'SS' => __( 'South Sudan', 'woocommerce' ),
	'ES' => __( 'Spain', 'woocommerce' ),
	'LK' => __( 'Sri Lanka', 'woocommerce' ),
	'SD' => __( 'Sudan', 'woocommerce' ),
	'SR' => __( 'Suriname', 'woocommerce' ),
	'SJ' => __( 'Svalbard and Jan Mayen', 'woocommerce' ),
	'SZ' => __( 'Swaziland', 'woocommerce' ),
	'SE' => __( 'Sweden', 'woocommerce' ),
	'CH' => __( 'Switzerland', 'woocommerce' ),
	'SY' => __( 'Syria', 'woocommerce' ),
	'TW' => __( 'Taiwan', 'woocommerce' ),
	'TJ' => __( 'Tajikistan', 'woocommerce' ),
	'TZ' => __( 'Tanzania', 'woocommerce' ),
	'TH' => __( 'Thailand', 'woocommerce' ),
	'TL' => __( 'Timor-Leste', 'woocommerce' ),
	'TG' => __( 'Togo', 'woocommerce' ),
	'TK' => __( 'Tokelau', 'woocommerce' ),
	'TO' => __( 'Tonga', 'woocommerce' ),
	'TT' => __( 'Trinidad and Tobago', 'woocommerce' ),
	'TN' => __( 'Tunisia', 'woocommerce' ),
	'TR' => __( 'Turkey', 'woocommerce' ),
	'TM' => __( 'Turkmenistan', 'woocommerce' ),
	'TC' => __( 'Turks and Caicos Islands', 'woocommerce' ),
	'TV' => __( 'Tuvalu', 'woocommerce' ),
	'UG' => __( 'Uganda', 'woocommerce' ),
	'UA' => __( 'Ukraine', 'woocommerce' ),
	'AE' => __( 'United Arab Emirates', 'woocommerce' ),
	'GB' => __( 'United Kingdom', 'woocommerce' ),
	'US' => __( 'United States', 'woocommerce' ),
	'UY' => __( 'Uruguay', 'woocommerce' ),
	'UZ' => __( 'Uzbekistan', 'woocommerce' ),
	'VU' => __( 'Vanuatu', 'woocommerce' ),
	'VA' => __( 'Vatican', 'woocommerce' ),
	'VE' => __( 'Venezuela', 'woocommerce' ),
	'VN' => __( 'Vietnam', 'woocommerce' ),
	'WF' => __( 'Wallis and Futuna', 'woocommerce' ),
	'EH' => __( 'Western Sahara', 'woocommerce' ),
	'WS' => __( 'Western Samoa', 'woocommerce' ),
	'YE' => __( 'Yemen', 'woocommerce' ),
	'ZM' => __( 'Zambia', 'woocommerce' ),
	'ZW' => __( 'Zimbabwe', 'woocommerce' )
	);



//fetch general settings
$settings  = get_option( 'woocommerce_WC_Shipping_UPS_settings' );

$admin_email = get_option('admin_email');

$errors = array();

// echo '<pre>setting ' . print_r( $settings, true ) .'</pre>';
//set shipping information
$shipping_info ['packaging_type'] = 'YOUR_PACKAGING';

$shipping_info['testmode'] = $settings['testmode'];

$shipping_info ['date'] = date("m/d/Y"); 

$shipping_info ['sender'] = array (
	'country_code' => 'US',
	'company'      =>  isset( $settings['sender_company'] ) ? $settings['sender_company'] : '',
	'contact_name' => $settings['sender_first_name'] . ' ' . $settings['sender_last_name'],
	'first_name'   => $settings['sender_first_name'],
	'last_name'    => $settings['sender_last_name'],
	'address1'     => $settings['sender_address_1'],
	'address2'     => $settings['sender_address_2'],
	'city'         => $settings['sender_city'],
	'state'        => $settings['sender_state'],
	'postcode'     => $settings['origin'],
	'phone'        => $settings['sender_phone'],
	'shipper_number' => $settings['ship_number'],
	'access' 		=>array(
		'AccessLicenseNumber' => $settings['access_code'],
		'UserId' => $settings['user_id'],
		'Password' => $settings['password'],
	),
);


$shipping_info ['recipient'] = array (
		'first_name' =>'',
		'last_name' => '',
		'country' => 'United States',
		'country_code' => 'US',
		'company' => '',
		'contact_name' => '',
		'address1' => '',
		'address2' => '',
		'city' => '',
		'state' => '',
		'postcode' => '',
		'phone' => '',
		'shipping_method' => ''
	);


$weight_unit    = esc_attr( get_option('woocommerce_weight_unit' ));			
$dimension_unit = esc_attr( get_option('woocommerce_dimension_unit' ));
$shipping_info['weight_unit']    = 'LB';
$shipping_info['dimension_unit'] = 'IN';


//set order
$order = '';

$label_result = '';

$packages = array();

$boxes = $settings['boxes'];

$package_meta_key = '';

$choosen_method = '';

if( isset( $_GET['order_id'] ) ){
	//fetch order information
	$order_id =  $_GET['order_id'];
	$order = get_post ( $order_id );
	if (! $order || $order->post_type != 'shop_order') {
		//error
	}else{
		$order = new WC_Order ( $order->ID );


		$choosen_method = get_post_meta( $order->id, '_shipping_method', true );
		if( preg_match('/:/', $choosen_method) ){	
			$choosen_method = explode( ':',  $choosen_method);

			$choosen_method = $choosen_method[1];
		}

		$label_method = 'priority';
		switch ( $choosen_method ) {
			case 'D_EXPRESS_MAIL':
				$label_method = 'priority_express';
				break;
			case 'I_PRIORITY_MAIL':
				$label_method = 'priority_international';
				break;
			case 'D_FIRST_CLASS':
			case 'I_FIRST_CLASS':
				$label_method = 'first_class';
				break;
			case 'D_STANDARD_POST':
				$label_method ='standard';
				break;

			case 'I_EXPRESS_MAIL':
				$label_method ='priority_express_international';
				break;
		}


		$package_meta_key = '_order_package';
		

		if( $order != '' ){
			$packages = get_post_meta( $order->id, $package_meta_key, true );

			$label_result = get_post_meta( $order->id, '_ups_label' );

			if( is_array( $label_result ) && count( $label_result)>0 ){
				$label_result = $label_result[0];
			}else{
				$label_result = '';
			}

		}
			$packages = get_post_meta( $order->id, $package_meta_key, true );

		if( !is_array( $packages ))
			$packages = array();

		$shipping_info['recipient'] = array (
			'country_code' => $order->shipping_country,
			'country'      => $country[ $order->shipping_country ],
			'company'      => $order->shipping_company,
			'contact_name' => $order->shipping_first_name . ' ' . $order->shipping_last_name,
			'first_name'   => $order->shipping_first_name,
			'last_name'    => $order->shipping_last_name,
			'address1'     => $order->shipping_address_1,
			'address2'     => $order->shipping_address_2,
			'city'         => $order->shipping_city,
			'state'        => $order->shipping_state,
			'postcode'     => $order->shipping_postcode,
			'phone'        => $order->billing_phone,
			'shipping_method'    => $label_method,
		);

		$shipping_info['order'] = $order;

		$shipping_info['packages'] = $packages;
	}

	

}


if( isset( $_POST['save_package'] ) ){

	if( isset( $_POST['shipping_info']['packages'] ) ){
		foreach ($_POST['shipping_info']['packages'] as $key => $package ) {
			if ( isset( $packages[ $key ] ) ){
				$packages[ $key ]['container'] = array_merge( $packages[ $key ]['container'], $package['container']);
			}else{
				$packages[ $key ] = $package;

			}
			$packages[ $key ]['container']['label'] = $boxes[ $packages[ $key ]['container']['label'] ]['label'];
		}

		// die();
		if( $order != '' )
			update_post_meta( $order->id, $package_meta_key, $packages );

		//checking package inform
		foreach ($packages as $key => $package ) {
			$container = $package['container'];

			if( $container['outer_length'] == '' )
				$errors[]= 'The <strong>Outer Length</strong> in package ' . ($key+1) . ' is empty.';

			if( $container['outer_width'] == '' )
				$errors[]= 'The <strong>Outer Width</strong> in package ' . ($key+1) . ' is empty.';

			if( $container['outer_height'] == '' )
				$errors[]= 'The <strong>Outer Height</strong> in package ' . ($key+1) . ' is empty.';

			if( $container['gross_weight'] == '' )
				$errors[]= 'The <strong>Gross Weight</strong> in package ' . ($key+1) . ' is empty.';

			if( $container['girth'] == '' )
				$errors[]= 'The <strong>girth</strong> in package ' . ($key+1) . ' is empty.';
		}

	}else{
		$errors[]= 'Haven\'t found any package information, Please create one.';
	}

	

	
	
}


if( isset( $_POST['generate_label'] ) ){
	

	$shipping_info = array_merge($shipping_info, $_POST['shipping_info']);

	$shipping_info['recipient']['contact_name'] = $shipping_info['recipient']['first_name'] . ' ' . $shipping_info['recipient']['last_name'];
	$shipping_info['recipient']['country'] = $country[ $shipping_info['recipient']['country_code'] ];

	$shipping_info['packages'] = $packages;

	//process request

	if ( count( $errors ) == 0 ) {
		
		require_once( dirname(__FILE__) .'/../classes/class-label.php');
		$label = new UPS_Label();

		$label_result = $label->generate_label( $shipping_info );

		$errors = $label->get_error_msg();

		// if( !empty( $label->get_error_msg() ) ){

		// 	foreach ($label->get_error_msg() as $msg) {
		// 		$errors[] = $msg;
		// 	}
		// }

	}
} 






$showed_meta = array(

	'outer_length' => 'Outer Length',
    'outer_width' => 'Outer Width',
    'outer_height' => 'Outer Height',
    'girth' => 'Girth',
    'gross_weight' => 'Gross Weight',
    'net_weight' => 'Net Weight',
    'max_weight' => 'Max Weight',
    'box_weight' => 'Box Weight',
);


?>
<div>
	<?php //screen_icon(); ?>
	<h2>Generate UPS Label</h2>
	<?php foreach ($errors as $key => $error): ?>
	<div class="alert alert-danger" >
		<?php echo $error; ?>
	</div>
	<?php endforeach; ?>

	<form action="" method="post" >
		<div class='row'>
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">To Information</div>

					<div class="panel-body">
						<ul>
							<li>
								<div class="input-group">
									<span class="input-group-addon">First Name: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][first_name]" value="<?php echo $shipping_info['recipient']['first_name']?>" >
								</div>
							</li>

							<li>
								<div class="input-group">
									<span class="input-group-addon">Last Name: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][last_name]" value="<?php echo $shipping_info['recipient']['last_name']?>" >
								</div>
							</li>


							<li>
								<div class="input-group">
									<span class="input-group-addon">Country/Location</span>
									<select  id="country" class="form-control" name="shipping_info[recipient][country_code]">
										<?php foreach ($country as $key => $value): ?>
										<option value="<?php echo $key; ?>"<?php selected( $key, $shipping_info['recipient']['country_code']);?>><?php echo $value; ?></option>
										<?php endforeach; ?>
										
									</select>
								</div>
							</li>

							<li>
								<div class="input-group">
									<span class="input-group-addon">Company: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][company]" value="<?php echo $shipping_info['recipient']['company']?>" >
								</div>
							</li>
							<li>
								<div class="input-group">
									<span class="input-group-addon">Address 1: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][address1]" value="<?php echo $shipping_info['recipient']['address1']?>" >
								</div>
							</li>
							<li>
								<div class="input-group">
									<span class="input-group-addon">Address 2: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][address2]"  value="<?php echo $shipping_info['recipient']['address2']?>" >
								</div>
							</li>
							<li>
								<div class="input-group">
									<span class="input-group-addon">Zipcode: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][postcode]" value="<?php echo $shipping_info['recipient']['postcode']?>" >
								</div>
							</li>
							<li>
								<div class="input-group">
									<span class="input-group-addon">City: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][city]" value="<?php echo $shipping_info['recipient']['city']?>" >
								</div>
							</li>
							<li>

								
								<div class="input-group" id="state">
									<span class="input-group-addon">State: </span>
									<input type="text"  class="form-control" placeholder="" value="<?php echo $shipping_info['recipient']['state']?>" >
  									
  									<select>

  										<?php if( $shipping_info['recipient']['country_code'] != 'US' ): ?>
  										<option value="<?php echo $shipping_info['recipient']['state']; ?>" ><?php echo $shipping_info['recipient']['state']; ?></option>
										<?php endif; ?>
										<option value=""  >Outside US</option>
										<option value="AL"<?php selected('AL', $shipping_info['recipient']['state']);?>>Alabama</option>
										<option value="AK"<?php selected('AK', $shipping_info['recipient']['state']);?>>Alaska</option>
										<option value="AZ"<?php selected('AZ', $shipping_info['recipient']['state']);?>>Arizona</option>
										<option value="AR"<?php selected('AR', $shipping_info['recipient']['state']);?>>Arkansas</option>
										<option value="CA"<?php selected('CA', $shipping_info['recipient']['state']);?>>California</option>
										<option value="CO"<?php selected('CO', $shipping_info['recipient']['state']);?>>Colorado</option>
										<option value="CT"<?php selected('CT', $shipping_info['recipient']['state']);?>>Connecticut</option>
										<option value="DE"<?php selected('DE', $shipping_info['recipient']['state']);?>>Delaware</option>
										<option value="DC"<?php selected('DC', $shipping_info['recipient']['state']);?>>District of Columbia</option>
										<option value="FL"<?php selected('FL', $shipping_info['recipient']['state']);?>>Florida</option>
										<option value="GA"<?php selected('GA', $shipping_info['recipient']['state']);?>>Georgia</option>
										<option value="HI"<?php selected('HI', $shipping_info['recipient']['state']);?>>Hawaii</option>
										<option value="ID"<?php selected('ID', $shipping_info['recipient']['state']);?>>Idaho</option>
										<option value="IL"<?php selected('IL', $shipping_info['recipient']['state']);?>>Illinois</option>
										<option value="IN"<?php selected('IN', $shipping_info['recipient']['state']);?>>Indiana</option>
										<option value="IA"<?php selected('IA', $shipping_info['recipient']['state']);?>>Iowa</option>
										<option value="KS"<?php selected('KS', $shipping_info['recipient']['state']);?>>Kansas</option>
										<option value="KY"<?php selected('KY', $shipping_info['recipient']['state']);?>>Kentucky</option>
										<option value="LA"<?php selected('LA', $shipping_info['recipient']['state']);?>>Louisiana</option>
										<option value="ME"<?php selected('ME', $shipping_info['recipient']['state']);?>>Maine</option>
										<option value="MD"<?php selected('MD', $shipping_info['recipient']['state']);?>>Maryland</option>
										<option value="MA"<?php selected('MA', $shipping_info['recipient']['state']);?>>Massachusetts</option>
										<option value="MI"<?php selected('MI', $shipping_info['recipient']['state']);?>>Michigan</option>
										<option value="MN"<?php selected('MN', $shipping_info['recipient']['state']);?>>Minnesota</option>
										<option value="MS"<?php selected('MS', $shipping_info['recipient']['state']);?>>Mississippi</option>
										<option value="MO"<?php selected('MO', $shipping_info['recipient']['state']);?>>Missouri</option>
										<option value="MT"<?php selected('MT', $shipping_info['recipient']['state']);?>>Montana</option>
										<option value="NE"<?php selected('NE', $shipping_info['recipient']['state']);?>>Nebraska</option>
										<option value="NV"<?php selected('NV', $shipping_info['recipient']['state']);?>>Nevada</option>
										<option value="NH"<?php selected('NH', $shipping_info['recipient']['state']);?>>New Hampshire</option>
										<option value="NJ"<?php selected('NJ', $shipping_info['recipient']['state']);?>>New Jersey</option>
										<option value="NM"<?php selected('NM', $shipping_info['recipient']['state']);?>>New Mexico</option>
										<option value="NY"<?php selected('NY', $shipping_info['recipient']['state']);?>>New York</option>
										<option value="NC"<?php selected('NC', $shipping_info['recipient']['state']);?>>North Carolina</option>
										<option value="ND"<?php selected('ND', $shipping_info['recipient']['state']);?>>North Dakota</option>
										<option value="OH"<?php selected('OH', $shipping_info['recipient']['state']);?>>Ohio</option>
										<option value="OK"<?php selected('OK', $shipping_info['recipient']['state']);?>>Oklahoma</option>
										<option value="OR"<?php selected('OR', $shipping_info['recipient']['state']);?>>Oregon</option>
										<option value="PA"<?php selected('PA', $shipping_info['recipient']['state']);?>>Pennsylvania</option>
										<option value="RI"<?php selected('RI', $shipping_info['recipient']['state']);?>>Rhode Island</option>
										<option value="SC"<?php selected('SC', $shipping_info['recipient']['state']);?>>South Carolina</option>
										<option value="SD"<?php selected('SD', $shipping_info['recipient']['state']);?>>South Dakota</option>
										<option value="TN"<?php selected('TN', $shipping_info['recipient']['state']);?>>Tennessee</option>
										<option value="TX"<?php selected('TX', $shipping_info['recipient']['state']);?>>Texas</option>
										<option value="UT"<?php selected('UT', $shipping_info['recipient']['state']);?>>Utah</option>
										<option value="VT"<?php selected('VT', $shipping_info['recipient']['state']);?>>Vermont</option>
										<option value="VA"<?php selected('VA', $shipping_info['recipient']['state']);?>>Virginia</option>
										<option value="WA"<?php selected('WA', $shipping_info['recipient']['state']);?>>Washington</option>
										<option value="WV"<?php selected('WV', $shipping_info['recipient']['state']);?>>West Virginia</option>
										<option value="WI"<?php selected('WI', $shipping_info['recipient']['state']);?>>Wisconsin</option>
										<option value="WY"<?php selected('WY', $shipping_info['recipient']['state']);?>>Wyoming</option>
  									</select>

  									<input type="hidden"  class="form-control" placeholder="" name="shipping_info[recipient][state]" value="" >
								</div>
							</li>

							<li>
								<div class="input-group">
									<span class="input-group-addon">Phone number: </span>
  									<input type="text" class="form-control" placeholder="" name="shipping_info[recipient][phone]">
								</div>
							</li>

							<li>
								<label for="shipment_method">Domestic Shipping Methods</label>
								<br />

								<div class="input-group">
									
									<select name="shipping_info[recipient][shipping_method]">
										<option value="01">UPS Next Day Air</option>
										<option value="02">UPS Second Day Air</option>
										<option value="03">UPS Ground</option>
										<option value="07">UPS Worldwide Express</option>
										<option value="08">UPS Worldwide Expedited</option>
										<option value="11">UPS Standard</option>
										<option value="12">UPS Three-Day Select</option>
										<option value="13">UPS Next Day Air Saver</option>
										<option value="14">UPS Next Day Air Early A.M.</option>
										<option value="54">UPS Worldwide Express Plus</option>
										<option value="59">UPS Second Day Air A.M.</option>
										<option value="65">UPS Saver</option>
										<option value="82">UPS Today Standard</option>
										<option value="83">UPS Today Dedicated Courier</option>
										<option value="84">UPS Today Intercity</option>
										<option value="85">UPS Today Express</option>
										<option value="86">UPS Today Express Saver</option>
									</select>
								</div>
							</li>

						</ul>
					</div>
					<script>

						jQuery(document).ready(function(){

							$select = jQuery("#state").find("select");
							$input = jQuery("#state").find("input:first");

							$input2 = jQuery("#state").find("input").last();

							console.log( '2', $input2 );

							jQuery("#country").change(function(){


								if( jQuery(this).val() != 'US'){

									
									$select.hide();
									$input.show();

								}else{
									$select.show();
									$input.hide();
								}
								
							}).change();

							$select.change(function(){

								$input2.val( $select.val() );

							}).change();


							$input.change(function(){

								console.log('value',$input.val() )

								$input2.val( $input.val() );

							}).change();




						});	


					</script>
				</div>
			</div>

			<div class="col-md-4">

				<div class="panel panel-primary">
					<div class="panel-heading">Package Information</div>
						
					<div class="panel-body">
						<script type='text/javascript'>
						var boxes = <?php echo json_encode($boxes); ?> ;

						</script>

						<!-- <div class="row"> -->
					
						<div class="panel-group" id="package-panel">
							<?php if( is_array( $packages ) && !empty( $packages) ): ?>
							<?php foreach ( $packages as $p_id => $package ) :?>

							<div class="panel panel-default" id="panel-<?php echo $p_id; ?>">

								<div class="panel-heading">
  									<h4 class="panel-title">
    									<a data-toggle="collapse" data-parent="#package-panel" href="#package_<?php echo $p_id; ?>">
      										Package <?php echo '#' . (int)($p_id +1)  ?>
    									</a>
    									<button type="button" class="btn btn-primary pull-right  btn-xs delete-package" value="package_<?php echo $p_id; ?>" OnClick="delete_panel(<?php echo $p_id; ?>)" >Delete Pacakge</button>
  									</h4>

								</div>

								<div id="package_<?php echo $p_id; ?>" class="panel-collapse collapse">
  									<div class="panel-body">
  										<ul>
  											<li class=''>
												<?php

												$pre_box = '<div class="input-group">';

												$pre_box .= '	<select  id="package_' . $p_id .'_preset" class="form-control" onchange="select_box('. $p_id .')" name="shipping_info[packages]['.$p_id.'][container][label]" >';
													foreach( $boxes as $boxid => $box ) {  
														$boxname = $box['label'];
														if( $boxname == $package['container']['label'] )
															$pre_box .= '<option value="'  . $boxid . '" selected="selected"> '  . $boxname . ' </option>';
														else
															$pre_box .= '<option value="'  . $boxid . '"> '  . $boxname . ' </option>';

													} 
												$pre_box .= '</select>';
												$pre_box .= '</div>';
												
												echo $pre_box;
												?>
											</li>
											<?php foreach ($showed_meta as $meta_key => $disp_value ): ?>
					                            <?php if ( array_key_exists( $meta_key, $package['container'] ) ): ?>
					                            <li class=''>


					                            	<div class="input-group">
	  													<span class="input-group-addon"><?php echo $disp_value ?></span>
	  													<input type="text" id="shipping_info[packages][<?php echo $p_id; ?>][container][<?php echo $meta_key; ?>]" name="shipping_info[packages][<?php echo $p_id; ?>][container][<?php echo $meta_key; ?>]" placeholder="" value="<?php
				                                    		if ( isset( $package['container'][ $meta_key ] ) )
				                                    		echo esc_attr( $package['container'][ $meta_key ] );
				                                		?>" class="form-control" />
													</div>

					                        		
				                                	
					                            </li>
						                        <?php endif; ?>
						                    <?php endforeach; ?>
						                    <li>
						                    	<ul class='list-group'>
						                    		<?php if(isset($package['container']['items'])): ?>
						                    		<?php foreach ($package['container']['items'] as $num => $item): ?>
						                    		<li class='list-group-item' style="font-weight: bold; background-color:#428BCA;color:#FFFFFF;">Name: <?php echo isset( $item['name'])? $item['name']:'';  ?></li>
						                    		<li class='list-group-item'>
						                    			
						                    			<?php echo 'Length: ' . $item['length'] . ' ' . $item['dimension_unit'] ?>
						                    		</li>
						                    		<li class='list-group-item'>
						                    			
						                    			<?php echo 'Width: ' . $item['width'] . ' ' . $item['dimension_unit'] ?>
						                    		</li>
						                    		<li class='list-group-item'>
						                    			
						                    			<?php echo 'Height: ' . $item['height'] . ' ' . $item['dimension_unit'] ?>
						                    		</li>
						                    		<li class='list-group-item'>
						                    			
						                    			<?php echo 'Weight: ' . $item['weight'] . ' ' . $item['weight_unit'] ?>
						                    		</li>
							                    	<?php endforeach; ?>
								                    <?php endif; ?>
						                    	</ul>

						                    </li>
  										</ul>
  									</div>
  								</div>

							</div>

							<?php endforeach; ?>
							<?php else: ?>
						<h3><span class="label label-default">Oops!</span>haven't found any package information, Please create one. </h3>
						<?php endif;?>
						</div>
						
						<!-- </div> -->
						<div class="row">
							&nbsp
						</div>
						<div class="row">
							<div class="col-md-4 col-md-offset-1">
								<button type="button" class="btn btn-primary btn-xs add-package">Add Pacakge</button>
							</div>

							<div class="col-md-4 col-md-offset-2">
								
								<button type="submit" class="btn btn-primary btn-xs" name="save_package" value="yes">Save Package</button>
							</div>
							
						</div>
						

					</div>
				</div>
			</div>
			
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading">Order Information</div>
					
					<div class="panel-body">
						<?php

						if( $order != '' ):
							$items = $order->get_items();

							$totalItems = count( $items );	

						?>
						<ul class='list-group'>
							<li class='list-group-item'>
								Order ID: <?php echo $order->id; ?>
							</li>
							<li class='list-group-item'>
								Total Items: <?php echo $totalItems; ?>
							</li>

							<div class="panel-group" id="items-panel">
  
    
							<?php

							$num = 0;
							foreach ($items as $key => $item ){

								$meta = get_post_meta( $item['product_id']  );

								$num ++;
						
								$length = get_post_meta( $item['product_id'], '_length' );

								echo '<div class="panel panel-primary">
										<div class="panel-heading">
											<h4 class="panel-title">
												<a data-toggle="collapse" data-parent="#items-panel" href="#item_' . $key . '">';
													echo 'Item #' . $num;
								echo '			</a>
											</h4>
										</div>
										<div id="item_' . $key . '" class="panel-collapse collapse">
      										<div class="panel-body">
      										<ul class="list-group">
      											<li class="list-group-item">
      												Name: ' . $item['name'] .'
      											</li>
      											<li class="list-group-item">
      												Quantity: '.$item['qty'] .'
      											</li>
      											<li class="list-group-item">
      												Weight * Qty: '. $meta['_weight'][0] . $weight_unit .'
      											</li>
      											<li class="list-group-item" >
      												Length: ' . $meta['_length'][0] . $dimension_unit . '
      											</li>
      											<li class="list-group-item" >
      												 Width: ' . $meta['_width'][0] . $dimension_unit . '
      											</li>
      											<li class="list-group-item" >
      												Height: ' . $meta['_height'][0] . $dimension_unit . '
      											</li>
      											<li class="list-group-item" >
      												Price: ' . $meta['_price'][0]  .'
      											</li>
      										</ul>
      									</div>
      								</div>';

							}
							
							?>
							</div>
							
						</ul>
						<?php
						else:
							echo '<h3><span class="label label-default">Oops!</span>haven\'t found any order information. </h3>';
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
		<div class="">
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">Label Information</div>
					<div class="panel-body">
						<div class='list-group'>
							<?php
								if( $label_result ){


										if ( is_array( $label_result) ) {
											// echo '<a class="list-group-item active" >Label For package '. ($key + 1) .'</a>';
											echo '<a class="list-group-item" ><h5>Tracking Number</h5>';
											echo  isset( $label_result['tracking_number'] ) ? $label_result['tracking_number'] : ''; 
											echo '</a>';
											
											echo '<a class="list-group-item" ><h5>Shipped Date</h5>'; 
											echo isset( $label_result['shipped_date'])? $label_result['shipped_date']:'';
											echo  '</a>';
											echo '<a class="list-group-item" target="_blank" href="';
											echo isset( $label_result['label_link'])? $label_result['label_link']:'';
											echo '" ><h5>Shipping Label <span="label_result">Click to show label</span></h5>';
											echo isset( $label_result['label_link'])? $label_result['label_link']:'';
											echo '</a>';
										}
								
								}else{

									echo '<h3><span class="label label-default">Oops!</span> You haven\'t create any label. </h3>';

								}

							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<input name='save_package' value="yes" type="hidden" />
				<button type="submit" class="btn btn-lg btn-primary" name='generate_label' value='yes'>Generate Label</button>
			</div>
			
		</div>
		
	</form>
</div>


