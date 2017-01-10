<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>
	<?php if ( has_post_thumbnail() ) : ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' ); ?>
			<?php echo "<script> console.dir(" . json_encode($image) . ")</script>"; ?>
	<?php endif; ?>
	<header class="post-header" style="background-image: url('<?php echo $image[0]; ?>')">
		<div class="entry-meta">
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php foundationpress_entry_meta(); ?>
		</div>
	</header>
	<div class="row">
		<div class="small-12 large-12 column" role="main">
		<?php do_action( 'foundationpress_before_content' ); ?>
			<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
				<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
				<div class="entry-content">
					<div class="small-12 medium-6 medium-push-6 large-5 large-push-7 recipe-sidebar column">
						<?php $recipe_sidebar = get_field('recipe_sidebar'); ?>
						<?php if ( !empty($recipe_sidebar) ) { ?>
						<div class="sidebar-container">
							<div class="rel-wrapper">
									<?php echo $recipe_sidebar ?>
									<hr>
									<?php do_action('recipe_sidebar_after') ?>
							</div>
						</div>
						<?php } ?>
					</div>
										<div class="small-12 medium-6 medium-pull-6 large-7 large-pull-5 column">
						<?php the_content(); ?>
					</div>
				</div>
				<footer>
					<?php //wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>

					<p><?php the_tags(); ?></p>
				</footer>
				<?php //do_action( 'foundationpress_post_before_comments' ); ?>
				<?php //comments_template(); ?>
				<?php //do_action( 'foundationpress_post_after_comments' ); ?>
			</article>

		<?php do_action( 'foundationpress_after_content' ); ?>

		</div>
		<?php //get_sidebar(); ?>
	</div>
<?php endwhile;?>
<?php get_footer(); ?>
