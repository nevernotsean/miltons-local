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

// add_filter('wp_nav_menu_items', 'add_subscribe', 10, 2);
function add_subscribe( $items, $args ) {
  $items .= '<li class="divider"></li><li class="menu-item"><a href="#" onClick="showSubscribe(event)">Subscribe</a></li>';

  return $items;
}

add_action('home_page_before_footer', 'render_subscribe_modal', 10);
function render_subscribe_modal(){
  echo get_template_part('parts/subscribe-modal');
}

add_action('recipe_sidebar_after', 'render_inline_subscribe', 10);
function render_inline_subscribe(){
    echo get_template_part('parts/subscribe-inline');
}
?>
