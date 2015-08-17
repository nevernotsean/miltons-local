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
    $src = $masthead['sizes']['large'];
  ?>
    <section class="masthead active">
      <div class="row collapse nomax">
        <div class="small-12 column">
          <div class="masthead-image" style="background-image: url(<?php echo $src ?>)">
            <img src="<?php echo $src ?>" alt="">
          </div>
        </div>
      </div>
    </section>
  <div class="placeholder"></div>

  <?php $row = have_rows('repeater');
  if ( have_rows('repeater') ) : while ( have_rows('repeater') ) : the_row();

    $title = get_sub_field('title');
    $subtitle = get_sub_field('sub_header');
    $image = get_sub_field('image');
    $img = $image['url'];
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
                <p><?php echo $content ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </panel>

  <?php endwhile; endif; ?>

  <panel id="clients">
    <section class="waypoint">
      <div class="row collapse nomax">
            <div class="small-12 column">
              <?php $image = get_field('client_image');
              $img = $image['sizes']['large'];
              ?>
              <div class="left-image" style="background-image: url(<?php echo $img  ?>)">
                <img src="<?php echo $img  ?>" alt="">
              </div>
              <div class="sidebar">
                <div class="row">
                  <div class="small-12 column">
                    <h3 class="subhead"><small>Clients</small></h3>
                    <h1 class="headline"><?php echo get_field('client_title'); ?></h1>
                    <p><?php echo get_field('client_content'); ?></p>
                    <?php
                    $images = get_field('gallery');
                    if( $images ): ?>
                    <div class="row collapse">
                      <div class="small-12 column">
                        <ul class="small-block-grid-3 medium-block-grid-4">
                        <?php foreach( $images as $image ): ?>
                          <li>
                            <a href="<?php echo $image['description']; ?>">
                              <img src="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>" />
                            </a>
                            <p><?php echo $image['caption']; ?></p>
                          </li>
                        <?php endforeach; ?>
                        </ul>
                      </div>
                    </div>
                  <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </section>
  </panel>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php //get_sidebar(); ?>
</div>

<style>



</style>
<?php get_footer(); ?>
