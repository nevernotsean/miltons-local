<?php
/**
* Template Name: Farmers
*/
get_header(); ?>
<div class="row collapse nomax">

    <?php do_action( 'foundationpress_before_content' ); ?>

    <?php
    $n = 0;
    $subtitle = get_field('subtitle');
    if ( have_rows('farmers') ) : ?>

    <div class="small-12 column medium-8">
      <div id="map" class="acf-map"></div>
    </div>

    <div class="small-12 column medium-4">
      <div class="sidebar-locked">
          <div class="row">
            <div class="small-12 column">
               <h3 class="subhead"><small><?php echo $subtitle ?></small></h3>
               <h1 class="headline"><?php the_title(); ?></h1>
            </div>
          </div>
        <!-- <div class="scrollable"> -->
          <?php while ( have_rows('farmers') ) : the_row();
          $name = get_sub_field('name');
          $city_state = get_sub_field('city_state');
          $location = get_sub_field('map_location');
          $n++;
          ?>
          <div class="row entry">
            <div class="small-12 column">
              <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-id="<?php echo $n ?>">
                <div class="node padding-left">
                  <p class="location-subheader"><?php echo $city_state ?></p>
                  <p class="location-header bold"><?php echo $name ?></p>
                </div>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
        <!-- </div> -->
      </div>
    </div>

  <?php endif; ?>

  <?php do_action( 'foundationpress_after_content' ); ?>
</div>
<?php get_footer(); ?>