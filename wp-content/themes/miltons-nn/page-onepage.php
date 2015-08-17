<?php
/**
* Template Name: Onepage
 */

get_header(); ?>

<div class="row collapse nomax">
  <div class="small-12 large-12 columns" role="main">
    <div id="sidebar-bg"></div>

  <?php do_action( 'foundationpress_before_content' ); ?>

  <?php
  $n = 0;
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


  <?php do_action( 'foundationpress_after_content' ); ?>

  </div>
</div>

<?php get_footer(); ?>
