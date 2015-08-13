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

// Or just remove them all in one line
//add_filter( 'woocommerce_enqueue_styles', '__return_false' );


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

        echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( $image ), $attachment_id, $post->ID, $image_class );

    }
  }
}


?>