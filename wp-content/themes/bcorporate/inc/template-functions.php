<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bcorporate
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function bcorporate_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'bcorporate_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function bcorporate_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'bcorporate_pingback_header' );

/***************************************************
bcorporate custom fucntions
****************************************************/

/*
=================================================
Homepage Aboutus Section Function
@Action: bcorporate_home_about_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_about_sec_fnc' ) ) :

function bcorporate_home_about_sec_fnc() {
	if( get_theme_mod( 'home_page_about_enable', '1' ) ): // check if about section is enabled
		?>
		<section id="bcorporate_home_about_wrap">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 text-center">
					<h1>
						<?php echo esc_html( get_theme_mod( 'homepage_about_main_text' ) );?>
					</h1>
					<div class="about_mid_text col-md-12 col-sm-12 col-lg-8 offset-lg-2 homepage_sub_text">
						<p><?php echo esc_html( get_theme_mod( 'homepage_about_sub_text','Check out How our themes works') );?></p>
					</div>
					<div class="about_bottom_text">
						<a href="<?php echo esc_url( site_url() ); ?>">
							<span>
								<?php echo esc_html( get_theme_mod('homepage_about_bottom_text' ) ); ?>
							</span></a>
					</div>
				</div>
			</div></div>

			<div class="about_video_section">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 text-center">
							<?php if( get_theme_mod('homepage_about_image_url') ){ ?>
							<img class="about_home_img" src="<?php echo esc_url ( get_theme_mod('homepage_about_image_url') ); ?>">
							<?php } else{ 
								if( get_theme_mod('homepage_video_url') ){ 
							 ?>
							 	<?php echo wp_oembed_get( esc_url( get_theme_mod( 'homepage_video_url' ) ) ); ?>
							<?php } }
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
		<?php
	endif; // end if about section is enable condition 
	}
endif;

/*
=================================================
Homepage Feature Section Function
@Action: bcorporate_home_feature_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_feature_sec_fnc' ) ) :

function bcorporate_home_feature_sec_fnc() {
	if( get_theme_mod( 'home_page_feature_enable', '1') ):
		$bcorporate_featured_id = get_theme_mod('homepage_feature_category');
		?>
		<section id="bcorporate_home_feature_wrap" class="text-center  ">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-12 ">
					<h1>
						<?php 
						echo get_theme_mod('homepage_feature_main_title', 'Quality Cost Effective Services'); ?>
					</h1>
				</div>
			</div>
			<div class="row home_feature_post_wrap">
				<?php
			    	if(!empty($bcorporate_featured_id)){
			    		$bcorporate_feat_aos_delay = 0;
			    		$bcorporate_feature_query  = new WP_Query( array( 
																'cat' => absint( $bcorporate_featured_id ) , 
																'posts_per_page' => 5 
															) );

					while ( $bcorporate_feature_query->have_posts() ) : $bcorporate_feature_query->the_post();
			     ?>
			    	<div class="services_single-wrap" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bcorporate_feat_aos_delay ); ?>" data-aos-once="true">
				    	<div class="header_part_feature">
				    		<div class="home_feature_icon"><img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'full') );?>"></div>
				    		
				    	</div>
				    	<div class="content_part_feature">
				    		<h3>
				    			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				    		</h3>
				    		<p><?php the_excerpt(); ?></p>
				    	</div>
			    	</div>	
			 	<?php $bcorporate_feat_aos_delay = $bcorporate_feat_aos_delay+50; endwhile;  wp_reset_postdata(); } ?>
			</div>
		</div>
		</section>
		<?php 
	endif;
	}
endif;


/*
=================================================
Homepage Portfolio Section Function
@Action: bcorporate_home_portfolio_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_portfolio_sec_fnc' ) ) :

function bcorporate_home_portfolio_sec_fnc() {
	if( get_theme_mod( 'home_page_portfolio_enable', '1') ):
		$bcorporate_portfolio_id = get_theme_mod('homepage_portfolio_category');
		?>
		<section id="bcorporate_home_portfolio_wrap" class="text-center bcorporate_home_feature_wrap-bg">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h1>
						<?php
							echo esc_html( get_theme_mod('homepage_portfolio_main_title', 'Showcase Portfolio') );
						 ?>
					</h1>
					<div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 homepage_sub_text"><p >
						<?php echo wp_kses_post( category_description( absint( $bcorporate_portfolio_id ) ) );?>
						</p>
				</div></div>
			</div>
			<div class="row home_portfolio_post_wrap">
				<?php
			    	if(!empty($bcorporate_portfolio_id)){
			    		$bcorporate_portfolio_query  = new WP_Query( array( 
																'cat' => absint( $bcorporate_portfolio_id ) , 
																'posts_per_page' => -1 
															) );
			    		$bcorporate_portfolio_aos_delay = 0;
					while ( $bcorporate_portfolio_query->have_posts() ) : $bcorporate_portfolio_query->the_post();
			     ?>
				    <div class="col-md-6 col-sm-6 col-lg-4 portfolio_single">
				    	<div class="portfolio_single_wrap" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bcorporate_portfolio_aos_delay ); ?>" data-aos-once="true">
					    	<div class="portfolio_image">
					    		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_portfolio') );?>">
					    	</div>
					    	<div class="content_part_portfolio text-left">
					    		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					    		<div class="category">
					    			<?php the_category(); ?>
					    		</div>	
					    		<div class="main_content_portfolio">
					    			<p><?php the_excerpt();?></p>
					    		</div>
					    			
					    	</div>
				     	
				    	</div>
				    </div>
			 	<?php $bcorporate_portfolio_aos_delay = $bcorporate_portfolio_aos_delay+50;  endwhile; wp_reset_postdata();
			 	}
			 	 ?>
			</div></div>
		</section>
		<?php
	endif; 
	}
endif;


/*
=================================================
Homepage ctaone Section Function
@Action: bcorporate_home_ctaone_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_ctaone_sec_fnc' ) ) :

function bcorporate_home_ctaone_sec_fnc() {
	if( get_theme_mod( 'home_page_cta_enable', '1') ):
		?>
		<section id="bcorporate_home_ctaone_wrap" class="text-center bcorporate_home_feature_wrap-bg">
			<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h1 data-aos="fade-down" data-aos-once="true"  data-aos-delay="400">
						<?php echo esc_html( get_theme_mod( 'homepage_cta_one_main_title', 'Ready to get started with BCorporate Pro?' ) );?>
					</h1>
					<p class=" homepage_sub_text" data-aos="fade-up"   data-aos-once="true"  data-aos-delay="450"><?php echo esc_html( get_theme_mod( 'homepage_cta_one_sub_title', 'Let me take the maximum benefit by exploring the Pro Version.' ) );?></p>
					<?php if( get_theme_mod('homepage_cta_one_button_url') ): ?>
						<div class=" BE-btn-primary" data-aos="fade-up"   data-aos-once="true"  data-aos-delay="500"><a href="<?php echo esc_url( get_theme_mod('homepage_cta_one_button_url') ); ?>" class="btn cta-btn">
							<?php
								$cta_one_button_text = get_theme_mod( 'homepage_cta_one_button_text', __( 'View More', 'bcorporate' ) );
 								echo esc_html( $cta_one_button_text );
 							?></a>
						</a>
					<?php endif; ?>
				</div>
			</div></div>
		</section>
		<?php
	endif;
	} 
endif;


/*
=================================================
Homepage Services Section Function
@Action: bcorporate_home_services_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_services_sec_fnc' ) ) :

function bcorporate_home_services_sec_fnc() {
	if( get_theme_mod( 'home_page_services_enable', '1') ):
		$bcorporate_services_id = get_theme_mod('homepage_services_category');
		?>
		<section id="bcorporate_home_services_wrap" class="text-center ">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h1>
						<?php
							echo esc_html( get_theme_mod('homepage_services_main_title','Services') ); ?>
					</h1>
					<div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 homepage_sub_text">
						<p>
						<?php 
							echo wp_kses_post( category_description( absint( $bcorporate_services_id ) ) );
						?>		
					</p>
				</div></div>
			</div>
			<div class="row home_services_post_wrap">
				<?php
			    	
			    	if(!empty($bcorporate_services_id)){
			    		$bcorporate_services_query  = new WP_Query( array( 
																'cat' => absint( $bcorporate_services_id ) , 
																'posts_per_page' => -1 
															) );
			    		$bcorporate_services_two_aos_delay = 0;
					while ( $bcorporate_services_query -> have_posts() ) : $bcorporate_services_query -> the_post();
			     ?>
				    <div class="col-md-6 col-sm-6 col-lg-4 services_single">
				    	<div class="services_single-warp" data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bcorporate_services_two_aos_delay ); ?>" data-aos-once="true">
					    	<div class="services_image">
					    		<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_portfolio') );?>">
					    	</div>
					    	<div class="content_part_services">
					    		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
					    		<div class="main_content_services">
					    			<p><?php echo wp_kses_post( get_the_content() ); ?></p>
					    		</div>	
					    	</div>
				    	</div>
				    </div>
			 	<?php $bcorporate_services_two_aos_delay = $bcorporate_services_two_aos_delay+50; endwhile; wp_reset_postdata();
			 	}
			 	 ?>
			</div></div>
		</section>
		<?php 
	endif;
	}
endif;

/*
=================================================
Homepage Blog Section Function
@Action: bcorporate_home_blog_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_blog_sec_fnc' ) ) :

function bcorporate_home_blog_sec_fnc() {
	if( get_theme_mod( 'home_page_blog_enable', '1') ):
		$bcorporate_blog_id = get_theme_mod('homepage_blog_category');
		?>
		<section id="bcorporate_home_blog_wrap" class="text-center bcorporate_home_feature_wrap-bg">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h1>
						<?php echo esc_html( get_theme_mod('homepage_blog_main_title', 'Blog') ); ?>
					</h1>
					<div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 homepage_sub_text"><p><?php echo wp_kses_post( category_description( absint( $bcorporate_blog_id ) ) );?></p></div>
				</div>
			</div>
			<div class="row home_blog_post_wrap">
				<?php
			    	if(!empty($bcorporate_blog_id)){
			    		$bcorporate_about_aos_delay = 0;
			    		$bcorporate_blog_query  = new WP_Query( array( 
																'cat' => absint( $bcorporate_blog_id ) , 
																'posts_per_page' => -1 
															) );

					while ( $bcorporate_blog_query -> have_posts() ) : $bcorporate_blog_query -> the_post();
			     ?>
				    <div class="col-md-6 col-sm-6 col-lg-4 blog_single text-left">
				    	<div data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bcorporate_about_aos_delay ); ?>" data-aos-once="true">
				    		<div class="blog-single-wrap">
						    	<div class="blog_image">
						    		<a href="<?php the_permalink();?>">
						    			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_portfolio') );?>">
						    		</a>
						    	</div>
						    	<div class="content_part_blog clearfix">
						    		<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
						    		<p class="blog_homepage_date"><?php echo esc_html( 'by', 'bcorporate'); ?>
						    			<span class="bcorp_blog_author"><?php echo esc_html( get_the_author(),'bcorporate' );?></span> | 
						    			<span class="bcorp_blog_date"> <?php echo esc_html( get_the_date(), 'bcorporate' );?> </span></p>
						    		<div class="main_content_blog"><p>
						    			<?php the_excerpt() ?></p>
						    		</div>
						    		<div class="BE-btn-primary pull-left ">
						    			<a href="<?php the_permalink(); ?>" class="read_me_blog btn">
						    				<?php esc_html_e('Read Full Story', 'bcorporate'); ?>
						    			</a>
						    			
			  						</div>
			  						<div class="Bcorp_comment pull-right">
			  							<a href="<?php the_permalink();?>/#comments" class="comment_num">
						    				<i class="far fa-comment" aria-hidden="true"></i>
			  								<?php echo absint( get_comments_number() ); ?>
			  							</a>
			  						</div>

						    	</div>
				    	</div></div>
					</div>
			 	<?php $bcorporate_about_aos_delay = $bcorporate_about_aos_delay+100; endwhile; wp_reset_postdata();
			 	}
			 	 ?>
			</div></div>
		</section>
		<?php 
	endif;
	}
endif;


/*
=================================================
Homepage Testimonial Section Function
@Action: bcorporate_home_testimonial_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_testimonial_sec_fnc' ) ) :

function bcorporate_home_testimonial_sec_fnc() {
	if( get_theme_mod( 'home_page_testimonial_enable', '1') ):
		$bcorporate_testimonial_id = get_theme_mod('homepage_testimonial_category');
		?>
		<section id="bcorporate_home_testimonial_wrap" class="text-center bcorporate_home_feature_wrap-bg">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<span class=" homepage_sub_text">
						<?php echo wp_kses_post( category_description( absint( $bcorporate_testimonial_id ) ) );?>
								
					</span>
					<h1 class="homepage_testimonial_main_title">
						<?php 
							echo esc_html( get_theme_mod('homepage_testimonial_main_title', 'Testimonial') );
						?>
					</h1>
					
				</div>
			</div>
			<div class="row home_blog_post_wrap">
				<?php
			    	if(!empty($bcorporate_testimonial_id)){
			    		$bcorporate_testimonial_query  = new WP_Query( array( 
																'cat' => absint( $bcorporate_testimonial_id ) , 
																'posts_per_page' => -1 
															) );
			    		$bcorporate_testimonial_aos_delay = 0;
					while ( $bcorporate_testimonial_query -> have_posts() ) : $bcorporate_testimonial_query -> the_post();
			     ?>
				    <div class="col-md-4 col-sm-4 testimonial_single">
				    	<div  data-aos="fade-up" data-aos-delay="<?php echo esc_attr( $bcorporate_testimonial_aos_delay ); ?>" data-aos-once="true">
					    	<div class="main_content_testimonial">
					    		<p><?php the_excerpt(); ?></p>
					    	</div>
					    	<div class="testimonial_image">
					    		<span>
					    			<img src="<?php echo esc_url( get_the_post_thumbnail_url( get_the_ID(),'bcorporate_testimonial') );?>">
					    		</span>
					    	</div>
					    	<div class="testimonial_author">
					    		<h3><?php the_title(); ?></h3>
					    	</div>
				    	</div>
				    </div>
			 	<?php $bcorporate_testimonial_aos_delay = $bcorporate_testimonial_aos_delay+50; endwhile; wp_reset_postdata();
			 	}
			 	 ?>
			</div></div>
		</section>
		<?php 
	endif;
	}
endif;

/*
=================================================
Homepage ctatwo Section Function
@Action: bcorporate_home_ctatwo_sec
=================================================
*/
if ( ! function_exists( 'bcorporate_home_ctatwo_sec_fnc' ) ) :

function bcorporate_home_ctatwo_sec_fnc() {
	if( get_theme_mod( 'home_page_cta_two_enable', '1') ):
		?>
		<section id="bcorporate_home_ctatwo_wrap" class="text-center ">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h1 data-aos="fade-down"   data-aos-once="true"  data-aos-delay="400">
						<?php echo esc_html( get_theme_mod( 'homepage_cta_two_main_title', 'Learn More About Our Theme' ) );?>
					</h1>
					<div class="col-md-12 col-sm-12 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 "><p  class="bcorporate_home_ctatwo_sub-text" data-aos="fade-up" data-aos-once="true"  data-aos-delay="450"><?php echo esc_html( get_theme_mod( 'homepage_cta_two_sub_title', 'Detail information about theme features, updates and upcoming release on our site or - Download Theme Documentation' ) );?></p></div>
					<?php if( get_theme_mod('homepage_cta_two_button_url') ): ?>
						<div class="BE-btn-primary " data-aos="fade-up"   data-aos-once="true"  data-aos-delay="500"><a href="<?php echo esc_url( get_theme_mod('homepage_cta_two_button_url') ); ?>" class="btn cta-btn">
							<?php 
								$cta_two_button_text = get_theme_mod( 'homepage_cta_two_button_text', __( 'View Page', 'bcorporate' ) );
								echo esc_html( $cta_two_button_text );?></a>
						</a>
					<?php endif; ?>
				</div>
			</div></div>
		</section>
		<?php
	endif;
	} 
endif;

// navigation fallback
if ( ! function_exists( 'bcorporate_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function bcorporate_primary_navigation_fallback() {

		echo '<ul id="primary-menu" class="header-menu nav-menu" aria-expanded="false">';
		echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'bcorporate' ) . '</a></li>';

		$args = array(
			'posts_per_page' => 5,
			'post_type'      => 'page',
			'orderby'        => 'name',
			'order'          => 'ASC',
			);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				the_title( '<li><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
			}

			wp_reset_postdata();
		}

		echo '</ul>';
	}

endif;