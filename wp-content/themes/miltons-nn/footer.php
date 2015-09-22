<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

  </section>
  <footer id="site_footer">
  	<?php do_action( 'foundationpress_before_footer' ); ?>

    <div class="row collapse nomax">
      <div class="small-12">
        <column>
          <div class="left">
            <ul class="inline-list left social">
              <li><a href="https://facebook.com/miltonslocal"><i class="fa fa-facebook"></i></a></li>
              <!-- <li><a href=""><i class="fa fa-instagram"></i></a></li> -->
              <li><a href="https://twitter.com/miltonslocal"><i class="fa fa-twitter"></i></a></li>
            </ul>
            <ul class="inline-list left pages">
              <li><a href="<?php echo site_url() ?>/press"><small>PRESS</small></a></li>
              <li><a href="<?php echo site_url() ?>#clients"><small>WHERE TO BUY</small></a></li>
              <li><a href="<?php echo site_url() ?>/contact"><small>CONTACT</small></a></li>
              <li><a href="<?php echo site_url() ?>/returns-privacy"><small>PRIVACY & RETURNS</small></a></li>
              <li><a href="http://www.never-not.com"><small>SITEBY</small></a></li>
              <li class="copy"><a href=""><small>&copy 2015 MILTON'S LOCAL</small></a></li>
            </ul>
          </div>

          <div class="right hide-for-small">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-stacked-blk.svg" alt="">
          </div>

          <div class="row hide-for-medium-up">
            <div class="small-8 small-centered column">
              <hr class="white">
            </div>
          </div>

          <div class="small-12 column text-center hide-for-medium-up">
            <img class="white" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-stacked.svg" alt="">
          </div>
        </column>
      </div>
    </div>

  	<?php do_action( 'foundationpress_after_footer' ); ?>
  </footer>
  <a class="exit-off-canvas"></a>

  	<?php do_action( 'foundationpress_layout_end' ); ?>
  	</div>
  </div>
  <?php wp_footer(); ?>
  <?php do_action( 'foundationpress_before_closing_body' ); ?>
  </body>
</html>