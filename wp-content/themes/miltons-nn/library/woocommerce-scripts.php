<?php

// Remove WC CSS
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );       // Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation
    return $enqueue_styles;
}
//
// Category Page
//

// Remove Page Title
add_filter( 'woocommerce_show_page_title' , 'woo_hide_page_title' );
function woo_hide_page_title() {
  return false;
}
// Remove hooks
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
// remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );

// Add excerpt
add_action('woocommerce_after_shop_loop_item', 'woocommerce_template_single_excerpt', 10 );


//
// SPP
//

// Remove hooks

remove_action( 'woocommerce_before_single_product', 'woocommerce_show_messages' );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );


// Add hooks

// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

// Custom functions

add_action( 'woocommerce_spp_gallery', 'show_gallery_as_images');
add_action( 'woocommerce_spp_gallery_thumbs', 'show_gallery_as_images');
function show_gallery_as_images(){

  global $post, $product, $woocommerce;

  $attachment_ids = $product->get_gallery_attachment_ids();

  if ( $attachment_ids ) {

      foreach ( $attachment_ids as $attachment_id ) {

        $image_link = wp_get_attachment_url( $attachment_id );

        if ( ! $image_link )
          continue;

        $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ) );
        $image_title = esc_attr( get_the_title( $attachment_id ) );

        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $image, $attachment_id, $post->ID, $image_class );

    }
  }
}

// Add custom fields

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58521e15f3fe6',
	'title' => 'Product Custom Fields',
	'fields' => array (
		array (
			'key' => 'field_58521e1e7e26f',
			'label' => 'Gluten Free',
			'name' => 'gluten_free',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
		),
		array (
			'key' => 'field_58521e457e270',
			'label' => 'No MSG',
			'name' => 'no_msg',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
		),
		array (
			'key' => 'field_58521e527e271',
			'label' => 'Certified Paleo',
			'name' => 'certified_paleo',
			'type' => 'true_false',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'message' => '',
			'default_value' => 0,
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'product',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'side',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;


// checkout

add_action('woocommerce_checkout_after_customer_details', function(){ echo '<div class="order-review">'; }, 5);
add_action('woocommerce_checkout_after_order_review', function(){ echo '</div>'; }, 99);
add_action('woocommerce_checkout_shipping', function(){ echo '<h3>Shipping Details</h3>'; }, 5);

// Hide Ground for states other than local
add_filter( 'woocommerce_package_rates', 'shipping_rates_for_specific_states', 10, 2 );
function shipping_rates_for_specific_states( $rates, $package ) {

    if ( is_admin() && ! defined( 'DOING_AJAX' ) )
        return;

    # Setup an array of states that do not allow UPS Shipping 2nd Day Air. 
    # As of 10/18/2015 we added 3 days ground too.
    $enabled_states = array(
        "MD", "VA", "DC", "NC", "SC","NY", "PA", "WV"
    );

    $destination_state = $package['destination']['state'];

    if( in_array( $destination_state, $enabled_states ) ) {
		// unset( $rates['wf_shipping_ups:03'] ); // Unset Ground
    } else {
        unset( $rates['wf_shipping_ups:03'] ); // Unset Ground
    }

    return $rates;
}

add_action('woocommerce_checkout_before_order_review', 'shipping_notice_1', 10);
function shipping_notice_1(){
	echo '<p>Orders are shipped Monday-Wednesday the week after they are placed unless otherwise noted</p>';
}

add_action('woocommerce_before_shop_loop_item_title', function(){
	echo '<div class="lazy-container">';
}, 9);

add_action('woocommerce_before_shop_loop_item_title', function(){
	echo '</div>';
}, 11);

?>
