<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bcorporate
 */

get_header(); ?>
	<div class="bcorporate_banner_section bcorporate_inner_banner_section" style="background-image: url(<?php echo esc_url( get_template_directory_uri() );?>/inc/img/blog_header_img.jpg)">
		<div class="container">
			<div class="text-center caption-text">
				<h1 class="inner_page_title"><?php esc_html_e('PAGE 404', 'bcorporate'); ?></h1>
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
					<div class="col-md-12 col-sm-12">
						<section class="error-404 not-found text-center">
							<div><?php esc_html_e('Ooops!', 'bcorporate'); ?>
							<h2><?php esc_html_e('Sorry, Page Not Found', 'bcorporate'); ?></h2>
							<div class="main_404_title"><?php esc_html_e('404', 'bcorporate'); ?></div>
							<div class="sub_404_title"><?php esc_html_e('Feel Free Contact Us', 'bcorporate'); ?></div>
							<div class="main_404_text col-md-12 col-sm-12 col-lg-6 offset-lg-3">
								<?php esc_html_e ('It looks like nothing was found at this location. Maybe try one of the links below or a search?','bcorporate'); ?>
							</div>
						
							<div class="BE-btn-primary "><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn  cta-btn"><?php esc_html_e('back to homepage','bcorporate'); ?></a></div>
						</section><!-- .error-404 -->

					

					</div>

				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
