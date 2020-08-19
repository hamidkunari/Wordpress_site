<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">
		<?php if(has_post_thumbnail()): ?>
			<img src="<?php echo esc_url( get_the_post_thumbnail_url() );?>"/>
		<?php endif; ?>
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
				<strong><?php the_tags(); ?></strong>
			</span>
		</div><!-- .entry-meta -->
		<?php

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
	 ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bcorporate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer clearfix">
		<?php 
			if( function_exists ( '_simple_share_buttons_adder_add_action_links' ) ) : ?>
				<div class="float-right"><span> <?php echo do_shortcode( '[ssba-buttons]' ); ?></span></div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
