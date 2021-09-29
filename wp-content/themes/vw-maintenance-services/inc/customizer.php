<?php
/**
 * VW Maintenance Services Theme Customizer
 *
 * @package VW Maintenance Services
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_maintenance_services_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_maintenance_services_custom_controls' );

function vw_maintenance_services_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'vw_maintenance_services_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'vw_maintenance_services_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$VWMaintenanceServicesParentPanel = new VW_Maintenance_Services_WP_Customize_Panel( $wp_customize, 'vw_maintenance_services_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'VW Settings',
		'priority' => 10,
	));

	// Layout
	$wp_customize->add_section( 'vw_maintenance_services_left_right', array(
    	'title'      => __( 'General Settings', 'vw-maintenance-services' ),
		'panel' => 'vw_maintenance_services_panel_id'
	) );

	$wp_customize->add_setting('vw_maintenance_services_width_option',array(
        'default' => __('Full Width','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Maintenance_Services_Image_Radio_Control($wp_customize, 'vw_maintenance_services_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-maintenance-services'),
        'description' => __('Here you can change the width layout of Website.','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/assets/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/assets/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/assets/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_maintenance_services_theme_options',array(
        'default' => __('Right Sidebar','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_maintenance_services_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-maintenance-services'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-maintenance-services'),
            'Right Sidebar' => __('Right Sidebar','vw-maintenance-services'),
            'One Column' => __('One Column','vw-maintenance-services'),
            'Three Columns' => __('Three Columns','vw-maintenance-services'),
            'Four Columns' => __('Four Columns','vw-maintenance-services'),
            'Grid Layout' => __('Grid Layout','vw-maintenance-services')
        ),
	));

	$wp_customize->add_setting('vw_maintenance_services_page_layout',array(
        'default' => __('One Column','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_maintenance_services_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-maintenance-services'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-maintenance-services'),
            'Right Sidebar' => __('Right Sidebar','vw-maintenance-services'),
            'One Column' => __('One Column','vw-maintenance-services')
        ),
	) );

	//Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'vw_maintenance_services_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','vw-maintenance-services' ),
		'section' => 'vw_maintenance_services_left_right'
    )));

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'vw_maintenance_services_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','vw-maintenance-services' ),
		'section' => 'vw_maintenance_services_left_right'
    )));

	//Pre-Loader
	$wp_customize->add_setting( 'vw_maintenance_services_loader_enable',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_loader_enable',array(
        'label' => esc_html__( 'Pre-Loader','vw-maintenance-services' ),
        'section' => 'vw_maintenance_services_left_right'
    )));

	$wp_customize->add_setting('vw_maintenance_services_loader_icon',array(
        'default' => __('Two Way','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_maintenance_services_loader_icon',array(
        'type' => 'select',
        'label' => __('Pre-Loader Type','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_left_right',
        'choices' => array(
            'Two Way' => __('Two Way','vw-maintenance-services'),
            'Dots' => __('Dots','vw-maintenance-services'),
            'Rotate' => __('Rotate','vw-maintenance-services')
        ),
	) );

	//Topbar
	$wp_customize->add_section( 'vw_maintenance_services_topbar', array(
    	'title'      => __( 'Topbar Settings', 'vw-maintenance-services' ),
		'panel' => 'vw_maintenance_services_panel_id'
	) );

	//Sticky Header
	$wp_customize->add_setting( 'vw_maintenance_services_sticky_header',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_sticky_header',array(
        'label' => esc_html__( 'Sticky Header','vw-maintenance-services' ),
        'section' => 'vw_maintenance_services_topbar'
    )));

    $wp_customize->add_setting('vw_maintenance_services_sticky_header_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_sticky_header_padding',array(
		'label'	=> __('Sticky Header Padding','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_maintenance_services_search_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_search_hide_show',array(
      'label' => esc_html__( 'Show / Hide Search','vw-maintenance-services' ),
      'section' => 'vw_maintenance_services_topbar'
    )));

    $wp_customize->add_setting('vw_maintenance_services_search_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_search_font_size',array(
		'label'	=> __('Search Font Size','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_search_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_search_padding_top_bottom',array(
		'label'	=> __('Search Padding Top Bottom','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_search_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_search_padding_left_right',array(
		'label'	=> __('Search Padding Left Right','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_maintenance_services_search_border_radius', array(
		'default'              => "",
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_search_border_radius', array(
		'label'       => esc_html__( 'Search Border Radius','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_topbar',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_maintenance_services_header_call', array( 
		'selector' => 'p.call-no', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_header_call', 
	));

    $wp_customize->add_setting('vw_maintenance_services_phone_no_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_phone_no_icon',array(
		'label'	=> __('Add Phone Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_topbar',
		'setting'	=> 'vw_maintenance_services_phone_no_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_maintenance_services_header_call_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_header_call_text',array(
		'label'	=> __('Add Phone Text.','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Toll Free', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_header_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'vw_maintenance_services_sanitize_phone_number'
	));
	$wp_customize->add_control('vw_maintenance_services_header_call',array(
		'label'	=> __('Add Phone No.','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '+07 123 125 1234', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_top_btn_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_top_btn_text',array(
		'label'	=> __('Add Button Text','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'GET APPOINTMENT', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_top_btn_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('vw_maintenance_services_top_btn_url',array(
		'label'	=> __('Add Button URL','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'https://www.example.com', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_topbar',
		'type'=> 'url'
	));
    
	//Slider
	$wp_customize->add_section( 'vw_maintenance_services_slidersettings' , array(
    	'title'      => __( 'Slider Section', 'vw-maintenance-services' ),
		'panel' => 'vw_maintenance_services_panel_id'
	) );

	$wp_customize->add_setting( 'vw_maintenance_services_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','vw-maintenance-services' ),
      'section' => 'vw_maintenance_services_slidersettings'
    )));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('vw_maintenance_services_slider_hide_show',array(
		'selector'        => '#slider .inner_carousel h1',
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_slider_hide_show',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'vw_maintenance_services_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_maintenance_services_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_maintenance_services_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'vw-maintenance-services' ),
			'description' => __('Slider image size (1500 x 590)','vw-maintenance-services'),
			'section'  => 'vw_maintenance_services_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('vw_maintenance_services_slider_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'READ MORE', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_slider_bttn_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_slider_bttn_icon',array(
		'label'	=> __('Add Slider Button Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_slidersettings',
		'setting'	=> 'vw_maintenance_services_slider_bttn_icon',
		'type'		=> 'icon'
	)));

	//content layout
	$wp_customize->add_setting('vw_maintenance_services_slider_content_option',array(
        'default' => __('Left','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Maintenance_Services_Image_Radio_Control($wp_customize, 'vw_maintenance_services_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/assets/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/assets/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_maintenance_services_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_maintenance_services_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_maintenance_services_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_maintenance_services_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_maintenance_services_slider_opacity_color',
		'choices' => array(
	      '0' =>  esc_attr('0','vw-maintenance-services'),
	      '0.1' =>  esc_attr('0.1','vw-maintenance-services'),
	      '0.2' =>  esc_attr('0.2','vw-maintenance-services'),
	      '0.3' =>  esc_attr('0.3','vw-maintenance-services'),
	      '0.4' =>  esc_attr('0.4','vw-maintenance-services'),
	      '0.5' =>  esc_attr('0.5','vw-maintenance-services'),
	      '0.6' =>  esc_attr('0.6','vw-maintenance-services'),
	      '0.7' =>  esc_attr('0.7','vw-maintenance-services'),
	      '0.8' =>  esc_attr('0.8','vw-maintenance-services'),
	      '0.9' =>  esc_attr('0.9','vw-maintenance-services')
		),
	));

	//Slider height
	$wp_customize->add_setting('vw_maintenance_services_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_slider_height',array(
		'label'	=> __('Slider Height','vw-maintenance-services'),
		'description'	=> __('Specify the slider height (px).','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_slidersettings',
		'type'=> 'text'
	));

	//Services section
	$wp_customize->add_section( 'vw_maintenance_services_services_section' , array(
    	'title'      => __( 'Our Services Section', 'vw-maintenance-services' ),
		'priority'   => null,
		'panel' => 'vw_maintenance_services_panel_id'
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'vw_maintenance_services_section_title', array( 
		'selector' => '#services-section h2', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_section_title',
	));

	$wp_customize->add_setting('vw_maintenance_services_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_maintenance_services_section_title',array(
		'label'	=> __('Section Title','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Our Services', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_services_section',
		'type'=> 'text'
	));

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_maintenance_services_left_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_maintenance_services_sanitize_choices',
	));
	$wp_customize->add_control('vw_maintenance_services_left_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display left services','vw-maintenance-services'),
		'description' => __('Image Size (250 x 250)','vw-maintenance-services'),
		'section' => 'vw_maintenance_services_services_section',
	));

	$wp_customize->add_setting( 'vw_maintenance_services_about', array(
		'default'           => '',
		'sanitize_callback' => 'vw_maintenance_services_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_maintenance_services_about', array(
		'label'    => __( 'Select About us Page', 'vw-maintenance-services' ),
		'description' => __('Image size (350 x 500)','vw-maintenance-services'),
		'section'  => 'vw_maintenance_services_services_section',
		'type'     => 'dropdown-pages'
	) );

	$categories = get_categories();
	$cat_post = array();
	$cat_post[]= 'select';
	$i = 0;	
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('vw_maintenance_services_right_service',array(
		'default'	=> 'select',
		'sanitize_callback' => 'vw_maintenance_services_sanitize_choices',
	));
	$wp_customize->add_control('vw_maintenance_services_right_service',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => __('Select Category to display right services','vw-maintenance-services'),
		'description' => __('Image Size (250 x 250)','vw-maintenance-services'),
		'section' => 'vw_maintenance_services_services_section',
	));

	//Services excerpt
	$wp_customize->add_setting( 'vw_maintenance_services_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_services_excerpt_number', array(
		'label'       => esc_html__( 'Services Excerpt length','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_services_section',
		'type'        => 'range',
		'settings'    => 'vw_maintenance_services_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_panel( $VWMaintenanceServicesParentPanel );

	$BlogPostParentPanel = new VW_Maintenance_Services_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'vw-maintenance-services' ),
		'panel' => 'vw_maintenance_services_panel_id',
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'vw_maintenance_services_post_settings', array(
		'title' => __( 'Post Settings', 'vw-maintenance-services' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_maintenance_services_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_toggle_postdate', 
	));

	$wp_customize->add_setting( 'vw_maintenance_services_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-maintenance-services' ),
        'section' => 'vw_maintenance_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_toggle_author',array(
		'label' => esc_html__( 'Author','vw-maintenance-services' ),
		'section' => 'vw_maintenance_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-maintenance-services' ),
		'section' => 'vw_maintenance_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
	));
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_toggle_tags', array(
		'label' => esc_html__( 'Tags','vw-maintenance-services' ),
		'section' => 'vw_maintenance_services_post_settings'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_post_settings',
		'type'        => 'range',
		'settings'    => 'vw_maintenance_services_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog layout
    $wp_customize->add_setting('vw_maintenance_services_blog_layout_option',array(
        'default' => __('Default','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
    ));
    $wp_customize->add_control(new VW_Maintenance_Services_Image_Radio_Control($wp_customize, 'vw_maintenance_services_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_post_settings',
        'choices' => array(
            'Default' => get_template_directory_uri().'/assets/images/blog-layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/blog-layout2.png',
            'Left' => get_template_directory_uri().'/assets/images/blog-layout3.png',
    ))));

    $wp_customize->add_setting('vw_maintenance_services_excerpt_settings',array(
        'default' => __('Excerpt','vw-maintenance-services'),
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control('vw_maintenance_services_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_post_settings',
        'choices' => array(
        	'Content' => __('Content','vw-maintenance-services'),
            'Excerpt' => __('Excerpt','vw-maintenance-services'),
            'No Content' => __('No Content','vw-maintenance-services')
        ),
	) );

	$wp_customize->add_setting('vw_maintenance_services_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'vw_maintenance_services_button_settings', array(
		'title' => __( 'Button Settings', 'vw-maintenance-services' ),
		'panel' => 'blog_post_parent_panel',
	));

	$wp_customize->add_setting('vw_maintenance_services_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_maintenance_services_button_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_maintenance_services_button_text', array( 
		'selector' => '.post-main-box .content-bttn a', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_button_text', 
	));

	$wp_customize->add_setting('vw_maintenance_services_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_button_text',array(
		'label'	=> __('Add Button Text','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_blog_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_blog_button_icon',array(
		'label'	=> __('Add Button Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_button_settings',
		'setting'	=> 'vw_maintenance_services_blog_button_icon',
		'type'		=> 'icon'
	)));

	// Related Post Settings
	$wp_customize->add_section( 'vw_maintenance_services_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'vw-maintenance-services' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_maintenance_services_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_related_post_title', 
	));

    $wp_customize->add_setting( 'vw_maintenance_services_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_related_post',array(
		'label' => esc_html__( 'Related Post','vw-maintenance-services' ),
		'section' => 'vw_maintenance_services_related_posts_settings'
    )));

    $wp_customize->add_setting('vw_maintenance_services_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_related_post_title',array(
		'label'	=> __('Add Related Post Title','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Related Post', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('vw_maintenance_services_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_related_posts_count',array(
		'label'	=> __('Add Related Post Count','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '3', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_related_posts_settings',
		'type'=> 'number'
	));

    //404 Page Setting
	$wp_customize->add_section('vw_maintenance_services_404_page',array(
		'title'	=> __('404 Page Settings','vw-maintenance-services'),
		'panel' => 'vw_maintenance_services_panel_id',
	));	

	$wp_customize->add_setting('vw_maintenance_services_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_maintenance_services_404_page_title',array(
		'label'	=> __('Add Title','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('vw_maintenance_services_404_page_content',array(
		'label'	=> __('Add Text','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_404_page_button_text',array(
		'label'	=> __('Add Button Text','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Return to the home page', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_404_page_button_icon',array(
		'default'	=> 'fa fa-angle-right',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_404_page_button_icon',array(
		'label'	=> __('Add Button Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_404_page',
		'setting'	=> 'vw_maintenance_services_404_page_button_icon',
		'type'		=> 'icon'
	)));

	//Social Icon Setting
	$wp_customize->add_section('vw_maintenance_services_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','vw-maintenance-services'),
		'panel' => 'vw_maintenance_services_panel_id',
	));	

	$wp_customize->add_setting('vw_maintenance_services_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_social_icon_padding',array(
		'label'	=> __('Icon Padding','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_social_icon_width',array(
		'label'	=> __('Icon Width','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_social_icon_height',array(
		'label'	=> __('Icon Height','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_maintenance_services_social_icon_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('vw_maintenance_services_responsive_media',array(
		'title'	=> __('Responsive Media','vw-maintenance-services'),
		'panel' => 'vw_maintenance_services_panel_id',
	));

    $wp_customize->add_setting( 'vw_maintenance_services_stickyheader_hide_show',array(
      	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_stickyheader_hide_show',array(
        'label' => esc_html__( 'Sticky Header','vw-maintenance-services' ),
        'section' => 'vw_maintenance_services_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_resp_slider_hide_show',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_resp_slider_hide_show',array(
	    'label' => esc_html__( 'Show / Hide Slider','vw-maintenance-services' ),
	    'section' => 'vw_maintenance_services_responsive_media'
    )));

	$wp_customize->add_setting( 'vw_maintenance_services_metabox_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_metabox_hide_show',array(
        'label' => esc_html__( 'Show / Hide Metabox','vw-maintenance-services' ),
        'section' => 'vw_maintenance_services_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_sidebar_hide_show',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_sidebar_hide_show',array(
        'label' => esc_html__( 'Show / Hide Sidebar','vw-maintenance-services' ),
        'section' => 'vw_maintenance_services_responsive_media'
    )));

    $wp_customize->add_setting( 'vw_maintenance_services_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','vw-maintenance-services' ),
      'section' => 'vw_maintenance_services_responsive_media'
    )));

    $wp_customize->add_setting('vw_maintenance_services_res_menus_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_res_menus_open_icon',array(
		'label'	=> __('Add Open Menu Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_responsive_media',
		'setting'	=> 'vw_maintenance_services_res_menus_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_maintenance_services_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_responsive_media',
		'setting'	=> 'vw_maintenance_services_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	//Content Creation
	$wp_customize->add_section( 'vw_maintenance_services_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-maintenance-services' ),
		'priority' => null,
		'panel' => 'vw_maintenance_services_panel_id'
	) );

	$wp_customize->add_setting('vw_maintenance_services_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Maintenance_Services_Content_Creation( $wp_customize, 'vw_maintenance_services_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-maintenance-services' ),
		),
		'section' => 'vw_maintenance_services_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-maintenance-services' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_maintenance_services_footer',array(
		'title'	=> __('Footer','vw-maintenance-services'),
		'panel' => 'vw_maintenance_services_panel_id',
	));	

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_maintenance_services_footer_text', array( 
		'selector' => '#footer-2 .copyright p', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_footer_text', 
	));
	
	$wp_customize->add_setting('vw_maintenance_services_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_maintenance_services_footer_text',array(
		'label'	=> __('Copyright Text','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( 'Copyright 2019, .....', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_copyright_alingment',array(
        'default' => __('center','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Maintenance_Services_Image_Radio_Control($wp_customize, 'vw_maintenance_services_copyright_alingment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_footer',
        'settings' => 'vw_maintenance_services_copyright_alingment',
        'choices' => array(
            'left' => get_template_directory_uri().'/assets/images/copyright1.png',
            'center' => get_template_directory_uri().'/assets/images/copyright2.png',
            'right' => get_template_directory_uri().'/assets/images/copyright3.png'
    ))));

    $wp_customize->add_setting('vw_maintenance_services_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_maintenance_services_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_maintenance_services_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Maintenance_Services_Toggle_Switch_Custom_Control( $wp_customize, 'vw_maintenance_services_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-maintenance-services' ),
      	'section' => 'vw_maintenance_services_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('vw_maintenance_services_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'vw_maintenance_services_customize_partial_vw_maintenance_services_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('vw_maintenance_services_scroll_to_top_icon',array(
		'default'	=> 'fas fa-angle-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new VW_Maintenance_Services_Fontawesome_Icon_Chooser(
        $wp_customize,'vw_maintenance_services_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','vw-maintenance-services'),
		'transport' => 'refresh',
		'section'	=> 'vw_maintenance_services_footer',
		'setting'	=> 'vw_maintenance_services_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('vw_maintenance_services_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_scroll_to_top_width',array(
		'label'	=> __('Icon Width','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('vw_maintenance_services_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('vw_maintenance_services_scroll_to_top_height',array(
		'label'	=> __('Icon Height','vw-maintenance-services'),
		'description'	=> __('Enter a value in pixels. Example:20px','vw-maintenance-services'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'vw-maintenance-services' ),
        ),
		'section'=> 'vw_maintenance_services_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'vw_maintenance_services_scroll_to_top_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_maintenance_services_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','vw-maintenance-services' ),
		'section'     => 'vw_maintenance_services_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );	

	$wp_customize->add_setting('vw_maintenance_services_scroll_top_alignment',array(
        'default' => __('Right','vw-maintenance-services'),
        'sanitize_callback' => 'vw_maintenance_services_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Maintenance_Services_Image_Radio_Control($wp_customize, 'vw_maintenance_services_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-maintenance-services'),
        'section' => 'vw_maintenance_services_footer',
        'settings' => 'vw_maintenance_services_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/assets/images/layout1.png',
            'Center' => get_template_directory_uri().'/assets/images/layout2.png',
            'Right' => get_template_directory_uri().'/assets/images/layout3.png'
    ))));

    // Has to be at the top
	$wp_customize->register_panel_type( 'VW_Maintenance_Services_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'VW_Maintenance_Services_WP_Customize_Section' );
}

add_action( 'customize_register', 'vw_maintenance_services_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class VW_Maintenance_Services_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'vw_maintenance_services_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class VW_Maintenance_Services_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'vw_maintenance_services_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function vw_maintenance_services_customize_controls_scripts() {
  wp_enqueue_script( 'customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'vw_maintenance_services_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Maintenance_Services_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Maintenance_Services_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Maintenance_Services_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'VW Maintenance Pro', 'vw-maintenance-services' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-maintenance-services' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-maintenance-service-theme/'),
		)));

		// Register sections.
		$manager->add_section(new VW_Maintenance_Services_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Documentation', 'vw-maintenance-services' ),
			'pro_text' => esc_html__( 'Docs', 'vw-maintenance-services' ),
			'pro_url'  => admin_url('themes.php?page=vw_maintenance_services_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-maintenance-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-maintenance-services-customize-controls', trailingslashit( get_template_directory_uri() ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Maintenance_Services_Customize::get_instance();