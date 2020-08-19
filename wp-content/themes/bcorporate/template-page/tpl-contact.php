<?php
/**
 * Template Name: Contact Page
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
		?>
		<div class="bcorporate_banner_section bcorporate_contact_banner_section " style="background-image: url(<?php if( has_post_thumbnail() ): echo esc_url( get_the_post_thumbnail_url() ); endif;?>)">
			<div class="container">
			<div class="text-center caption-text">
				<h1 class="inner_page_title"><?php the_title(); ?></h1>
				<?php
					// Check if NavXT plugin activated
					if( class_exists( 'breadcrumb_navxt' ) ) {
						bcn_display();
					} 
				?>
			</div></div>
		</div>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
	<!-- end of the header part -->

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			 
				<?php the_content(); ?>
			 
		</main>
	</div>
<?php endwhile; ?>

<?php
get_footer();

