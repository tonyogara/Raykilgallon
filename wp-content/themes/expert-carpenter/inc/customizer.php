<?php
/**
 * Expert Carpenter: Customizer
 *
 * @subpackage Expert Carpenter
 * @since 1.0
 */

use WPTRT\Customize\Section\Expert_Carpenter_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Expert_Carpenter_Button::class );

	$manager->add_section(
		new Expert_Carpenter_Button( $manager, 'expert_carpenter_pro', [
			'title'       => __( 'Expert Carpenter Pro', 'expert-carpenter' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'expert-carpenter' ),
			'button_url'  => esc_url('https://www.luzuk.com/product/carpenter-wordpress-theme/')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'expert-carpenter-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'expert-carpenter-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function expert_carpenter_customize_register( $wp_customize ) {

	$wp_customize->add_setting('expert_carpenter_show_site_title',array(
       'default' => true,
       'sanitize_callback'	=> 'expert_carpenter_sanitize_checkbox'
    ));
    $wp_customize->add_control('expert_carpenter_show_site_title',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Title','expert-carpenter'),
       'section' => 'title_tagline'
    ));

    $wp_customize->add_setting('expert_carpenter_show_tagline',array(
       'default' => true,
       'sanitize_callback'	=> 'expert_carpenter_sanitize_checkbox'
    ));
    $wp_customize->add_control('expert_carpenter_show_tagline',array(
       'type' => 'checkbox',
       'label' => __('Show / Hide Site Tagline','expert-carpenter'),
       'section' => 'title_tagline'
    ));

	$wp_customize->add_panel( 'expert_carpenter_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'expert-carpenter' ),
	    'description' => __( 'Description of what this panel does.', 'expert-carpenter' ),
	) );

	$wp_customize->add_section( 'expert_carpenter_theme_options_section', array(
    	'title'      => __( 'General Settings', 'expert-carpenter' ),
		'priority'   => 30,
		'panel' => 'expert_carpenter_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('expert_carpenter_theme_options',array(
        'default' => __('Right Sidebar','expert-carpenter'),
        'sanitize_callback' => 'expert_carpenter_sanitize_choices'	        
	));

	$wp_customize->add_control('expert_carpenter_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','expert-carpenter'),
        'section' => 'expert_carpenter_theme_options_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','expert-carpenter'),
            'Right Sidebar' => __('Right Sidebar','expert-carpenter'),
            'One Column' => __('One Column','expert-carpenter'),
            'Three Columns' => __('Three Columns','expert-carpenter'),
            'Four Columns' => __('Four Columns','expert-carpenter'),
            'Grid Layout' => __('Grid Layout','expert-carpenter')
        ),
	));

	// Top Bar
	$wp_customize->add_section( 'expert_carpenter_top_bar', array(
    	'title'      => __( 'Contact Details', 'expert-carpenter' ),
		'priority'   => null,
		'panel' => 'expert_carpenter_panel_id'
	) );

	$wp_customize->add_setting('expert_carpenter_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'expert_carpenter_sanitize_email'
	));	
	$wp_customize->add_control('expert_carpenter_email_address',array(
		'label'	=> __('Add Email Address','expert-carpenter'),
		'section'=> 'expert_carpenter_top_bar',
		'setting'=> 'expert_carpenter_email_address',
		'type'=> 'text'
	));

	$wp_customize->add_setting('expert_carpenter_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'expert_carpenter_sanitize_phone_number'
	));	
	$wp_customize->add_control('expert_carpenter_phone_number',array(
		'label'	=> __('Add Phone Number','expert-carpenter'),
		'section'=> 'expert_carpenter_top_bar',
		'setting'=> 'expert_carpenter_phone_number',
		'type'=> 'text'
	));

	//social icons
	$wp_customize->add_section( 'expert_carpenter_social', array(
    	'title'      => __( 'Social Icons', 'expert-carpenter' ),
		'priority'   => null,
		'panel' => 'expert_carpenter_panel_id'
	) );

	$wp_customize->add_setting('expert_carpenter_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_carpenter_facebook_url',array(
		'label'	=> __('Add Facebook link','expert-carpenter'),
		'section'	=> 'expert_carpenter_social',
		'setting'	=> 'expert_carpenter_facebook_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('expert_carpenter_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_carpenter_twitter_url',array(
		'label'	=> __('Add Twitter link','expert-carpenter'),
		'section'	=> 'expert_carpenter_social',
		'setting'	=> 'expert_carpenter_twitter_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('expert_carpenter_google_plus_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_carpenter_google_plus_url',array(
		'label'	=> __('Add Google Plus link','expert-carpenter'),
		'section'	=> 'expert_carpenter_social',
		'setting'	=> 'expert_carpenter_google_plus_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('expert_carpenter_instagram_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('expert_carpenter_instagram_url',array(
		'label'	=> __('Add Instagram link','expert-carpenter'),
		'section'	=> 'expert_carpenter_social',
		'setting'	=> 'expert_carpenter_instagram_url',
		'type'	=> 'url'
	));

	$wp_customize->add_setting('expert_carpenter_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('expert_carpenter_youtube_url',array(
		'label'	=> __('Add Youtube link','expert-carpenter'),
		'section'	=> 'expert_carpenter_social',
		'setting'	=> 'expert_carpenter_youtube_url',
		'type'	=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'expert_carpenter_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'expert-carpenter' ),
		'priority'   => null,
		'panel' => 'expert_carpenter_panel_id'
	) );

	$wp_customize->add_setting('expert_carpenter_slider_hide_show',array(
       	'default' => 'true',
       	'sanitize_callback'	=> 'expert_carpenter_sanitize_checkbox'
	));
	$wp_customize->add_control('expert_carpenter_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide slider','expert-carpenter'),
	   	'description' => __('Image Size ( 1400px x 800px )','expert-carpenter'),
	   	'section' => 'expert_carpenter_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'expert_carpenter_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'expert_carpenter_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'expert_carpenter_slider' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'expert-carpenter' ),
			'section'  => 'expert_carpenter_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	// Our Services 
	$wp_customize->add_section('expert_carpenter_services_section',array(
		'title'	=> __('Our Services','expert-carpenter'),
		'description'=> __('This section will appear below the Slider section.','expert-carpenter'),
		'panel' => 'expert_carpenter_panel_id',
	));
	
	$wp_customize->add_setting('expert_carpenter_services_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_carpenter_services_title',array(
		'label'	=> __('Section Title','expert-carpenter'),
		'section'	=> 'expert_carpenter_services_section',
		'setting'	=> 'expert_carpenter_services_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst4[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst4[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('expert_carpenter_services_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('expert_carpenter_services_cat',array(
		'type'    => 'select',
		'choices' => $cat_pst4,
		'label' => __('Select Category to display Team Posts','expert-carpenter'),
		'section' => 'expert_carpenter_services_section',
	));

	//Footer
    $wp_customize->add_section( 'expert_carpenter_footer', array(
    	'title'      => __( 'Footer Text', 'expert-carpenter' ),
		'priority'   => null,
		'panel' => 'expert_carpenter_panel_id'
	) );

    $wp_customize->add_setting('expert_carpenter_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('expert_carpenter_footer_copy',array(
		'label'	=> __('Footer Text','expert-carpenter'),
		'section'	=> 'expert_carpenter_footer',
		'setting'	=> 'expert_carpenter_footer_copy',
		'type'		=> 'text'
	));

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'expert_carpenter_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'expert_carpenter_customize_partial_blogdescription',
	) );

	//front page
	$num_sections = apply_filters( 'expert_carpenter_front_page_sections', 4 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting( 'panel_' . $i, array(
			'default'           => false,
			'sanitize_callback' => 'expert_carpenter_sanitize_dropdown_pages',
			'transport'         => 'postMessage',
		) );

		$wp_customize->add_control( 'panel_' . $i, array(
			/* translators: %d is the front page section number */
			'label'          => sprintf( __( 'Front Page Section %d Content', 'expert-carpenter' ), $i ),
			'description'    => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'expert-carpenter' ) ),
			'section'        => 'theme_options',
			'type'           => 'dropdown-pages',
			'allow_addition' => true,
			'active_callback' => 'expert_carpenter_is_static_front_page',
		) );

		$wp_customize->selective_refresh->add_partial( 'panel_' . $i, array(
			'selector'            => '#panel' . $i,
			'render_callback'     => 'expert_carpenter_front_page_section',
			'container_inclusive' => true,
		) );
	}
}
add_action( 'customize_register', 'expert_carpenter_customize_register' );

function expert_carpenter_customize_partial_blogname() {
	bloginfo( 'name' );
}

function expert_carpenter_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function expert_carpenter_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function expert_carpenter_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}