<?php
/**
 * Bcorporate Theme Customizer
 *
 * @package Bcorporate
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

/***
1. Homepage Section
***/

function bcorporate_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'bcorporate_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'bcorporate_customize_partial_blogdescription',
		) );
	}

	/*    	
	=================================================
	1. Home Page Customizer
	=================================================
	*/

	$wp_customize->add_panel( 'homepage_setting_panel', array( // General Panel
	    'priority'       => 50,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Home Page', 'bcorporate'),
	    'description'    => esc_html__('To function all the controls under this panel you should select page template as Home Page', 'bcorporate'),
	));

	/* 1.0 Homepage Banner Section **/
	$wp_customize->add_section( 'home_page_banner_section' , array(
	    'title'       => esc_html__( 'Homepage banner Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	// add color picker setting
	$wp_customize->add_setting( 'banner_bk_color', array(
		'default' => '#000000',
		'sanitize_callback' => 'bcorporate_sanitize_hex_color',
	) );

	// add color picker control
	$wp_customize->add_control( 
		new WP_Customize_Color_Control( 
		$wp_customize, 
		'banner_bk_color', 
		array(
			'label'      => __( 'Header Banner Background Color', 'bcorporate' ),
			'section'    => 'home_page_banner_section',
			'settings'   => 'banner_bk_color',
		) ) 
	);

	$wp_customize->add_setting( 'home_page_slider_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_slider_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_banner_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable Slider Section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to disable Slider', 'bcorporate' ),
	) );


	//Slider category dropdown
	$wp_customize->add_setting(
	    'homepage_slider_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'homepage_slider_category',
	    array(
	        'label' => esc_html__( 'Choose Slider Category', 'bcorporate' ),
	        'section' => 'home_page_banner_section',
	        'description' => esc_html__( 'Select Category to show posts in banner slider','bcorporate' ),
	        'type' => 'select',
	    )
	) );





	/* 1.1 Homepage About section **/
	$wp_customize->add_section( 'home_page_about_section' , array(
	    'title'       => esc_html__( 'Homepage about Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	$wp_customize->add_setting( 'home_page_about_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_about_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_about_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable Homepage About Section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to disable Homepga about section', 'bcorporate' ),
	  'priority' => 2,
	) );

	//About main text
	$wp_customize->add_setting( 
		'homepage_about_main_text', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_about_main_text', array(
		'label'    => esc_html__( 'About Section Main Title', 'bcorporate' ),
		'section'  => 'home_page_about_section',
		'type'     => 'text',
		'priority' => 2,
	) );

	//About sub text
	$wp_customize->add_setting( 
		'homepage_about_sub_text', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_about_sub_text', array(
		'label'    => esc_html__( 'About Section Sub Title', 'bcorporate' ),
		'section'  => 'home_page_about_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	//About bottom text
	$wp_customize->add_setting( 
		'homepage_about_bottom_text', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_about_bottom_text', array(
		'label'    => esc_html__( 'About Section Bottom Title', 'bcorporate' ),
		'section'  => 'home_page_about_section',
		'type'     => 'textarea',
		'default'	=> 'Check out How our themes works',
		'priority' => 2,
	) );

	// About section video url
	$wp_customize->add_setting( 'homepage_about_image_url',
		array(
			'sanitize_callback' => 'bcorporate_sanitize_image',
		)
	 );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'homepage_about_image_url', array(
	    'label'    => esc_html__( 'About Section Image ', 'bcorporate' ),
	    'section'  => 'home_page_about_section',
	) ) );


	$wp_customize->add_setting( 'homepage_video_url', array(
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'bcorporate_sanitize_url',
	) );

	$wp_customize->add_control( 'homepage_video_url', array(
	  'type' => 'url',
	  'section' => 'home_page_about_section', // Add a default or your own section
	  'label' => esc_html__( 'Custom URL', 'bcorporate' ),
	  'description' => esc_html__( 'Enter the youtube url of the video', 'bcorporate' ),
	  'input_attrs' => array(
	    'placeholder' => esc_attr__( 'http://youtube.com', 'bcorporate' ),
	  ),
	) );

	/* 1.2 Homepage Feature section **/
	$wp_customize->add_section( 'home_page_feature_section' , array(
	    'title'       => esc_html__( 'Homepage feature Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	// Features enable disable 
	$wp_customize->add_setting( 'home_page_feature_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_feature_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_feature_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable Homepage Feature Section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to disable Feature section', 'bcorporate' ),
	  'priority' => 2,
	) );

	//Feature main title
	$wp_customize->add_setting( 
		'homepage_feature_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_feature_main_title', array(
		'label'    => esc_html__( 'Feature Section Main Title', 'bcorporate' ),
		'section'  => 'home_page_feature_section',
		'type'     => 'text',
		'default'	=> esc_html__('Quality Cost Effective Services','bcorporate'),
		'priority' => 2,
	) );

	//Feature category dropdown
	$wp_customize->add_setting(
	    'homepage_feature_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'homepage_feature_category',
	    array(
	        'label' => esc_html__( 'Choose Feature Category', 'bcorporate' ),
	        'section' => 'home_page_feature_section',
	        'description' => esc_html__( 'Select Category to show posts in Feature section','bcorporate' ),
	        'type' => 'select',
	        'priority' => 2,
	    )
	) );


	/* 1.3 Homepage Portfolio section **/
	$wp_customize->add_section( 'home_page_portfolio_section' , array(
	    'title'       => esc_html__( 'Homepage Portfolio Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	$wp_customize->add_setting( 'home_page_portfolio_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_portfolio_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_portfolio_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable Homepage Portfolio Section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to disable Portfolio section', 'bcorporate' ),
	  'priority' => 2,
	) );

	//portfolio main title
	$wp_customize->add_setting( 
		'homepage_portfolio_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_portfolio_main_title', array(
		'label'    => esc_html__( 'Portfolio Section Main Title', 'bcorporate' ),
		'section'  => 'home_page_portfolio_section',
		'type'     => 'text',
		'priority' => 2,
	) );


	//Portfolio category dropdown
	$wp_customize->add_setting(
	    'homepage_portfolio_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'homepage_portfolio_category',
	    array(
	        'label' => esc_html__( 'Choose Portfolio Category', 'bcorporate' ),
	        'section' => 'home_page_portfolio_section',
	        'description' => esc_html__(' Select Category to show posts in Portfolio section ','bcorporate'),
	        'type' => 'select',
	        'priority' => 2,
	    )
	) );

	/* 1.4 Homepage CTA One section **/
	$wp_customize->add_section( 'home_page_cta_one_section' , array(
	    'title'       => esc_html__( 'Homepage CTA One Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	// CTA enable disable 
	$wp_customize->add_setting( 'home_page_cta_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_cta_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_cta_one_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable CTa Feature Section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to CTa Feature section', 'bcorporate' ),
	  'priority' => 2,
	) );



	//CTA cat one main title
	$wp_customize->add_setting( 
		'homepage_cta_one_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_cta_one_main_title', array(
		'label'    => esc_html__( 'CTA One Main Title', 'bcorporate' ),
		'section'  => 'home_page_cta_one_section',
		'type'     => 'text',
		'priority' => 2,
	) );

	//CTA one sub title
	$wp_customize->add_setting( 
		'homepage_cta_one_sub_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_cta_one_sub_title', array(
		'label'    => esc_html__( 'CTA One Sub Text', 'bcorporate' ),
		'section'  => 'home_page_cta_one_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	//CTA one button text
	$wp_customize->add_setting( 
		'homepage_cta_one_button_text', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_cta_one_button_text', array(
		'label'    => esc_html__( 'CTA One Button Text', 'bcorporate' ),
		'section'  => 'home_page_cta_one_section',
		'type'     => 'text',
		'priority' => 2,
	) );

	// cta one section redirect url
	$wp_customize->add_setting( 'homepage_cta_one_button_url', array(
	  'sanitize_callback' => 'bcorporate_sanitize_url',
	) );

	$wp_customize->add_control( 'homepage_cta_one_button_url', array(
	  'type' => 'url',
	  'section' => 'home_page_cta_one_section', // Add a default or your own section
	  'label' => esc_html__( 'CTA Button URL', 'bcorporate' ),
	  'input_attrs' => array(
	    'placeholder' => esc_attr__( 'http://example.com', 'bcorporate' ),
	  ),
	) );

	/* 1.5 Homepage Services section **/
	$wp_customize->add_section( 'home_page_services_section' , array(
	    'title'       => esc_html__( 'Homepage Services Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	// Services enable disable 
	$wp_customize->add_setting( 'home_page_services_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_services_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_services_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable homepage services section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to homepage services section', 'bcorporate' ),
	  'priority' => 2,
	) );

	//Services title
	$wp_customize->add_setting( 
		'homepage_services_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_services_main_title', array(
		'label'    => esc_html__( 'Services Main Title', 'bcorporate' ),
		'section'  => 'home_page_services_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	//Services Subtitle
	$wp_customize->add_setting( 
		'homepage_services_sub_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_services_sub_title', array(
		'label'    => esc_html__( 'Services Sub Title', 'bcorporate' ),
		'section'  => 'home_page_services_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );


	//Services category dropdown
	$wp_customize->add_setting(
	    'homepage_services_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'homepage_services_category',
	    array(
	        'label' => esc_html__( 'Choose Services Category', 'bcorporate' ),
	        'section' => 'home_page_services_section',
	        'description' => esc_html__(' Select Category to show posts in Services section','bcorporate'),
	        'type' => 'select',
	        'priority' => 2,
	    )
	) );

	/* 1.6 Homepage Blog section **/
	$wp_customize->add_section( 'home_page_blog_section' , array(
	    'title'       => esc_html__( 'Homepage Blog Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );


	// Blog enable disable 
	$wp_customize->add_setting( 'home_page_blog_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_blog_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_blog_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable homepage blog section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to homepage blog section', 'bcorporate' ),
	  'priority' => 2,
	) );

	//Blog title
	$wp_customize->add_setting( 
		'homepage_blog_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_blog_main_title', array(
		'label'    => esc_html__( 'Blog Main Title', 'bcorporate' ),
		'section'  => 'home_page_blog_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );


	//Blog category dropdown
	$wp_customize->add_setting(
	    'homepage_blog_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'homepage_blog_category',
	    array(
	        'label' => esc_html__( 'Choose Blog Category', 'bcorporate' ),
	        'section' => 'home_page_blog_section',
	        'description' => esc_html__(' Select Category to show posts in Blog section ','bcorporate'),
	        'type' => 'select',
	        'priority' => 2,
	    )
	) );

	/* 1.7 Homepage Testimonial section **/
	$wp_customize->add_section( 'home_page_testimonial_section' , array(
	    'title'       => esc_html__( 'Homepage Testimonial Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );

	// Testimonial enable disable 
	$wp_customize->add_setting( 'home_page_testimonial_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_testimonial_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_testimonial_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable homepage testimonial section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to homepage testimonial section', 'bcorporate' ),
	  'priority' => 2,
	) );

	//Testimonial title
	$wp_customize->add_setting( 
		'homepage_testimonial_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_testimonial_main_title', array(
		'label'    => esc_html__( 'Testimonial Main Title', 'bcorporate' ),
		'section'  => 'home_page_testimonial_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	//Testimonial category dropdown
	$wp_customize->add_setting(
	    'homepage_testimonial_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'homepage_testimonial_category',
	    array(
	        'label' => esc_html__( 'Choose Testimonial Category', 'bcorporate' ),
	        'section' => 'home_page_testimonial_section',
	        'description' => esc_html__( ' Select Category to show posts in Testimonial section ','bcorporate'),
	        'type' => 'select',
	        'priority' => 2,
	    )
	) );

	/* 1.8 Homepage CTA Two section **/
	$wp_customize->add_section( 'home_page_cta_two_section' , array(
	    'title'       => esc_html__( 'Homepage CTA Two Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'homepage_setting_panel',
	) );


	// CTA Two enable disable 
	$wp_customize->add_setting( 'home_page_cta_two_enable', array(
	  'capability' => 'edit_theme_options',
	  'default' => '1',
	  'sanitize_callback' => 'bcorporate_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'home_page_cta_two_enable', array(
	  'type' => 'checkbox',
	  'section' => 'home_page_cta_two_section', // Add a default or your own section
	  'label' => esc_html__( 'Enable homepage cta two section', 'bcorporate' ),
	  'description' => esc_html__( 'Uncheck to homepage cta two section', 'bcorporate' ),
	  'priority' => 2,
	) );


	//CTA cat two main title
	$wp_customize->add_setting( 
		'homepage_cta_two_main_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_cta_two_main_title', array(
		'label'    => esc_html__( 'CTA Two Main Title', 'bcorporate' ),
		'section'  => 'home_page_cta_two_section',
		'type'     => 'text',
		'priority' => 2,
	) );

	//CTA two sub title
	$wp_customize->add_setting( 
		'homepage_cta_two_sub_title', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_cta_two_sub_title', array(
		'label'    => esc_html__( 'CTA Two Sub Text', 'bcorporate' ),
		'section'  => 'home_page_cta_two_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	//CTA two button text
	$wp_customize->add_setting( 
		'homepage_cta_two_button_text', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_text',	
			)
	);
	$wp_customize->add_control( 'homepage_cta_two_button_text', array(
		'label'    => esc_html__( 'CTA Two Button Text', 'bcorporate' ),
		'section'  => 'home_page_cta_two_section',
		'type'     => 'text',
		'priority' => 2,
	) );

	// cta two section redirect url
	$wp_customize->add_setting( 'homepage_cta_two_button_url', array(
	  'sanitize_callback' => 'bcorporate_sanitize_url',
	) );

	$wp_customize->add_control( 'homepage_cta_two_button_url', array(
	  'type' => 'url',
	  'section' => 'home_page_cta_two_section', // Add a default or your own section
	  'label' => esc_html__( 'CTA Button URL', 'bcorporate' ),
	  'input_attrs' => array(
	    'placeholder' => esc_attr__( 'http://example.com/', 'bcorporate' ),
	  ),
	) );

	/*    	
	=================================================
	2. Footer Setting Customizer
	=================================================
	*/

	$wp_customize->add_panel( 'footer_setting_panel', array( // General Panel
	    'priority'       => 50,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Footer Section', 'bcorporate'),
	    'description'    => esc_html__('Changes the home page settings', 'bcorporate'),
	));

	/* 2.1 Footer section **/
	$wp_customize->add_section( 'footer_text_section' , array(
	    'title'       => esc_html__( 'Footer Copyright Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'footer_setting_panel',
	) );

	//About main text
	$wp_customize->add_setting( 
		'footer_text_setting', 
		array(
			'sanitize_callback' => 'bcorporate_sanitize_html',	
			)
	);
	$wp_customize->add_control( 'footer_text_setting', array(
		'label'    => esc_html__( 'Footer Copyright Text', 'bcorporate' ),
		'section'  => 'footer_text_section',
		'type'     => 'textarea',
		'priority' => 2,
	) );

	/*    	
	=================================================
	3. Blog Setting Customizer
	=================================================
	*/

	$wp_customize->add_panel( 'blog_setting_panel', array( // General Panel
	    'priority'       => 50,
	    'capability'     => 'edit_theme_options',
	    'title'          => esc_html__('Blog Page Section', 'bcorporate'),
	    'description'    => esc_html__('Changes the blog page settings', 'bcorporate'),
	));



	/* 1.1 Blog Page section **/
	$wp_customize->add_section( 'blog_page_section' , array(
	    'title'       => esc_html__( 'Blog Page Section', 'bcorporate' ),
	    'priority'    => 1,
	    'panel' => 'blog_setting_panel',
	) );

	//Blog category dropdown
	$wp_customize->add_setting(
	    'blog_page_category',
	    array(
	        'sanitize_callback' => 'bcorporate_sanitize_select',
	        )
	);

	$wp_customize->add_control( new Bcorporate_Category_Dropdown( $wp_customize, 'blog_page_category',
	    array(
	        'label' => esc_html__( 'Choose Blog Category', 'bcorporate' ),
	        'section' => 'blog_page_section',
	        'description' => esc_html__(' Select Category to show posts in Blog Page Leave empty to show all the posts ','bcorporate'),
	        'type' => 'select',
	        'priority' => 2,
	    )
	) );
	
	

}
add_action( 'customize_register', 'bcorporate_customize_register' );

// for banner background color
function bcorporate_customize_colors() {
	$bcorporate_bk_color = get_theme_mod('banner_bk_color');
	if($bcorporate_bk_color != '#000000'){ ?>
		<style type="text/css">
			.bcorporate_banner_section:after {
				background: <?php echo $bcorporate_bk_color; ?>;
			}
		</style>
	<?php 
	}
}
add_action( 'wp_head', 'bcorporate_customize_colors' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bcorporate_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bcorporate_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bcorporate_customize_preview_js() {
	wp_enqueue_script( 'bcorporate-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'bcorporate_customize_preview_js' );


/**
 * bcorporate sanitization functions
*/

// Text field sanitization
function bcorporate_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

// Url field sanitization
function bcorporate_sanitize_url( $url ) {
	return esc_url_raw( $url );
}

// Image field sanitization
function bcorporate_sanitize_image( $input, $setting ) {
	return esc_url_raw( bcorporate_validate_image( $input, $setting->default ) );
}


// Select field sanitization
function bcorporate_sanitize_select( $input, $setting ) {
	return absint( $input );
}


// Checkbod filed sanitization 
function bcorporate_sanitize_checkbox( $checked ) {
  // Boolean check.
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}

/**
 * Control:WP_Customize_Image_Control
 **/
function bcorporate_validate_image( $input, $default = '' ) {
	// Array of valid image file types
	$mimes = array(
		'jpg|jpeg|jpe' => 'image/jpeg',
		'gif'          => 'image/gif',
		'png'          => 'image/png',
		'bmp'          => 'image/bmp',
		'tif|tiff'     => 'image/tiff',
		'ico'          => 'image/x-icon'
	);

	$file = wp_check_filetype( $input, $mimes );
	return ( $file['ext'] ? $input : $default );
}

/**
* Control: Html Sanitize
**/

function bcorporate_sanitize_html( $input ) {
	global $allowedposttags;

	return wp_kses( $input, $allowedposttags );

	$allowed = array(
			    'a' => array(
			        'href' => array(),
			        'title' => array(),
			        'target' => array(),
			        'class' => array()
			    ),
			    'strong' => array(),
			    'p' => array(),
			);

	return wp_kses( $input, $allowed );
}
// sanitize hex color
function bcorporate_sanitize_hex_color( $hex_color, $setting ) {
  // Sanitize $input as a hex value without the hash prefix.
  $hex_color = sanitize_hex_color( $hex_color );

  // If $input is a valid hex value, return it; otherwise, return the default.
  return ( ! null( $hex_color ) ? $hex_color : $setting->default );
}

