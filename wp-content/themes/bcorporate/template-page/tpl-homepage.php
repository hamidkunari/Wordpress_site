<?php
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

get_header(); ?>
<?php
	while ( have_posts() ) : the_post();
		$homepage_slider_enable = get_theme_mod('home_page_slider_enable');

		if($homepage_slider_enable != '1'){
		?>
		<div class="bcorporate_banner_section bcorporate_home_banner_section" style="background-image: url(<?php if( has_post_thumbnail() ): echo esc_url( get_the_post_thumbnail_url() ); endif;?>)">
			<div class="center_text caption-text text-center">
				 <?php the_content(); ?> 
			</div>
			
			<div class="blaze_down_btn"  data-aos-once="true" data-aos="fade-up" data-aos-delay="550"><i class="fa fa-chevron-circle-down" aria-hidden="true"></i></div>
		</div>
		<div class="blaze_down_btn"  data-aos-once="true" data-aos="fade-up" data-aos-delay="550"><i class="fa fa-angle-double-down" aria-hidden="true"></i></div>
	<?php }else{ ?>
		<div class="bcorporate_banner_slider_wrap">
			<div class="bcorporate_banner_inner_wrap">
			<?php 
				$homepage_slider_category = get_theme_mod( 'homepage_slider_category');
			 		if($homepage_slider_category){
			 			$bcorporate_slider_query  = new WP_Query( array( 
																'cat' => absint( $homepage_slider_category ) , 
																'posts_per_page' => -1 
															) );
			    		$bcorporate_services_two_aos_delay = 0;
					while ( $bcorporate_slider_query -> have_posts() ) : $bcorporate_slider_query -> the_post(); ?>
			 				<div class="bcorporate_banner_section bcorporate_home_banner_slider  bcorporate_home_banner_section" style="background-image: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'full' ); ?>)">
						    	<div class="center_text caption-text text-center">
									<h4>
										<?php the_title(); ?>
									</h4>
									<h1>
										<?php the_content(); ?>
									</h1>
									<div class="download-btn">
										<a class="btn cta-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More','bcorporate') ?></a>
									</div>
								</div>
					    	</div>
			 			<?php 
			 			endwhile;
			 			wp_reset_postdata();	
			 		}
			 		?>
			 		
		 	</div>	
		 	
		</div>

	<?php } ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<!-- end of the header part -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			 

				<!-- About section home -->
				<?php do_action('bcorporate_home_about_sec'); ?>
				
				<!-- Our Features section home -->
				<?php do_action('bcorporate_home_feature_sec'); ?>

				<!-- Our Portfolio section home -->
				<?php do_action('bcorporate_home_portfolio_sec'); ?>

				<!-- Our cta one section home -->
				<?php do_action('bcorporate_home_ctaone_sec'); ?>

				<!-- Our Services section home -->
				<?php do_action('bcorporate_home_services_sec'); ?>

				<!-- Our Services section home -->
				<?php do_action('bcorporate_home_blog_sec'); ?>

				<!-- Testimonial section home -->
				<?php do_action('bcorporate_home_testimonial_sec'); ?>

				<!-- CATA two section home -->
				<?php do_action('bcorporate_home_ctatwo_sec'); ?>

				
	 

		</main><!-- #main -->
	</div><!-- #primary -->
<?php endwhile; ?>

<?php
get_footer();
