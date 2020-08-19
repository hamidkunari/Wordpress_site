<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="entry-meta">
			<span class="bcorporate_pubslised_date">
				<i class="fa fa-clock-o" aria-hidden="true"></i>
				<?php esc_html_e('Published:','bcorporate'); ?>
				<strong><?php echo esc_html( get_the_date() ); ?></strong>
			</span>
			<span class="bcorporate_posted_category">
				<i class="fa fa-tags" aria-hidden="true"></i>
				<?php esc_html_e('Categories:','bcorporate'); ?>
				<strong><?php the_category(); ?></strong>
			</span>
			<span class="bcorporate_tag">
				<i class="fa fa-tags" aria-hidden="true"></i>
				<?php esc_html_e('Tags:','bcorporate'); ?>
				<strong><?php echo the_tags(); ?></strong>
			</span>
		</div><!-- .entry-meta -->
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->

	<footer class="entry-footer">
		<?php //bcorporate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
