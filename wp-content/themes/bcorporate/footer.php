<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bcorporate
 */

?>

	</div><!-- #content -->
	<div class="bcorporate_move_to_top"> 
		<i class="fa fa-arrow-up"></i>
	</div>


	<footer id="colophon" class="site-footer">

		<section class="bcorp_top_footer ">
			<div class="container">
			<div class="row">
				<div class="col-md-4 ">
					<?php get_sidebar( 'footerone' ); ?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar( 'footertwo' ); ?>
				</div>
				<div class="col-md-4">
					<?php get_sidebar( 'footerthree' ); ?>
				</div>
			</div></div>
		</section>

		<div class="site-info">
			<div class=" container">
			<div class="row">
				<div class="col-md-12">
					<!-- Copyright -->
					<p class="copyright text-center">
						<?php if ( get_theme_mod( 'footer_text_setting' ) ) : ?>
							<p class="copyright text-center">
											
							<?php
							$bcorporate_footer_text = get_theme_mod( 'footer_text_setting' );
							     echo wp_kses( $bcorporate_footer_text, array(
							        'p' => array(),
							        'strong' => array(),
							        'a' => array(
							                'href' => array(),
							                'class' => array(),
							                'title' => array(),
							                'target' => array(),
							            )
							    ) );
							?></p>
						<?php else :
							esc_html_e( 'bCorporate WordPress Theme by', 'bcorporate' ); ?>
							<a href="<?php echo esc_url('https://blazethemes.com/'); ?>" target="_blank"><?php esc_html_e( 'Blaze Themes', 'bcorporate' ); ?></a>
						<?php endif; ?>
					</p>
				</div>
			</div>
		</div></div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
