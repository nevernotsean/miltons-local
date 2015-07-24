<?php
/*
  Plugin Name: WooCommerce ups Label
  Plugin URI: http://www.extensionworks.com
  Description: Generate UPS Shipping lable.
  Version: 1.0.0
  Author: Extension Works
  Author URI: http://www.extensionworks.com
  Copyright: © Extension Works. 
   
 */



add_action( 'plugins_loaded', 'woocommerce_ups_label_init', 10 );

function woocommerce_ups_label_init() {


	include_once 'extensionworks-includes/extensionworks-functions.php';

	if( !check_plugin_dependency() )
		return false ;

	/**
	 * Plugin updates
	 */
	extensionworks_queue_update( plugin_basename( __FILE__ ), '6b66a6e2e916a7a942650b2650a30838', 'woo-ups-label-printing-tracking' );

	class UPS_Shipping_Label{


		public function __construct(){


			add_filter( 'shipping_ups_field', array( $this, 'add_fields' ) );
			add_action('manage_shop_order_posts_custom_column', array( $this, 'label_button' ), 4);
			
			add_action('add_meta_boxes', array($this, 'add_meta_box') );
			add_action( 'admin_menu', array($this, 'label_page') );
		}

		public function add_meta_box(){

			add_meta_box( 'ups_label_box', __( 'Create UPS Shipping Label', 'woocommerce-ups' ), array( $this,'label_box'), 'shop_order', 'side', 'default' );
			add_meta_box( 'ups_label_info_box', __( 'UPS Shipping Label Information', 'woocommerce-ups' ), array( $this,'label_info_box'), 'shop_order', 'normal', 'default' );
		}


		public function add_fields( $fields ){

			$state = array(
				'AL' => 'Alabama',
				'AK' => 'Alaska',
				'AZ' => 'Arizona',
				'AR' => 'Arkansas',
				'CA' => 'California',
				'CO' => 'Colorado',
				'CT' => 'Connecticut',
				'DE' => 'Delaware',
				'DC' => 'District of Columbia',
				'FL' => 'Florida',
				'GA' => 'Georgia',
				'HI' => 'Hawaii',
				'ID' => 'Idaho',
				'IL' => 'Illinois',
				'IN' => 'Indiana',
				'IA' => 'Iowa',
				'KS' => 'Kansas',
				'KY' => 'Kentucky',
				'LA' => 'Louisiana',
				'ME' => 'Maine',
				'MD' => 'Maryland',
				'MA' => 'Massachusetts',
				'MI' => 'Michigan',
				'MN' => 'Minnesota',
				"MS" => 'Mississippi',
				"MO" => 'Missouri',
				"MT" => 'Montana',
				"NE" => 'Nebraska',
				"NV" => 'Nevada',
				"NH" => 'New Hampshire',
				"NJ" => 'New Jersey',
				"NM" => 'New Mexico',
				"NY" => 'New York',
				"NC" => 'North Carolina',
				"ND" => 'North Dakota',
				"OH" => 'Ohio',
				"OK" => 'Oklahoma',
				"OR" => 'Oregon',
				"PA" => 'Pennsylvania',
				"RI" => 'Rhode Island',
				"SC" => 'South Carolina',
				"SD" => 'South Dakota',
				"TN" => 'Tennessee',
				"TX" => 'Texas',
				"UT" => 'Utah',
				"VT" => 'Vermont',
				"VA" => 'Virginia',
				"WA" => 'Washington',
				"WV" => 'West Virginia',
				"WI" => 'Wisconsin',
				"WY" => 'Wyoming',
			);


			$fields['label_title'] = array(

				'title' => 'UPS Label Setting',
				'type'  => 'title'

			);

			$fields['testmode'] = array(
				'title'       => __('Test Mode', 'extensionworks'),
				'type'        => 'checkbox',
				'description' => __('Using test environment', 'extensionworks'),
				'default'     => 'yes'
		    );


			$fields['sender_first_name'] = array(
				'title'       => __( 'Sender First Name', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);

			$fields['sender_last_name'] = array(
				'title'       => __( 'Sender Last Name', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);


			$fields['sender_company'] = array(
				'title'       => __( 'Sender Company', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);

			$fields['sender_address_1'] = array(
				'title'       => __( 'Sender Address 1', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);

			$fields['sender_address_2'] = array(
				'title'       => __( 'Sender Address 2', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);

			$fields['sender_city'] = array(
				'title'       => __( 'Sender City', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);

			$fields['sender_state'] = array(
				'title'       => __( 'Sender State', 'extensionworks' ),
				'type'        => 'select',
				'options'     => $state,
				'description' => 'The sender name will dispaly on ups shipping label.'
			);


			$fields['sender_phone'] = array(
				'title'       => __( 'Sender Phone Number', 'extensionworks' ),
				'type'        => 'text',
				'description' => 'The sender name will dispaly on ups shipping label.'
			);


			return $fields;

		}


		public function label_button( $column ){
			global $post;
		    $order = new WC_Order( $post->ID );
		    
		    switch ($column) {
		      case "order_actions" :

		  			?><p>
		  				<a class="button" href="<?php echo wp_nonce_url(admin_url('admin.php?page=ups-create-label&order_id='.$post->ID), 'print-ups-label'); ?>"><?php _e('UPS Label', 'extensionworks'); ?></a>
		  				
		  			</p><?php

		  		  break;
		    }
		}

		public function label_box(){
			global $post;
			$order = new WC_Order( $post->ID );
			?>

			<a class="button" href="<?php echo wp_nonce_url(admin_url('admin.php?page=ups-create-label&order_id='.$post->ID), 'print-ups-label'); ?>"><?php _e('UPS Label', 'extensionworks'); ?></a>
			
			<?php
		}

		public function label_info_box(){
			global $post;
			$order = new WC_Order( $post->ID );
			$labels = get_post_meta( $order->id, '_ups_label');

			if( $labels ):


			?>
			<?php foreach ($labels as $key => $label ): ?>


			<h5>package <?php echo $key+1; ?></h4>
			<div class="input-group input-group-sm">
				<span class="input-group-addon">Tracking Number:</span>
				<input type="text" class="form-control" value="<?php echo isset( $label['tracking_number'] ) ? $label['tracking_number'] : ''; ?>">
			</div>

			<div class="input-group input-group-sm">
				<span class="input-group-addon">Shipping Label:</span>
				<input type="text" class="form-control" value="<?php echo isset( $label['label_link'] ) ? $label['label_link'] : ''; ?>">
				<span class="input-group-addon"><a target='_blank' href="<?php echo isset( $label['label_link'] ) ? $label['label_link'] : ''; ?>">Open</a></span>
			</div>
			<?php endforeach;

			endif;
			
			
		}

		public function label_page(){
			$my_page = add_submenu_page( 'woocommerce','UPS Labels', 'UPS Label', 'manage_woocommerce', 'ups-create-label', array( $this,'label_page_content') );
			
			
		    wp_enqueue_script('jquery');
			wp_enqueue_script( 'bootstrapjs');
			wp_enqueue_script( 'ups-label-admin-script', plugins_url('/templates/js/admin.js',__FILE__), array( 'jquery' ) );
		}

		public function label_page_content(){
			if ( !current_user_can( 'manage_woocommerce' ) )  {
				wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
			}
			
			require_once(dirname(__FILE__) . '/templates/label-page.php');
		}

	}


	function wc_shipping_ups_label_plugin_links( $links ) {

		$setting_url = admin_url( 'admin.php?page=woocommerce_settings&tab=shipping&section=WC_Shipping_UPS' );

        if ( check_woo_version('2.1') ){
            $setting_url = admin_url( 'admin.php?page=wc-settings&tab=shipping&section=wc_shipping_ups' );
        }

        $plugin_links = array(
            '<a href="' . $setting_url . '">' . __( 'Settings', 'extensionworks' ) . '</a>',
            '<a href="http://help.extensionworks.com/hc/en-us/requests/new">' . __( 'Support', 'extensionworks' ) . '</a>',
            '<a href="https://extensionworks.zendesk.com/hc/en-us/categories/200124388-WooCommerce-UPS-Label-Printing-and-Tracking-code-extension">' . __( 'Docs', 'extensionworks' ) . '</a>',
        );

        return array_merge( $plugin_links, $links );
    }

    add_filter( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'wc_shipping_ups_label_plugin_links' );


	$ups_label = new UPS_Shipping_Label();

}
