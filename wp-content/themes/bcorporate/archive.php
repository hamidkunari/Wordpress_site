<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bcorporate
 */

get_header(); ?>
		<div class="bcorporate_banner_section bcorporate_blog_banner_section"  style="background-image: url(<?php echo esc_url( get_template_directory_uri() );?>/inc/img/blog_header_img.jpg)">
			<div class="container">
			<div class="text-center caption-text">
				<?php 
				the_archive_title( '<h1 class="page-title inner_page_title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
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
					<div class="col-md-8 col-sm-12 order-sm-1 order-md-12">

						<?php
						if ( have_posts() ) : ?>

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/*
								 * Include the Post-Format-specific template for the content.
								 */
								get_template_part( 'template-parts/content', 'category' );

							endwhile;

							the_posts_navigation();

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
					<!-- right sidebar -->
					<div class="col-md-4 col-sm-12  sidebar order-sm-12 order-md-1 order-lg-1">
						<?php get_sidebar(); ?>
					</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
