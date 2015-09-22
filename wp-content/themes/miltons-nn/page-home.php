<?php
/**
* Template Name: Home
 */

get_header(); ?>

<div class="row collapse nomax">
	<div class="small-12 large-12 columns" role="main">
    <div id="sidebar-bg"></div>

	<?php do_action( 'foundationpress_before_content' ); ?>

  <?php
    $n = 0;
    $masthead = get_field('hero_image');
    $size = 'large';
    $src = $masthead['sizes'][$size];
  ?>
    <section class="masthead">
      <div class="row collapse nomax">
        <div class="small-12 column">
          <div class="masthead-image" style="background-image: url(<?php echo $src ?>)">
            <img src="<?php echo $src ?>" alt="">
          </div>
          <div class="introLogo">
            <object class="logo" type="image/svg+xml" data="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo.svg">
              <img class="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo.svg" alt="">
            </object>
            <!-- <svg><use xlink:href="#miltonsLogo"></svg> -->
          </div>
          <i class="fa fa-angle-down scrolldown"></i>
        </div>
      </div>
    </section>
  <div class="placeholder"></div>

  <?php $row = have_rows('repeater');
  if ( have_rows('repeater') ) : while ( have_rows('repeater') ) : the_row();

    $title = get_sub_field('title');
    $subtitle = get_sub_field('sub_header');
    $image = get_sub_field('image');
    $size = 'large';
    if ( !empty($image) ) { $img = $image['sizes'][$size]; } else { $img = ''; };
    $content = get_sub_field('content');
    $n++
    ?>

  <panel>
    <section class="waypoint" id="wypt-<?php echo $n; ?>" data-attr="<?php echo $n; ?>">
      <div class="row collapse nomax">
        <div class="small-12 column">
          <div class="left-image" style="background-image: url(<?php echo $img  ?>)">
            <img src="<?php echo $img  ?>" alt="">
          </div>
          <div class="sidebar">
            <div class="row">
              <div class="small-12 column">
              <?php if( !empty($subtitle) ): ?>
                <h3 class="subhead"><small><?php echo $subtitle; ?></small></h3>
              <?php endif; ?>
                <h1 class="headline"><?php echo $title ?></h1>
                <?php echo $content ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </panel>

  <?php endwhile; endif; ?>

  <?php get_template_part('parts/clients-gallery-acf'); ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
