<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

get_header(); ?>

		<div class="bcorporate_banner_section bcorporate_blog_banner_section"  style="background-image: url(<?php echo esc_url( get_template_directory_uri() );?>/inc/img/blog_header_img.jpg)">
			<div class="container">
			<div class="text-center caption-text">
			<div class="text-center ">
				<h1 class="inner_page_title"><?php echo single_post_title(); ?>
				</h1>
				<?php
					// Check if NavXT plugin activated
					if( class_exists( 'breadcrumb_navxt' ) ) {
						bcn_display();
					} 
				?>
			</div>
		</div>
	</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<!-- end of the header part -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-sm-12 order-sm-1 order-md-12 order-lg-12 blog-list">

						<?php
						if ( is_home() && ! is_front_page() ) : ?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>

							<?php
							endif;

						$bcoporate_blog_cat = get_theme_mod('blog_page_category');

						if(!empty($bcoporate_blog_cat)){
			    			$bcorporate_blog_query  = new WP_Query( array( 
																'cat' => absint( $bcoporate_blog_cat ) , 
																'posts_per_page' => 5 
															) );
			    			if( $bcorporate_blog_query->have_posts() ):
			    				while ( $bcorporate_blog_query->have_posts() ):
			    					$bcorporate_blog_query->the_post();
			    					get_template_part( 'template-parts/content', 'category' );
			    				endwhile;
			    				?>
			    				<div class="clearfix"></div>
								<nav class="pagination text-center justify-content-center" role="navigation" aria-label="<?php esc_attr_e('Pagination', 'bcorporate'); ?>">
									<?php echo paginate_links( array('prev_text' => ('<i class="fa fa-chevron-left" aria-hidden="true"></i>'), 'next_text' => ('<i class="fa fa-chevron-right" aria-hidden="true"></i>') ) ); ?>
								</nav>
								<?php wp_reset_postdata(); ?>
			    				<?php
			    			endif;

						}else{
							if ( have_posts() ) :

		

								/* Start the Loop */
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'template-parts/content', 'category' );

								endwhile;
								?>

								<div class="clearfix"></div>
								<ul class="pagination text-center justify-content-center" role="navigation" aria-label="<?php esc_attr_e('Pagination', 'bcorporate'); ?>">
									<?php echo paginate_links(); ?>
								</ul>
								
								<?php

							else :

								get_template_part( 'template-parts/content', 'none' );

							endif;
						}?>

					</div>

					<div class="col-md-4 col-sm-12  sidebar order-sm-12 order-md-1 order-lg-1">
						<?php get_sidebar(); ?>
					</div>

				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
