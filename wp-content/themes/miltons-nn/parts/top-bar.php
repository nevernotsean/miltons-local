<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>
<?php if ( !( is_product() ) ) { ?>

<div class="top-bar-container contain-to-grid show-for-medium-up" id="tb-mask">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="logo">
                <a href="<?php echo home_url(); ?>">
                    <img class="svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo.svg" alt="">
<!--                     <img class="svg" id="blklogo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-blk.svg" alt=""> -->
                    <!-- <svg><use xlink:href="#miltonsLogo"></svg> -->
                </a>
            </li>
        </ul>
        <section class="top-bar-section">
            <?php foundationpress_top_bar_l(); ?>
            <?php foundationpress_top_bar_r(); ?>
        </section>
    </nav>
</div>
<div class="row collapse nomax topbar-bg">
    <div class="small-12 column">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ph.png" alt="" class="">
    </div>
</div>

<?php } else { ?>

<div class="top-bar-container contain-to-grid black">
    <nav class="top-bar" data-topbar role="navigation">
        <ul class="title-area">
            <li class="logo">
                <a href="<?php echo home_url(); ?>">
                    <img class="svg" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-blk.svg" alt="">
<!--                     <img class="svg" id="blklogo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/miltons-logo-blk.svg" alt=""> -->
                    <!-- <svg><use xlink:href="#miltonsLogo"></svg> -->
                </a>
            </li>
        </ul>
        <section class="top-bar-section">
            <ul class="left">
                <li class="divider"></li>
                <li><a href="<?php echo site_url(); ?>/shop"><i class="fa fa-angle-double-left"></i> Back to All</a></li>
                <li class="divider"></li>
            </ul>
            <?php foundationpress_top_bar_r(); ?>
        </section>
    </nav>
</div>

<?php } ?>