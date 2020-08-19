<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bcorporate
 */

get_header(); ?>
	<div class="bcorporate_banner_section bcorporate_blog_banner_section"  style="background-image: url(<?php echo esc_url( get_template_directory_uri() );?>/inc/img/blog_header_img.jpg)">
		<div class="container">
			<div class="text-center caption-text">
				<h1 class="inner_page_title"><?php esc_html_e('Search Page','bcorporate'); ?>
				</h1>
			</div>
		</div>
	</div>

	</header>
	<div id="content" class="site-content">
	<!-- end of the header part -->

	<section id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-sm-12 blog-list">

						<?php
						if ( have_posts() ) : ?>

							<header class="page-header">
								<h1 class="page-title"><?php
									/* translators: %s: search query. */
									printf( esc_html__( 'Search Results for: %s', 'bcorporate' ), '<span>' . get_search_query() . '</span>' );
								?></h1>
							</header><!-- .page-header -->

							<?php
							/* Start the Loop */
							while ( have_posts() ) : the_post();

								/**
								 * Run the loop for the search to output the results.
								 * If you want to overload this in a child theme then include a file
								 * called content-search.php and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'search' );

							endwhile;

							?>
							<div class="clearfix"></div>
								<ul class="pagination text-center justify-content-center" role="navigation" aria-label="<?php esc_attr_e('Pagination', 'bcorporate'); ?>">
									<?php echo paginate_links(); ?>
								</ul>
							<?php

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif; ?>
					</div>
				</div>
			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
