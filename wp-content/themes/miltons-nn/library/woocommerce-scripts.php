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

?>