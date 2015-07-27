<?php
/**
* Template Name: Home
 */

get_header(); ?>

<div class="row">
	<div class="small-12 large-12 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>



	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
