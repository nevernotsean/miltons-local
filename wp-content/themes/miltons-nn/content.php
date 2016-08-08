<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="small-6 left column">
		<a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail( 'large'); ?></a>
	</div>
	<div class="small-6 right column">
	<header>
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php foundationpress_entry_meta(); ?>
	</header>
	<div class="entry-content">
			<?php the_excerpt();?>
			<a href="<?php the_permalink(); ?>">Read More</a>
	</div>
	<footer>
		<?php $tag = get_the_tags(); if ( $tag ) { ?><p><?php the_tags(); ?></p><?php } ?>
	</footer>
	</div>
	<hr />
</article>