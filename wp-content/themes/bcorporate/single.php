<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bcorporate
 */
get_header(); ?>

		<div class="bcorporate_banner_section bcorporate_blog_banner_section" style="background-image: url(<?php if( has_post_thumbnail() ): echo esc_url( get_the_post_thumbnail_url() ); endif;?>)">
			<div class="container">
			<div class="text-center caption-text">
				<h1 class="inner_page_title"><?php the_title(); ?>
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
					<div class="col-md-8 col-sm-12 order-sm-1 order-md-12 order-lg-12 blog-single-page">
						<?php
						while ( have_posts() ) : the_post();

							get_template_part( 'template-parts/content', get_post_type() );

							the_post_navigation( array( 'prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i>%title', 'next_text' => '%title<i class="fa fa-arrow-right" aria-hidden="true"></i>' ));

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
					</div>
					<!-- right sidebar -->
					<div class="col-md-4 col-sm-12  sidebar order-sm-12 order-md-1 order-lg-1">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
