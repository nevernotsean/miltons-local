<?php
/**
* Template Name: Home
 */

get_header(); ?>

<div class="row collapse nomax">
	<div class="small-12 large-12 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>

  <?php for ($i=0; $i < 5 ; $i++) {
    ?>

  <section class="waypoint">
    <div class="row collapse nomax">
      <div class="small-12 column">
        <div class="left-image">
          <img src="https://placeimg.com/1920/1080/any" alt="">
        </div>
        <div class="sidebar">
          <div class="row">
            <div class="small-12 column">
              <h1>Header</h1>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta maiores, maxime deserunt quasi soluta excepturi, iste natus magnam. Beatae non adipisci, doloremque illo. Culpa nam, blanditiis qui ut reiciendis maiores!
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <?php
  } ?>



	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php //get_sidebar(); ?>
</div>

<style>

section {
  min-height: 100vh;
}

.left-image {
  width: 67%;
  height: 100vh;
}

.sidebar {
  min-height: 100%;
  padding-top: 100px;
  background-color: indianred;
  width: 33%;
  position: absolute;
  top: 0;
  right: -100%;
  z-index: 9;
  -webkit-transition: all, 1s, cubic;
  right: 0;

  color: white;
}

.sidebar h1 {
  color: white;
}

</style>
<?php get_footer(); ?>
