<?php
/**
* Template Name: Clients
 */

get_header(); ?>

<div class="row collapse nomax">
  <div class="small-12 large-12 columns" role="main">
    <div id="sidebar-bg"></div>

  <?php do_action( 'foundationpress_before_content' ); ?>

  <?php get_template_part('parts/clients-gallery-acf'); ?>

  <?php do_action( 'foundationpress_after_content' ); ?>

  </div>
</div>

<?php get_footer(); ?>