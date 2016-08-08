<?php
/**
 * Template Name: Find Us
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>

<div class="row">
  <div class="small-12 large-12 columns" role="main">

  <?php do_action( 'foundationpress_before_content' ); ?>

    <h1 class="entry-title text-center"><?php the_title(); ?></h1>

    <div class="text-center small-12 medium-6 column medium-centered">
      <hr style="margin: 2rem auto; border-color: #000; width: 3rem;">
      <p>Enjoying our selection of farm sourced meat is easier than you think. Select your preferred method below.</p>
      <hr style="margin: 2rem auto; border-color: #000; width: 3rem;">
    </div>
    <ul class="accordion" data-accordion="">
      <li class="accordion-navigation active">
        <a href="#panel1a" aria-expanded="true">
          <h4>Order Online</h4>
        </a>
        <div id="panel1a" class="content text-center active" style="margin-bottom: 2rem;">
          <div class="row">
            <div class="small-12 column">
              <div class="bg-image shop" style="background-image: url('http://miltonslocal.com/wp-content/uploads/2015/07/Sausage-11a-1024x683.jpg')"></div>
                <div class="over shop">
                  <div class="stroke">
                    <div class="small-12 medium-10 column small-centered">
                      <img style="height: 60px; margin-bottom: 2rem;" src="http://miltonslocal.com/wp-content/themes/miltons-nn/assets/img/miltons-logo-stacked-blk.svg" alt="" data-pin-nopin="true">
                      <p>Order directly from our online store, delivered anywhere in the Continental US</p>
                      <a class="button" href="<?php echo site_url(); ?>/shop">Shop Now</a>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </li>
      <li class="accordion-navigation"><a href="#panel2a" aria-expanded="false"><h5>Local Delivery Service</h5>
        </a>
        <div id="panel2a" class="content" style="margin: 2em auto;">
          <div class="row">
            <div class="small-8 small-centered medium-uncentered medium-4 column text-center logo">
              <div class="bg-image" style="background-image: url('https://www.bcorporation.net/sites/default/files/styles/company-logo-full/public/relay.jpg')" alt="Relay Foods"></div>
              <p>Delivers to Most Metro Areas in Maryland, Metro D.C., Virginia and North Carolina</p>
              <a class="button" href="https://www.relayfoods.com/search?q=miltons+local">Learn More</a>
              <hr class="hide-for-medium-up">
            </div>
            <div class="small-8 small-centered medium-uncentered medium-4 column text-center logo">
              <div class="bg-image" style="background-image: url('https://www.dominionharvest.com/assets/images/logo-dominion-harvest.png')" alt="Dominion Harvest"></div>
              <p>Delivery to all Richmond locations and Bi-weekly delivery service to Fredericksburg and Williamsburg areas.</p>
              <a class="button" href="https://www.dominionharvest.com">Learn More</a>
              <hr class="hide-for-medium-up">
            </div>
            <div class="small-8 small-centered medium-uncentered medium-4 column text-center logo">
              <div class="bg-image" style="background-image: url('<?php echo get_stylesheet_directory_uri(); ?>/assets/img/seasonal-roots-logo.png')" alt="seasonal-roots"></div>
              <p>Delivery to The Greater Richmond Area, Fredericksburg, Williamsburg, Hampton Roads and Virginia Beach.</p>
              <a class="button" href="http://seasonalroots.com/">Learn More</a>
            </div>
          </div>
        </div>
      </li>
      <li class="accordion-navigation">
        <a style="/* border-bottom: 1px solid black;" href="#panel3a" aria-expanded="false"><h5>At Your Nearest Retailer</h5></a>
        <div id="panel3a" class="content" style="/* margin: 2rem auto;">
          <?php echo do_shortcode('[SLPLUS]') ?>
        </div>
      </li>
    </ul>

  <?php do_action( 'foundationpress_after_content' ); ?>

  </div>
  <?php //get_sidebar(); ?>
</div>

<script>
  // Animate the Accordion
  $(".accordion li a").on("click", function (event) {
    $(this).parents('li.accordion-navigation').find(".content").slideDown();
    $(".accordion-navigation.active").find(".content").slideUp();
  });
</script>
<?php get_footer(); ?>