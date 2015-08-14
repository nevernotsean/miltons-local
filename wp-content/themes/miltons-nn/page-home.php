<?php
/**
* Template Name: Home
 */

get_header(); ?>

<div class="row collapse nomax">
	<div class="small-12 large-12 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>

  <?php
    $masthead = get_field('hero_image');
    $src = $masthead['url'];
  ?>
  <section class="waypoint masthead">
    <div class="row collapse nomax">
      <div class="small-12 column">
        <div class="masthead-image" style="background-image: url(<?php echo $src ?>)">
          <img src="<?php echo $src ?>" alt="">
        </div>
      </div>
    </div>
  </section>

  <?php $row = have_rows('repeater');
  if ( have_rows('repeater') ) : while ( have_rows('repeater') ) : the_row();

    $title = get_sub_field('title');
    $subtitle = get_sub_field('sub_header');
    $image = get_sub_field('image');
    $img = $image['url'];
    $content = get_sub_field('content');
    ?>

  <section class="waypoint">
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

  <?php endwhile; endif; ?>



	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php //get_sidebar(); ?>
</div>

<style>



</style>
<?php get_footer(); ?>
