<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action( 'woocommerce_before_single_product_summary' ); ?>

	<div class="row collapse">
		<div class="small-12 column">
			<?php woocommerce_template_single_title() ?>
		</div>
	</div>

	<hr style="border: 0; border-bottom: 4px solid #888; margin: 0;">

	<div class="row">
		<div class="small-12 medium-6 medium-push-6 large-5 large-push-7 column gallery-column">
			<div class="gallery">
				<?php do_action( 'woocommerce_spp_gallery'); ?>
			</div>
			<div class="gallery-thumbs">
				<?php do_action( 'woocommerce_spp_gallery_thumbs'); ?>
			</div>
		</div>

		<div class="small-12 medium-6 medium-pull-6 large-6 large-pull-6 column summary entry-summary">

			<?php do_action( 'woocommerce_single_product_summary' ); ?>

			<div class="row contain border-b">
				<div class="small-6 column text-center">
						<?php woocommerce_template_single_price(); ?>
				</div>
				<div class="small-6 column text-center">
					<?php
						echo '<span>';
						global $product;
						$weight = $product->get_weight();
						echo $weight;
						echo 'oz.';
						echo '</span>';
					?>
				</div>
			</div>

			<div class="row collapse excerpt">
				<div class="small-12 column">
					<?php //woocommerce_template_single_excerpt(); ?>
					<?php the_content(); ?>
				</div>
			</div>

			<div class="row collapse addcart">
				<div class="small-12 medium-6 column">
					<?php woocommerce_template_single_add_to_cart(); ?>
					<?php woocommerce_show_messages(); ?>
				</div>
				<div class="small-12 medium-6 column">
					<ul class="small-block-grid-3" style="padding: 0 1rem;">
						<?php if ( get_field('certified_paleo') === true ) { echo '<li><img alt="Certified Paleo" src="'. get_stylesheet_directory_uri() .'/assets/img/certified-paleo.png"></li>';} ?>
						<?php if ( get_field('no_msg') === true ) { echo '<li><img alt="No MSG" src="'. get_stylesheet_directory_uri() .'/assets/img/no-msg.png"></li>';} ?>
						<?php if ( get_field('gluten_free') === true ) { echo '<li><img alt="Gluten Free" src="'. get_stylesheet_directory_uri() .'/assets/img/gluten-free.png"></li>';} ?>
					</ul>
				</div>
			</div>

		</div>
	</div>
	<hr style="border: 0; border-bottom: 4px solid #888;">
	<?php do_action( 'woocommerce_after_single_product_summary' );?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
