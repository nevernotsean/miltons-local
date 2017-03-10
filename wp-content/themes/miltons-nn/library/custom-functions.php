<?php
// ACF gallery Gallery background color
add_action('admin_head', 'custom_css');
function custom_css() {
  echo '<style>
    .acf-gallery-attachment.acf-soh .margin {
      background-color: #ddd;
    }
  </style>';
}

add_filter('wp_nav_menu_items', 'add_subscribe', 10, 2);
function add_subscribe( $items, $args ) {
  if ( $args->theme_location == 'mobile-off-canvas'){
    $email_signup = locate_template('parts/email-signup.php');
    $items .= '<li class="divider"></li><li class="menu-item"><a href="#">Subscribe</a></li>';
    $items .= '<li class="menu-item">' . file_get_contents($email_signup) . '</li>';
  } else {
    $items .= '<li class="divider"></li><li class="menu-item"><a href="#" onClick="showSubscribe(event)">Subscribe</a></li>';
  }

  return $items;
}

//add_filter('wp_nav_menu', 'mobile_add_subscribe', 10, 2);
function mobile_add_subscribe( $nav_menu, $args ){
  if ( $args->theme_location == 'mobile-off-canvas'){
    $email_signup = locate_template('parts/email-signup.php');
    $nav_menu .= '<li class="menu-item">' . file_get_contents($email_signup) . '</li>';
  }
}

//add_action('home_page_before_footer', 'render_subscribe_modal', 10);
function render_subscribe_modal(){
  echo get_template_part('parts/subscribe-modal');
}

add_action('recipe_sidebar_after', 'render_inline_subscribe', 10);
function render_inline_subscribe(){
    echo get_template_part('parts/subscribe-inline');
}

// Shop Banner area
add_action('foundationpress_before_content', 'shop_banner_area');
function shop_banner_area(){
  if ( is_shop() ) {
    // echo "<script> alert('HIT')</script>";
  }
}
?>
