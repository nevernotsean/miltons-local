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

        <div class="row medium-collapse nomax sitemap">
          <div class="small-12 medium-4 column">
            <h4 class="sitemap-header">Newsletter</h3>
            <p>Keep in touch with the Milton’s Local community for updates.</p>
          	<?php echo get_template_part('parts/email-signup') ?>
          </div>
          <div class="small-12 medium-offset-2 medium-2 column sitemap-links">
            <h4 class="sitemap-header">Shop Milton's</h3>
            <a href="<?php echo site_url() ?>/shop">SHOP ONLINE</a>
            <a href="<?php echo site_url() ?>/shop/cart">MY CART</a>
            <a href="<?php echo site_url() ?>/shop/my-account/">MY ACCOUNT</a>
            <a href="<?php echo site_url() ?>/find-us">FIND US</a>
          </div>
          <div class="small-12 medium-2 column sitemap-links">
            <h4 class="sitemap-header">About Us</h3>
            <a href="<?php echo site_url() ?>/">ABOUT MILTON'S LOCAL</a>
            <a href="<?php echo site_url() ?>/clients">OUR CLIENTS</a>
            <a href="<?php echo site_url() ?>/farmers">OUR FARMERS</a>
            <a href="<?php echo site_url() ?>/press">PRESS</a>
          </div>
          <div class="small-12 medium-2 column sitemap-links">
            <h4 class="sitemap-header">Contact Us</h3>
            <a href="<?php echo site_url() ?>/contact">EMAIL & ADDRESS</a>
            <a href="<?php echo site_url() ?>/wholesale">WHOLESALE</a>
            <ul class="inline-list">
              <li>
                <a href="https://facebook.com/miltonslocal"><i class="fa fa-facebook"></i></a>
              </li>
              <li>
                <a href="https://www.instagram.com/miltonslocal/"><i class="fa fa-instagram"></i></a>
              </li>
              <li>
                <a href="https://twitter.com/miltonslocal"><i class="fa fa-twitter"></i></a>
              </li>
              <li>
                <a href="https://www.pinterest.com/miltonslocal/"><i class="fa fa-pinterest"></i></a>
              </li>
            </ul>
          </div>
        </div>
        <hr>
        <div class="row medium-collapse nomax">
          <div class="small-12 column">
              <ul class="inline-list left">
                <li><small><a href="<?php echo site_url() ?>/returns-privacy">PRIVACY & RETURNS</a></small></li>
                <li><small><a href="http://www.never-not.com">SITEBY</a></small></li>
                <li><small>&copy 2016 MILTON'S LOCAL</small></li>
              </ul>
              <ul class="inline-list right">
                <li>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-stacked-blk.svg" alt="">
                </li>
              </ul>
          </div>
        </div>

    	<?php do_action( 'foundationpress_after_footer' ); ?>
    </footer>
    <a class="exit-off-canvas"></a>

  	<?php do_action( 'foundationpress_layout_end' ); ?>
  	</div>
  </div>

  <?php wp_footer(); ?>

  </div>

  <?php do_action( 'foundationpress_before_closing_body' ); ?>
  </body>
</html>
