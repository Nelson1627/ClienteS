<?php
/**
 * Appointment Booking Theme Customizer
 *
 * @package Appointment Booking
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function appointment_booking_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'appointment_booking_custom_controls' );

function appointment_booking_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo .site-title a',
	 	'render_callback' => 'appointment_booking_customize_partial_blogname',
	));

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => 'p.site-description',
		'render_callback' => 'appointment_booking_customize_partial_blogdescription',
	));

	//add home page setting pannel
	$appointment_booking_parent_panel = new Appointment_Booking_WP_Customize_Panel( $wp_customize, 'appointment_booking_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'appointment-booking' ),
		'priority' => 10,
	));

	//Top Header
	$wp_customize->add_section( 'appointment_booking_top_header' , array(
    	'title' => esc_html__( 'Top Header', 'appointment-booking' ),
		'panel' => 'appointment_booking_panel_id'
	) );

   	// Header Background color
	$wp_customize->add_setting('appointment_booking_header_background_color', array(
		'default'           => '#3b82ea',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_header_background_color', array(
		'label'    => __('Header Background Color', 'appointment-booking'),
		'section'  => 'header_image',
	)));

	$wp_customize->add_setting('appointment_booking_header_img_position',array(
	  'default' => 'center top',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_header_img_position',array(
		'type' => 'select',
		'label' => __('Header Image Position','appointment-booking'),
		'section' => 'header_image',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'appointment-booking' ),
			'center top'   => esc_html__( 'Top', 'appointment-booking' ),
			'right top'   => esc_html__( 'Top Right', 'appointment-booking' ),
			'left center'   => esc_html__( 'Left', 'appointment-booking' ),
			'center center'   => esc_html__( 'Center', 'appointment-booking' ),
			'right center'   => esc_html__( 'Right', 'appointment-booking' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'appointment-booking' ),
			'center bottom'   => esc_html__( 'Bottom', 'appointment-booking' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'appointment-booking' ),
		),
	));

	$wp_customize->add_setting('appointment_booking_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('appointment_booking_email_address',array(
		'label'	=> esc_html__('Email Address','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'support@email.com', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_top_header',
		'type'=> 'text'
	));

    $wp_customize->add_setting('appointment_booking_email_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new appointment_booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_email_icon',array(
		'label'	=> __('Add Email Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_top_header',
		'setting'	=> 'appointment_booking_email_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('appointment_booking_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'appointment_booking_sanitize_phone_number'
	));
	$wp_customize->add_control('appointment_booking_phone_number',array(
		'label'	=> esc_html__('Phone Number','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '+00 123 456 7890', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_top_header',
		'type'=> 'text'
	));

    $wp_customize->add_setting('appointment_booking_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new appointment_booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_phone_icon',array(
		'label'	=> __('Add Phone Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_top_header',
		'setting'	=> 'appointment_booking_phone_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'appointment_booking_search_hide_show',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_search_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Search','appointment-booking' ),
      	'section' => 'appointment_booking_top_header'
    )));

    $wp_customize->add_setting('appointment_booking_search_icon',array(
		'default'	=> 'fas fa-search',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new appointment_booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_search_icon',array(
		'label'	=> __('Add Search Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_top_header',
		'setting'	=> 'appointment_booking_search_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('appointment_booking_search_close_icon',array(
		'default'	=> 'fa fa-window-close',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new appointment_booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_search_close_icon',array(
		'label'	=> __('Add Search Close Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_top_header',
		'setting'	=> 'appointment_booking_search_close_icon',
		'type'		=> 'icon'
	)));

	//Menus Settings
	$wp_customize->add_section( 'appointment_booking_menu_section' , array(
    	'title' => __( 'Menus Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_panel_id'
	) );

	$wp_customize->add_setting('appointment_booking_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_navigation_menu_font_weight',array(
        'default' => 600,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','appointment-booking'),
        'section' => 'appointment_booking_menu_section',
        'choices' => array(
        	'100' => __('100','appointment-booking'),
            '200' => __('200','appointment-booking'),
            '300' => __('300','appointment-booking'),
            '400' => __('400','appointment-booking'),
            '500' => __('500','appointment-booking'),
            '600' => __('600','appointment-booking'),
            '700' => __('700','appointment-booking'),
            '800' => __('800','appointment-booking'),
            '900' => __('900','appointment-booking'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('appointment_booking_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','appointment-booking'),
		'choices' => array(
            'Uppercase' => __('Uppercase','appointment-booking'),
            'Capitalize' => __('Capitalize','appointment-booking'),
            'Lowercase' => __('Lowercase','appointment-booking'),
        ),
		'section'=> 'appointment_booking_menu_section',
	));

	$wp_customize->add_setting('appointment_booking_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_menus_item_style',array(
        'type' => 'select',
        'section' => 'appointment_booking_menu_section',
		'label' => __('Menus Item Hover Style','appointment-booking'),
		'choices' => array(
            'None' => __('None','appointment-booking'),
            'Zoom In' => __('Zoom In','appointment-booking'),
        ),
	) );

	$wp_customize->add_setting('appointment_booking_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_header_menus_color', array(
		'label'    => __('Menus Color', 'appointment-booking'),
		'section'  => 'appointment_booking_menu_section',
	)));

	$wp_customize->add_setting('appointment_booking_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'appointment-booking'),
		'section'  => 'appointment_booking_menu_section',
	)));

	$wp_customize->add_setting('appointment_booking_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'appointment-booking'),
		'section'  => 'appointment_booking_menu_section',
	)));

	$wp_customize->add_setting('appointment_booking_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'appointment-booking'),
		'section'  => 'appointment_booking_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'appointment_booking_social_links', array(
			'title'		=>	__('Social Links', 'appointment-booking'),
			'priority'	=>	null,
			'panel'		=>	'appointment_booking_panel_id'
	));

	$wp_customize->add_setting('appointment_booking_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_social_icons',array(
		'label' =>  __('Steps to setup social icons','appointment-booking'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Media.</p>
			<p>3. Add social icons url and save.</p>','appointment-booking'),
		'section'=> 'appointment_booking_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('appointment_booking_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'appointment_booking_social_links',
		'type'=> 'hidden'
	));

	//Slider
	$wp_customize->add_section( 'appointment_booking_slidersettings' , array(
    	'title' => esc_html__( 'Slider Settings', 'appointment-booking' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/appointment-wordpress-theme">GET PRO</a>','appointment-booking'),
		'panel' => 'appointment_booking_panel_id'
	) );

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('appointment_booking_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_slider_arrows',
	));

	$wp_customize->add_setting( 'appointment_booking_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','appointment-booking' ),
      	'section' => 'appointment_booking_slidersettings'
    )));

    $wp_customize->add_setting('appointment_booking_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	) );
	$wp_customize->add_control('appointment_booking_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','appointment-booking'),
        'section' => 'appointment_booking_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','appointment-booking'),
            'Advance slider' => __('Advance slider','appointment-booking'),
        ),
	));

	$wp_customize->add_setting('appointment_booking_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','appointment-booking'),
		'section'=> 'appointment_booking_slidersettings',
		'type'=> 'text',
		'active_callback' => 'appointment_booking_advance_slider'
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'appointment_booking_slider_page' . $count, array(
			'default'  => '',
			'sanitize_callback' => 'appointment_booking_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'appointment_booking_slider_page' . $count, array(
			'label'    => esc_html__( 'Select Slider Page', 'appointment-booking' ),
			'description' => esc_html__('Slider image size (500 x 500)','appointment-booking'),
			'section'  => 'appointment_booking_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'appointment_booking_default_slider'
		) );
	}

	$wp_customize->add_setting('appointment_booking_topbar_btn_text',array(
		'default'=> 'VIEW DETAILS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_topbar_btn_text',array(
		'label'	=> esc_html__('Add Button Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'VIEW DETAILS', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_slidersettings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_topbar_btn_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('appointment_booking_topbar_btn_link',array(
		'label'	=> esc_html__('Add Button Link','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'www.example-info.com', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_slidersettings',
		'type'=> 'url'
	));

	//content layout
	$wp_customize->add_setting('appointment_booking_slider_content_option',array(
        'default' => 'Left',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control(new Appointment_Booking_Image_Radio_Control($wp_customize, 'appointment_booking_slider_content_option', array(
        'type' => 'select',
        'label' => esc_html__('Slider Content Layouts','appointment-booking'),
        'section' => 'appointment_booking_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),'active_callback' => 'appointment_booking_default_slider'
    )));

    //Slider content padding
    $wp_customize->add_setting('appointment_booking_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','appointment-booking'),
		'description'	=> __('Enter a value in %. Example:20%','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_slidersettings',
		'type'=> 'text',
		'active_callback' => 'appointment_booking_default_slider'
	));

	$wp_customize->add_setting('appointment_booking_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','appointment-booking'),
		'description'	=> __('Enter a value in %. Example:20%','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '50%', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_slidersettings',
		'type'=> 'text',
		'active_callback' => 'appointment_booking_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'appointment_booking_slider_excerpt_number', array(
		'default'              => 25,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appointment_booking_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','appointment-booking' ),
		'section'     => 'appointment_booking_slidersettings',
		'type'        => 'range',
		'settings'    => 'appointment_booking_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'appointment_booking_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('appointment_booking_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_slider_height',array(
		'label'	=> __('Slider Height','appointment-booking'),
		'description'	=> __('Specify the slider height (px).','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '500px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_slidersettings',
		'type'=> 'text',
		'active_callback' => 'appointment_booking_default_slider'
	));

	$wp_customize->add_setting( 'appointment_booking_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'appointment_booking_sanitize_float'
	) );
	$wp_customize->add_control( 'appointment_booking_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','appointment-booking'),
		'section' => 'appointment_booking_slidersettings',
		'type'  => 'number',
		'active_callback' => 'appointment_booking_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('appointment_booking_slider_opacity_color',array(
      'default'              => 0.5,
      'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));

	$wp_customize->add_control( 'appointment_booking_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','appointment-booking' ),
	'section'     => 'appointment_booking_slidersettings',
	'type'        => 'select',
	'settings'    => 'appointment_booking_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','appointment-booking'),
      '0.1' =>  esc_attr('0.1','appointment-booking'),
      '0.2' =>  esc_attr('0.2','appointment-booking'),
      '0.3' =>  esc_attr('0.3','appointment-booking'),
      '0.4' =>  esc_attr('0.4','appointment-booking'),
      '0.5' =>  esc_attr('0.5','appointment-booking'),
      '0.6' =>  esc_attr('0.6','appointment-booking'),
      '0.7' =>  esc_attr('0.7','appointment-booking'),
      '0.8' =>  esc_attr('0.8','appointment-booking'),
      '0.9' =>  esc_attr('0.9','appointment-booking')
	),'active_callback' => 'appointment_booking_default_slider'
	));

	$wp_customize->add_setting( 'appointment_booking_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'appointment_booking_switch_sanitization'
   ));
   $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_slider_image_overlay',array(
      	'label' => esc_html__( 'Slider Image Overlay','appointment-booking' ),
      	'section' => 'appointment_booking_slidersettings',
      	'active_callback' => 'appointment_booking_default_slider'
   )));

   $wp_customize->add_setting('appointment_booking_slider_image_overlay_color', array(
		'default'           => '#e6e8ec',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'appointment-booking'),
		'section'  => 'appointment_booking_slidersettings',
		'active_callback' => 'appointment_booking_default_slider'
	)));

	//features Section
	$wp_customize->add_section('appointment_booking_features', array(
		'title'       => __('Features Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_features_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_features_text',array(
		'description' => __('<p>1. More options for features section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for features section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_features',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_features_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_features_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_features',
		'type'=> 'hidden'
	));

	//about us Section
	$wp_customize->add_section('appointment_booking_about_us', array(
		'title'       => __('About Us Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_about_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_about_us_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_about_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_about_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_about_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_about_us',
		'type'=> 'hidden'
	));

	//appointment Section
	$wp_customize->add_section('appointment_booking_appointment', array(
		'title'       => __('Appointment Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_appointment_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_appointment_text',array(
		'description' => __('<p>1. More options for appointment section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for appointment section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_appointment',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_appointment_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_appointment_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_appointment',
		'type'=> 'hidden'
	));

	//Services
	$wp_customize->add_section('appointment_booking_services',array(
		'title'	=> __('Services Section','appointment-booking'),
		'description' => __('For more options of services section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/appointment-wordpress-theme">GET PRO</a>','appointment-booking'),
		'panel' => 'appointment_booking_panel_id',
	));

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('appointment_booking_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'appointment_booking_sanitize_choices',
	));
	$wp_customize->add_control('appointment_booking_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Latest Post','appointment-booking'),
		'section' => 'appointment_booking_services',
	));

	//About us
	$wp_customize->add_section('appointment_booking_about',array(
		'title'	=> __('About Section','appointment-booking'),
		'description' => __('For more options of about section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/appointment-wordpress-theme">GET PRO</a>','appointment-booking'),
		'panel' => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_section_text',array(
		'label'	=> __('Section Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'SERVICES','appointment-booking' ),
        ),
		'section'=> 'appointment_booking_about',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_section_title',array(
		'label'	=> __('Section Title','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'Lorem ipsum dolor sit amet,','appointment-booking' ),
        ),
		'section'=> 'appointment_booking_about',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'appointment_booking_about_section', array(
		'default'  => '',
		'sanitize_callback' => 'appointment_booking_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'appointment_booking_about_section', array(
		'label'    => esc_html__( 'Select About Page', 'appointment-booking' ),
		'section'  => 'appointment_booking_about',
		'type'     => 'dropdown-pages'
	) );

 	//About excerpt
	$wp_customize->add_setting( 'appointment_booking_about_excerpt_number', array(
		'default'              => 40,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appointment_booking_about_excerpt_number', array(
		'label'       => esc_html__( 'About Excerpt Length','appointment-booking' ),
		'section'     => 'appointment_booking_about',
		'type'        => 'range',
		'settings'    => 'appointment_booking_about_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Gallery Section
	$wp_customize->add_section('appointment_booking_gellery', array(
		'title'       => __('Gallery Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_gellery_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_gellery_text',array(
		'description' => __('<p>1. More options for gallery section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for gallery section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_gellery',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_gellery_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_gellery_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_gellery',
		'type'=> 'hidden'
	));

	//Team Section
	$wp_customize->add_section('appointment_booking_team', array(
		'title'       => __('Team Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_team_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_team_text',array(
		'description' => __('<p>1. More options for Team section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for Team section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_team',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_team_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_team_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_team',
		'type'=> 'hidden'
	));

	//Video Section
	$wp_customize->add_section('appointment_booking_video', array(
		'title'       => __('Video Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_video_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_video_text',array(
		'description' => __('<p>1. More options for video section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for video section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_video',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_video_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_video_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_video',
		'type'=> 'hidden'
	));

	//Records Section
	$wp_customize->add_section('appointment_booking_records', array(
		'title'       => __('Records Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_records_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_records_text',array(
		'description' => __('<p>1. More options for records section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for records section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_records',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_records_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_records_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_records',
		'type'=> 'hidden'
	));

	//Choose Us Section
	$wp_customize->add_section('appointment_booking_choose_us', array(
		'title'       => __('Choose Us Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_choose_us_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_choose_us_text',array(
		'description' => __('<p>1. More options for choose us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for choose us section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_choose_us',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_choose_us_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_choose_us_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_choose_us',
		'type'=> 'hidden'
	));

	//Testimonial Section
	$wp_customize->add_section('appointment_booking_testimonial', array(
		'title'       => __('Testimonial Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_testimonial_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_testimonial_text',array(
		'description' => __('<p>1. More options for testimonial section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonial section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_testimonial',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_testimonial_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_testimonial_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_testimonial',
		'type'=> 'hidden'
	));

	//Blogs Section
	$wp_customize->add_section('appointment_booking_blogs', array(
		'title'       => __('Blogs Section', 'appointment-booking'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','appointment-booking'),
		'priority'    => null,
		'panel'       => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting('appointment_booking_blogs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_blogs_text',array(
		'description' => __('<p>1. More options for blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blogs section.</p>','appointment-booking'),
		'section'=> 'appointment_booking_blogs',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('appointment_booking_blogs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_blogs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=appointment_booking_guide') ." '>More Info</a>",
		'section'=> 'appointment_booking_blogs',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('appointment_booking_footer',array(
		'title'	=> esc_html__('Footer Settings','appointment-booking'),
		'description' => __('For more options of footer section </br> <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/products/appointment-wordpress-theme">GET PRO</a>','appointment-booking'),
		'panel' => 'appointment_booking_panel_id',
	));

	$wp_customize->add_setting( 'appointment_booking_footer_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_footer_hide_show',array(
		'label' => esc_html__( 'Show / Hide Footer','appointment-booking' ),
		'section' => 'appointment_booking_footer'
    )));

 	// font size
	$wp_customize->add_setting('appointment_booking_button_footer_font_size',array(
		'default'=> 25,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_footer_font_size',array(
		'label'	=> __('Footer Heading Font Size','appointment-booking'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'appointment_booking_footer',
	));

	$wp_customize->add_setting('appointment_booking_button_footer_heading_letter_spacing',array(
		'default'=> 1,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_footer_heading_letter_spacing',array(
		'label'	=> __('Heading Letter Spacing','appointment-booking'),
  		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
	),
		'section'=> 'appointment_booking_footer',
	));

	// text trasform
	$wp_customize->add_setting('appointment_booking_button_footer_text_transform',array(
		'default'=> 'Capitalize',
		'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_button_footer_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Heading Text Transform','appointment-booking'),
		'choices' => array(
      'Uppercase' => __('Uppercase','appointment-booking'),
      'Capitalize' => __('Capitalize','appointment-booking'),
      'Lowercase' => __('Lowercase','appointment-booking'),
    ),
		'section'=> 'appointment_booking_footer',
	));

	$wp_customize->add_setting('appointment_booking_footer_heading_weight',array(
        'default' => 800,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_footer_heading_weight',array(
        'type' => 'select',
        'label' => __('Heading Font Weight','appointment-booking'),
        'section' => 'appointment_booking_footer',
        'choices' => array(
        	'100' => __('100','appointment-booking'),
            '200' => __('200','appointment-booking'),
            '300' => __('300','appointment-booking'),
            '400' => __('400','appointment-booking'),
            '500' => __('500','appointment-booking'),
            '600' => __('600','appointment-booking'),
            '700' => __('700','appointment-booking'),
            '800' => __('800','appointment-booking'),
            '900' => __('900','appointment-booking'),
        ),
	) );

    $wp_customize->add_setting('appointment_booking_footer_template',array(
		'default'	=> esc_html('appointment_booking-footer-one'),
		'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
    ));
    $wp_customize->add_control('appointment_booking_footer_template',array(
		'label'	=> esc_html__('Footer style','appointment-booking'),
		'section'	=> 'appointment_booking_footer',
		'setting'	=> 'appointment_booking_footer_template',
		'type' => 'select',
		'choices' => array(
			'appointment_booking-footer-one' => esc_html__('Style 1', 'appointment-booking'),
			'appointment_booking-footer-two' => esc_html__('Style 2', 'appointment-booking'),
			'appointment_booking-footer-three' => esc_html__('Style 3', 'appointment-booking'),
			'appointment_booking-footer-four' => esc_html__('Style 4', 'appointment-booking'),
			'appointment_booking-footer-five' => esc_html__('Style 5', 'appointment-booking'),
		)
    ));

	$wp_customize->add_setting('appointment_booking_footer_background_color', array(
		'default'           => '#252525',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_footer_background_color', array(
		'label'    => __('Footer Background Color', 'appointment-booking'),
		'section'  => 'appointment_booking_footer',
	)));

	$wp_customize->add_setting('appointment_booking_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'appointment_booking_footer_background_image',array(
        'label' => __('Footer Background Image','appointment-booking'),
        'section' => 'appointment_booking_footer'
	)));

	$wp_customize->add_setting('appointment_booking_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','appointment-booking'),
		'section' => 'appointment_booking_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'appointment-booking' ),
			'center top'   => esc_html__( 'Top', 'appointment-booking' ),
			'right top'   => esc_html__( 'Top Right', 'appointment-booking' ),
			'left center'   => esc_html__( 'Left', 'appointment-booking' ),
			'center center'   => esc_html__( 'Center', 'appointment-booking' ),
			'right center'   => esc_html__( 'Right', 'appointment-booking' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'appointment-booking' ),
			'center bottom'   => esc_html__( 'Bottom', 'appointment-booking' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'appointment-booking' ),
		),
	));

	// Footer
	$wp_customize->add_setting('appointment_booking_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','appointment-booking'),
		'choices' => array(
            'fixed' => __('fixed','appointment-booking'),
            'scroll' => __('scroll','appointment-booking'),
        ),
		'section'=> 'appointment_booking_footer',
	));

	$wp_customize->add_setting('appointment_booking_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','appointment-booking'),
        'section' => 'appointment_booking_footer',
        'choices' => array(
        	'Left' => __('Left','appointment-booking'),
            'Center' => __('Center','appointment-booking'),
            'Right' => __('Right','appointment-booking')
        ),
	) );

	$wp_customize->add_setting('appointment_booking_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','appointment-booking'),
        'section' => 'appointment_booking_footer',
        'choices' => array(
        	'Left' => __('Left','appointment-booking'),
            'Center' => __('Center','appointment-booking'),
            'Right' => __('Right','appointment-booking')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('appointment_booking_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
      'placeholder' => __( '10px', 'appointment-booking' ),
    ),
		'section'=> 'appointment_booking_footer',
		'type'=> 'text'
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('appointment_booking_footer_text', array(
		'selector' => '.copyright p',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_footer_text',
	));

	$wp_customize->add_setting( 'appointment_booking_copyright_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_copyright_hide_show',array(
      'label' => esc_html__( 'Show / Hide Copyright','appointment-booking' ),
      'section' => 'appointment_booking_footer'
    )));

	$wp_customize->add_setting('appointment_booking_copyright_background_color', array(
		'default'           => '#3b82ea',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'appointment-booking'),
		'section'  => 'appointment_booking_footer',
	)));

	$wp_customize->add_setting('appointment_booking_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_footer_text',array(
		'label'	=> esc_html__('Copyright Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Copyright 2020, .....', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_copyright_alingment',array(
        'default' => 'center',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control(new Appointment_Booking_Image_Radio_Control($wp_customize, 'appointment_booking_copyright_alingment', array(
        'type' => 'select',
        'label' => esc_html__('Copyright Alignment','appointment-booking'),
        'section' => 'appointment_booking_footer',
        'settings' => 'appointment_booking_copyright_alingment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'appointment_booking_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','appointment-booking' ),
      	'section' => 'appointment_booking_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('appointment_booking_scroll_to_top_icon', array(
		'selector' => '.scrollup i',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_scroll_to_top_icon',
	));

    $wp_customize->add_setting('appointment_booking_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_footer',
		'setting'	=> 'appointment_booking_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('appointment_booking_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_scroll_to_top_width',array(
		'label'	=> __('Icon Width','appointment-booking'),
		'description'	=> __('Enter a value in pixels Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_scroll_to_top_height',array(
		'label'	=> __('Icon Height','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'appointment_booking_scroll_to_top_border_radius', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range'
	) );
	$wp_customize->add_control( 'appointment_booking_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','appointment-booking' ),
		'section'     => 'appointment_booking_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('appointment_booking_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control(new Appointment_Booking_Image_Radio_Control($wp_customize, 'appointment_booking_scroll_top_alignment', array(
        'type' => 'select',
        'label' => esc_html__('Scroll To Top','appointment-booking'),
        'section' => 'appointment_booking_footer',
        'settings' => 'appointment_booking_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( $appointment_booking_parent_panel );

	$BlogPostParentPanel = new Appointment_Booking_WP_Customize_Panel( $wp_customize, 'appointment_booking_blog_post_parent_panel', array(
		'title' => esc_html__( 'Blog Post Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'appointment_booking_post_settings', array(
		'title' => esc_html__( 'Post Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('appointment_booking_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
    ));
    $wp_customize->add_control(new Appointment_Booking_Image_Radio_Control($wp_customize, 'appointment_booking_blog_layout_option', array(
        'type' => 'select',
        'label' => esc_html__('Blog Post Layouts','appointment-booking'),
        'section' => 'appointment_booking_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	$wp_customize->add_setting('appointment_booking_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_theme_options',array(
        'type' => 'select',
        'label' => esc_html__('Post Sidebar Layout','appointment-booking'),
        'description' => esc_html__('Here you can change the sidebar layout for posts. ','appointment-booking'),
        'section' => 'appointment_booking_post_settings',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','appointment-booking'),
            'Right Sidebar' => esc_html__('Right Sidebar','appointment-booking'),
            'One Column' => esc_html__('One Column','appointment-booking'),
            'Three Columns' => esc_html__('Three Columns','appointment-booking'),
            'Four Columns' => esc_html__('Four Columns','appointment-booking'),
            'Grid Layout' => esc_html__('Grid Layout','appointment-booking')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('appointment_booking_toggle_postdate', array(
		'selector' => '.post-main-box h2 a',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_toggle_postdate',
	));

  	$wp_customize->add_setting('appointment_booking_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_post_settings',
		'setting'	=> 'appointment_booking_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'appointment_booking_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','appointment-booking' ),
        'section' => 'appointment_booking_post_settings'
    )));

	$wp_customize->add_setting('appointment_booking_toggle_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_post_settings',
		'setting'	=> 'appointment_booking_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'appointment_booking_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','appointment-booking' ),
		'section' => 'appointment_booking_post_settings'
    )));

    $wp_customize->add_setting('appointment_booking_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_post_settings',
		'setting'	=> 'appointment_booking_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'appointment_booking_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','appointment-booking' ),
		'section' => 'appointment_booking_post_settings'
    )));

  	$wp_customize->add_setting('appointment_booking_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_post_settings',
		'setting'	=> 'appointment_booking_toggle_time_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'appointment_booking_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','appointment-booking' ),
		'section' => 'appointment_booking_post_settings'
    )));

    $wp_customize->add_setting( 'appointment_booking_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
	));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','appointment-booking' ),
		'section' => 'appointment_booking_post_settings'
    )));

    //Featured Image
	$wp_customize->add_setting( 'appointment_booking_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range'
	) );
	$wp_customize->add_control( 'appointment_booking_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','appointment-booking' ),
		'section'     => 'appointment_booking_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'appointment_booking_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range'
	) );
	$wp_customize->add_control( 'appointment_booking_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','appointment-booking' ),
		'section'     => 'appointment_booking_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Featured Image
	$wp_customize->add_setting('appointment_booking_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
	));
  	$wp_customize->add_control('appointment_booking_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','appointment-booking'),
		'section'	=> 'appointment_booking_post_settings',
		'choices' => array(
		'default' => __('Default','appointment-booking'),
		'custom' => __('Custom Image Size','appointment-booking'),
      ),
  	));

	$wp_customize->add_setting('appointment_booking_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('appointment_booking_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'appointment-booking' ),),
		'section'=> 'appointment_booking_post_settings',
		'type'=> 'text',
		'active_callback' => 'appointment_booking_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('appointment_booking_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'appointment-booking' ),),
		'section'=> 'appointment_booking_post_settings',
		'type'=> 'text',
		'active_callback' => 'appointment_booking_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'appointment_booking_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appointment_booking_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','appointment-booking' ),
		'section'     => 'appointment_booking_post_settings',
		'type'        => 'range',
		'settings'    => 'appointment_booking_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('appointment_booking_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','appointment-booking'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','appointment-booking'),
		'section'=> 'appointment_booking_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('appointment_booking_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Post Content','appointment-booking'),
        'section' => 'appointment_booking_post_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','appointment-booking'),
            'Excerpt' => esc_html__('Excerpt','appointment-booking'),
            'No Content' => esc_html__('No Content','appointment-booking')
        ),
	) );

    $wp_customize->add_setting('appointment_booking_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog posts','appointment-booking'),
        'section' => 'appointment_booking_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','appointment-booking'),
            'Without Blocks' => __('Without Blocks','appointment-booking')
        ),
	) );

	$wp_customize->add_setting('appointment_booking_blog_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_blog_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'appointment_booking_blog_pagination_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_blog_pagination_hide_show',array(
		'label' => esc_html__( 'Show / Hide Blog Pagination','appointment-booking' ),
		'section' => 'appointment_booking_post_settings'
    )));

	$wp_customize->add_setting( 'appointment_booking_blog_pagination_type', array(
        'default'			=> 'blog-page-numbers',
        'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
    ));
    $wp_customize->add_control( 'appointment_booking_blog_pagination_type', array(
        'section' => 'appointment_booking_post_settings',
        'type' => 'select',
        'label' => __( 'Blog Pagination', 'appointment-booking' ),
        'choices'		=> array(
            'blog-page-numbers'  => __( 'Numeric', 'appointment-booking' ),
            'next-prev' => __( 'Older Posts/Newer Posts', 'appointment-booking' ),
    )));

    // Button Settings
	$wp_customize->add_section( 'appointment_booking_button_settings', array(
		'title' => esc_html__( 'Button Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('appointment_booking_button_text', array(
		'selector' => '.post-main-box .more-btn a',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_button_text',
	));

    $wp_customize->add_setting('appointment_booking_button_text',array(
		'default'=> esc_html__('Read More','appointment-booking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_text',array(
		'label'	=> esc_html__('Add Button Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('appointment_booking_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_font_size',array(
		'label'	=> __('Button Font Size','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'appointment-booking' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'appointment_booking_button_settings',
	));

	$wp_customize->add_setting( 'appointment_booking_button_border_radius', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'appointment_booking_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','appointment-booking' ),
		'section'     => 'appointment_booking_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('appointment_booking_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_padding_top_bottom',array(
		'label'	=> esc_html__('Padding Top Bottom','appointment-booking'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'appointment-booking' ),
        ),
		'section' => 'appointment_booking_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('appointment_booking_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_padding_left_right',array(
		'label'	=> esc_html__('Padding Left Right','appointment-booking'),
		'description' => esc_html__('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '10px', 'appointment-booking' ),
        ),
		'section' => 'appointment_booking_button_settings',
		'type' => 'text'
	));

	$wp_customize->add_setting('appointment_booking_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'appointment-booking' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'appointment_booking_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('appointment_booking_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','appointment-booking'),
		'choices' => array(
            'Uppercase' => __('Uppercase','appointment-booking'),
            'Capitalize' => __('Capitalize','appointment-booking'),
            'Lowercase' => __('Lowercase','appointment-booking'),
        ),
		'section'=> 'appointment_booking_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'appointment_booking_related_posts_settings', array(
		'title' => esc_html__( 'Related Posts Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('appointment_booking_related_post_title', array(
		'selector' => '.related-post h3',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_related_post_title',
	));

    $wp_customize->add_setting( 'appointment_booking_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','appointment-booking' ),
		'section' => 'appointment_booking_related_posts_settings'
    )));

    $wp_customize->add_setting('appointment_booking_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_related_post_title',array(
		'label'	=> esc_html__('Add Related Post Title','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Related Post', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('appointment_booking_related_posts_count',array(
		'default'=> 3,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_related_posts_count',array(
		'label'	=> esc_html__('Add Related Post Count','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( '3', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'appointment_booking_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'appointment_booking_sanitize_number_range'
	) );
	$wp_customize->add_control( 'appointment_booking_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','appointment-booking' ),
		'section'     => 'appointment_booking_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'appointment_booking_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );


	// Single Posts Settings
	$wp_customize->add_section( 'appointment_booking_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('appointment_booking_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_single_blog_settings',
		'setting'	=> 'appointment_booking_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'appointment_booking_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'appointment_booking_switch_sanitization'
	) );
	$wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','appointment-booking' ),
	   'section' => 'appointment_booking_single_blog_settings'
	)));

	$wp_customize->add_setting('appointment_booking_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_single_author_icon',array(
		'label'	=> __('Add Author Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_single_blog_settings',
		'setting'	=> 'appointment_booking_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'appointment_booking_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'appointment_booking_switch_sanitization'
	) );
	$wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','appointment-booking' ),
	    'section' => 'appointment_booking_single_blog_settings'
	)));

   	$wp_customize->add_setting('appointment_booking_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_single_blog_settings',
		'setting'	=> 'appointment_booking_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'appointment_booking_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'appointment_booking_switch_sanitization'
	) );
	$wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','appointment-booking' ),
	    'section' => 'appointment_booking_single_blog_settings'
	)));

  	$wp_customize->add_setting('appointment_booking_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_single_time_icon',array(
		'label'	=> __('Add Time Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_single_blog_settings',
		'setting'	=> 'appointment_booking_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'appointment_booking_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'appointment_booking_switch_sanitization'
	) );
	$wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','appointment-booking' ),
	    'section' => 'appointment_booking_single_blog_settings'
	)));

	$wp_customize->add_setting( 'appointment_booking_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Post Breadcrumb','appointment-booking' ),
		'section' => 'appointment_booking_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'appointment_booking_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Post Category','appointment-booking' ),
		'section' => 'appointment_booking_single_blog_settings'
    )));

	$wp_customize->add_setting( 'appointment_booking_toggle_tags',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
	));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','appointment-booking' ),
		'section' => 'appointment_booking_single_blog_settings'
    )));

	$wp_customize->add_setting( 'appointment_booking_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
	));
	$wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_blog_post_navigation_show_hide', array(
		  'label' => esc_html__( 'Show / Hide Post Navigation','appointment-booking' ),
		  'section' => 'appointment_booking_single_blog_settings'
	)));

	//navigation text
	$wp_customize->add_setting('appointment_booking_single_blog_prev_navigation_text',array(
		'default'=> 'PREVIOUS',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_single_blog_prev_navigation_text',array(
		'label'	=> __('Post Navigation Text','appointment-booking'),
		'input_attrs' => array(
    'placeholder' => __( 'PREVIOUS', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_single_blog_next_navigation_text',array(
		'default'=> 'NEXT',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_single_blog_next_navigation_text',array(
		'label'	=> __('Post Navigation Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'NEXT', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_single_blog_comment_title',array(
		'default'=> 'Leave a Reply',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('appointment_booking_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'Leave a Reply', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_single_blog_comment_button_text',array(
		'default'=> 'Post Comment',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('appointment_booking_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','appointment-booking'),
		'input_attrs' => array(
    'placeholder' => __( 'Post Comment', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','appointment-booking'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','appointment-booking'),
		'section'=> 'appointment_booking_single_blog_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('appointment_booking_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','appointment-booking'),
		'description'	=> __('Enter a value in %. Example:50%','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '100%', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'appointment_booking_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_blog_post_parent_panel',
	));

  	$wp_customize->add_setting('appointment_booking_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_grid_layout_settings',
		'setting'	=> 'appointment_booking_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'appointment_booking_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','appointment-booking' ),
        'section' => 'appointment_booking_grid_layout_settings'
    )));

	$wp_customize->add_setting('appointment_booking_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_grid_author_icon',array(
		'label'	=> __('Add Author Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_grid_layout_settings',
		'setting'	=> 'appointment_booking_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'appointment_booking_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','appointment-booking' ),
		'section' => 'appointment_booking_grid_layout_settings'
    )));

   	$wp_customize->add_setting('appointment_booking_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_grid_layout_settings',
		'setting'	=> 'appointment_booking_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'appointment_booking_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','appointment-booking' ),
		'section' => 'appointment_booking_grid_layout_settings'
    )));

 	$wp_customize->add_setting('appointment_booking_grid_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_grid_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','appointment-booking'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','appointment-booking'),
		'section'=> 'appointment_booking_grid_layout_settings',
		'type'=> 'text'
	));

  	$wp_customize->add_setting('appointment_booking_display_grid_posts_settings',array(
	    'default' => 'Into Blocks',
	    'transport' => 'refresh',
	    'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_display_grid_posts_settings',array(
	    'type' => 'select',
	    'label' => __('Display Grid Posts','appointment-booking'),
	    'section' => 'appointment_booking_grid_layout_settings',
	    'choices' => array(
	    	'Into Blocks' => __('Into Blocks','appointment-booking'),
	        'Without Blocks' => __('Without Blocks','appointment-booking')
	    ),
	) );

	$wp_customize->add_setting('appointment_booking_grid_button_text',array(
		'default'=> esc_html__('Read More','appointment-booking'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_grid_button_text',array(
		'label'	=> esc_html__('Add Button Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => esc_html__( 'Read More', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_grid_layout_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_grid_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_grid_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '[...]', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_grid_layout_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('appointment_booking_grid_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_grid_excerpt_settings',array(
        'type' => 'select',
        'label' => esc_html__('Grid Post Content','appointment-booking'),
        'section' => 'appointment_booking_grid_layout_settings',
        'choices' => array(
        	'Content' => esc_html__('Content','appointment-booking'),
            'Excerpt' => esc_html__('Excerpt','appointment-booking'),
            'No Content' => esc_html__('No Content','appointment-booking')
        ),
	) );

	// Other Settings
	$wp_customize->add_panel( $appointment_booking_parent_panel );

	$OtherParentPanel = new Appointment_Booking_WP_Customize_Panel( $wp_customize, 'appointment_booking_other_parent_panel', array(
		'title' => esc_html__( 'Other Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_panel_id',
		'priority' => 20,
	));

	$wp_customize->add_panel( $OtherParentPanel );

	// Layout
	$wp_customize->add_section( 'appointment_booking_left_right', array(
    	'title' => esc_html__( 'General Settings', 'appointment-booking' ),
		'panel' => 'appointment_booking_other_parent_panel'
	) );

	$wp_customize->add_setting('appointment_booking_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control(new Appointment_Booking_Image_Radio_Control($wp_customize, 'appointment_booking_width_option', array(
        'type' => 'select',
        'label' => esc_html__('Width Layouts','appointment-booking'),
        'description' => esc_html__('Here you can change the width layout of Website.','appointment-booking'),
        'section' => 'appointment_booking_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('appointment_booking_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_page_layout',array(
        'type' => 'select',
        'label' => esc_html__('Page Sidebar Layout','appointment-booking'),
        'description' => esc_html__('Here you can change the sidebar layout for pages. ','appointment-booking'),
        'section' => 'appointment_booking_left_right',
        'choices' => array(
            'Left Sidebar' => esc_html__('Left Sidebar','appointment-booking'),
            'Right Sidebar' => esc_html__('Right Sidebar','appointment-booking'),
            'One Column' => esc_html__('One Column','appointment-booking')
        ),
	) );

    $wp_customize->add_setting( 'appointment_booking_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','appointment-booking' ),
		'section' => 'appointment_booking_left_right'
    )));

    $wp_customize->add_setting('appointment_booking_bradcrumbs_alignment',array(
        'default' => 'Left',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_bradcrumbs_alignment',array(
        'type' => 'select',
        'label' => __('Bradcrumbs Alignment','appointment-booking'),
        'section' => 'appointment_booking_left_right',
        'choices' => array(
            'Left' => __('Left','appointment-booking'),
            'Right' => __('Right','appointment-booking'),
            'Center' => __('Center','appointment-booking'),
        ),
	) );

    //Wow Animation
	$wp_customize->add_setting( 'appointment_booking_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_animation',array(
        'label' => esc_html__( 'Show / Hide Animations','appointment-booking' ),
        'description' => __('Here you can disable overall site animation effect','appointment-booking'),
        'section' => 'appointment_booking_left_right'
    )));

    //Pre-Loader
	$wp_customize->add_setting( 'appointment_booking_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','appointment-booking' ),
        'section' => 'appointment_booking_left_right'
    )));

	$wp_customize->add_setting('appointment_booking_preloader_bg_color', array(
		'default'           => '#3b82ea',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'appointment-booking'),
		'section'  => 'appointment_booking_left_right',
	)));

	$wp_customize->add_setting('appointment_booking_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'appointment-booking'),
		'section'  => 'appointment_booking_left_right',
	)));

	$wp_customize->add_setting('appointment_booking_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'appointment_booking_preloader_bg_img',array(
        'label' => __('Preloader Background Image','appointment-booking'),
        'section' => 'appointment_booking_left_right'
	)));

	//Responsive Media Settings
	$wp_customize->add_section('appointment_booking_responsive_media',array(
		'title'	=> esc_html__('Responsive Media','appointment-booking'),
		'panel' => 'appointment_booking_other_parent_panel',
	));

    $wp_customize->add_setting( 'appointment_booking_resp_slider_hide_show',array(
      	'default' => 1,
     	'transport' => 'refresh',
      	'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_resp_slider_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Slider','appointment-booking' ),
      	'section' => 'appointment_booking_responsive_media'
    )));

    $wp_customize->add_setting( 'appointment_booking_sidebar_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_sidebar_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Sidebar','appointment-booking' ),
      	'section' => 'appointment_booking_responsive_media'
    )));

    $wp_customize->add_setting( 'appointment_booking_responsive_preloader_hide',array(
        'default' => false,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_responsive_preloader_hide',array(
        'label' => esc_html__( 'Show / Hide Preloader','appointment-booking' ),
        'section' => 'appointment_booking_responsive_media'
    )));

    $wp_customize->add_setting( 'appointment_booking_resp_scroll_top_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ));
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_resp_scroll_top_hide_show',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','appointment-booking' ),
      	'section' => 'appointment_booking_responsive_media'
    )));

    $wp_customize->add_setting('appointment_booking_res_open_menu_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_res_open_menu_icon',array(
		'label'	=> __('Add Open Menu Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_responsive_media',
		'setting'	=> 'appointment_booking_res_open_menu_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('appointment_booking_res_close_menus_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Appointment_Booking_Fontawesome_Icon_Chooser(
        $wp_customize,'appointment_booking_res_close_menus_icon',array(
		'label'	=> __('Add Close Menu Icon','appointment-booking'),
		'transport' => 'refresh',
		'section'	=> 'appointment_booking_responsive_media',
		'setting'	=> 'appointment_booking_res_close_menus_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('appointment_booking_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'appointment_booking_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'appointment-booking'),
		'section'  => 'appointment_booking_responsive_media',
	)));

    //404 Page Setting
	$wp_customize->add_section('appointment_booking_404_page',array(
		'title'	=> __('404 Page Settings','appointment-booking'),
		'panel' => 'appointment_booking_other_parent_panel',
	));

	$wp_customize->add_setting('appointment_booking_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('appointment_booking_404_page_title',array(
		'label'	=> __('Add Title','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '404 Not Found', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('appointment_booking_404_page_content',array(
		'label'	=> __('Add Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_404_page_button_text',array(
		'label'	=> __('Add Button Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'GO BACK', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('appointment_booking_no_results_page',array(
		'title'	=> __('No Results Page Settings','appointment-booking'),
		'panel' => 'appointment_booking_other_parent_panel',
	));

	$wp_customize->add_setting('appointment_booking_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('appointment_booking_no_results_page_title',array(
		'label'	=> __('Add Title','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'Nothing Found', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('appointment_booking_no_results_page_content',array(
		'label'	=> __('Add Text','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('appointment_booking_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','appointment-booking'),
		'panel' => 'appointment_booking_other_parent_panel',
	));

	$wp_customize->add_setting('appointment_booking_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_social_icon_padding',array(
		'label'	=> __('Icon Padding','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_social_icon_width',array(
		'label'	=> __('Icon Width','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
    'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_social_icon_height',array(
		'label'	=> __('Icon Height','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_social_icon_settings',
		'type'=> 'text'
	));

    //Woocommerce settings
	$wp_customize->add_section('appointment_booking_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'appointment-booking'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'appointment_booking_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'appointment_booking_woocommerce_shop_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Shop Page Sidebar','appointment-booking' ),
		'section' => 'appointment_booking_woocommerce_section'
    )));

    $wp_customize->add_setting('appointment_booking_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','appointment-booking'),
        'section' => 'appointment_booking_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','appointment-booking'),
            'Right Sidebar' => __('Right Sidebar','appointment-booking'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'appointment_booking_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar',
		'render_callback' => 'appointment_booking_customize_partial_appointment_booking_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'appointment_booking_woocommerce_single_product_page_sidebar',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Single Product Sidebar','appointment-booking' ),
		'section' => 'appointment_booking_woocommerce_section'
    )));

   $wp_customize->add_setting('appointment_booking_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','appointment-booking'),
        'section' => 'appointment_booking_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','appointment-booking'),
            'Right Sidebar' => __('Right Sidebar','appointment-booking'),
        ),
	) );

	$wp_customize->add_setting('appointment_booking_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_woocommerce_section',
		'type'=> 'text'
	));

    //Products Sale Badge
	$wp_customize->add_setting('appointment_booking_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'appointment_booking_sanitize_choices'
	));
	$wp_customize->add_control('appointment_booking_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','appointment-booking'),
        'section' => 'appointment_booking_woocommerce_section',
        'choices' => array(
            'left' => __('Left','appointment-booking'),
            'right' => __('Right','appointment-booking'),
        ),
	) );

	$wp_customize->add_setting('appointment_booking_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('appointment_booking_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('appointment_booking_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','appointment-booking'),
		'description'	=> __('Enter a value in pixels. Example:20px','appointment-booking'),
		'input_attrs' => array(
            'placeholder' => __( '10px', 'appointment-booking' ),
        ),
		'section'=> 'appointment_booking_woocommerce_section',
		'type'=> 'text'
	));

  	// Related Product
    $wp_customize->add_setting( 'appointment_booking_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'appointment_booking_switch_sanitization'
    ) );
    $wp_customize->add_control( new Appointment_Booking_Toggle_Switch_Custom_Control( $wp_customize, 'appointment_booking_related_product_show_hide',array(
        'label' => esc_html__( 'Related product','appointment-booking' ),
        'section' => 'appointment_booking_woocommerce_section'
    )));


    // Has to be at the top
	$wp_customize->register_panel_type( 'Appointment_Booking_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Appointment_Booking_WP_Customize_Section' );
}

add_action( 'customize_register', 'appointment_booking_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Appointment_Booking_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'appointment_booking_panel';
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
  	class Appointment_Booking_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'appointment_booking_section';
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
function appointment_booking_customize_controls_scripts() {
	wp_enqueue_script( 'appointment-booking-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'appointment_booking_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Appointment_Booking_Customize {

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
		$manager->register_section_type( 'Appointment_Booking_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Appointment_Booking_Customize_Section_Pro( $manager,'appointment_booking_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Appointment Booking', 'appointment-booking' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'appointment-booking' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/products/appointment-wordpress-theme'),
		) )	);

		// Register sections.
		$manager->add_section(new Appointment_Booking_Customize_Section_Pro($manager,'appointment_booking_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'appointment-booking' ),
			'pro_text' => esc_html__( 'DOCS', 'appointment-booking' ),
			'pro_url'  => esc_url('https://preview.vwthemesdemo.com/docs/free-appointment-booking/'),
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

		wp_enqueue_script( 'appointment-booking-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'appointment-booking-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Appointment_Booking_Customize::get_instance();
